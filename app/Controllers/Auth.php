<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->userModel = new AuthModel();
    }
    public function index()
    {
        return view('auth/login');
    }
    public function Register(){
        return view('auth/register');
    }
    public function Check()
    {
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data,'checkUser');
            $errors = $this->validation->getErrors();
            if(!$errors){
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password'); 
                $userInfo = $this->userModel->where('username', $username)->first();
                if(!$userInfo){
                    session()->setFlashdata('username_error', 'Invalid Username');
                    return redirect()->to('Auth/');
                }
                $checkPassword = password_verify($password,$userInfo['password']);
                if(!$checkPassword){
                    session()->setFlashdata('password_error', 'Invalid Password');
                    return redirect()->to('Auth/');
                }
                $user_name = $userInfo['username'];
                $role = $userInfo['role'];            
                session()->set('loggedUser', $user_name);
                session()->set('role',$role);   
                session()->setFlashdata('success', 'Login Success');    
                return redirect()->to('/Home');
            }
            session()->setFlashdata('fail', $errors);
            return redirect()->to('/Auth');
        }
    }
    public function Logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            session()->remove('role');
            return redirect()->to('/Auth');
        }
    }
    public function Regist(){
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data,"register");
            $errors = $this->validation->getErrors();
            if(!$errors){
                $nama = $this->request->getPost('nama');
                $alamat = $this->request->getPost('alamat');
                $no_hp = $this->request->getPost('no_hp');
                $username = $this->request->getPost('username');
                $email = $this->request->getPost('email');
                $password = password_hash($this->request->getPost('password'),PASSWORD_BCRYPT);
                $values = [
                    'nama'=>$nama,
                    'alamat'=>$alamat,
                    'no_hp'=>$no_hp,
                    'username'=>$username,
                    'email'=>$email,
                    'password'=>$password,
                ];
                $this->userModel->save($values);
            session()->setFlashdata('success','Account Successfully Created' );
            return redirect()->to('/Auth');
            }
            session()->setFlashdata('fail', $errors);
            return redirect()->to('/Auth/Register')->withInput();
        }
    }
}