<?php

namespace App\Controllers;

use App\Entities\Product;
use App\Models\AuthModel;
use App\Models\ProductModel;
use App\Models\PurchaseModel;

class Admin extends BaseController
{
    protected $productModel;
    protected $productEnt;
    protected $userModel;
    protected $purchaseModel;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->productModel = new ProductModel();
        $this->productEnt = new Product();
        $this->userModel = new AuthModel();
        $this->purchaseModel = new PurchaseModel();
    }
    public function index()
    {
        $product = $this->productModel->findAll();
        return view('Admin/admin',[
            'product' => $product
        ]);
    }
   public function Pelanggan(){
    $pengguna = $this->userModel->findAll();

    return view('Admin/userAccount',[
        'pengguna'=>$pengguna
    ]);
   }
   public function AddUser(){
    if($this->request->getPost()){
        $data = $this->request->getPost();
        $this->validation->run($data,"register");
        $errors = $this->validation->getErrors();
        if(!$errors){
            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $no_hp = $this->request->getPost('no_hp');
            $username = $this->request->getPost('username');
            $role = $this->request->getPost('role');
            $password = password_hash($this->request->getPost('password'),PASSWORD_BCRYPT);
            $values = [
                'nama'=>$nama,
                'alamat'=>$alamat,
                'no_hp'=>$no_hp,
                'username'=>$username,
                'password'=>$password,
                'role'=>$role
            ];
            $this->userModel->save($values);
        session()->setFlashdata('success','Account Successfully Created' );
        return redirect()->to('/Admin/Pelanggan');
        }
        session()->setFlashdata('fail', $errors);
        return redirect()->to('/Admin/Pelanggan')->withInput();
    }
   }
   public function UpdateUser($id){
    if($this->request->getPost()){
        $data = $this->request->getPost();
        $this->validation->run($data,"updateUser");
        $errors = $this->validation->getErrors();
        $user = $this->userModel->find($id);
        $passwordLama = $user['password'];
        if(!$errors){
            if($this->request->getPost('password')=== ""){
                $password = $passwordLama;
            }
            else{
                $password = password_hash($this->request->getPost('password'),PASSWORD_BCRYPT);
            }
            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $no_hp = $this->request->getPost('no_hp');
            $username = $this->request->getPost('username');
            $role = $this->request->getPost('role');
            
            $values = [
                'nama'=>$nama,
                'alamat'=>$alamat,
                'no_hp'=>$no_hp,
                'username'=>$username,
                'password'=>$password,
                'role'=>$role
            ];
            $this->userModel->update($id,$values);
            session()->setFlashdata('success', 'Update Account Success ');
            return redirect()->to('/Admin/Pelanggan');
        }
        session()->setFlashdata('fail-update', $errors);
        return redirect()->to('/Admin/Pelanggan')->withInput();
    }
   }
   public function DeleteUser($id){
        $account = $this->userModel->find($id);
         $this->userModel->delete($account);
         session()->setFlashdata('success', 'Delete Account Success ');
         return redirect()->to('/Admin/Pelanggan');
   }
    public function AddItem(){
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data,'addItem');
            $errors = $this->validation->getErrors();
            if(!$errors){
                $productEnt = $this->productEnt->fill($data);
                $productEnt->photo = $this->request->getFile('photo');
                $this->productModel->save($productEnt);
                session()->setFlashdata('success','Data added successfully');
                return redirect()->to('/Admin');
            }
            session()->setFlashdata('errors',$errors);
            return redirect()->to('/Admin');
        }
    }
    public function UpdateItem($id){
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data,'updateItem');
            $errors = $this->validation->getErrors();
            if(!$errors){
                $oldData = $this->productModel->find($id);
                $oldPhoto = $oldData->photo;
                $productEnt = new \App\Entities\Product();
                $productEnt->id = $id;
                $productEnt->fill($data);
                if($this->request->getFile('photo')->isValid()){
                    unlink('assets/img/product/'.$oldPhoto);
                    $productEnt->photo = $this->request->getFile('photo');
                }
                $this->productModel->save($productEnt);
                session()->setFlashdata('success','Data Updated successfully');
                return redirect()->to('/Admin');
            }
            session()->setFlashdata('errors',$errors);
            return redirect()->to('/Admin');
        }
    }
    public function DeleteItem($id){
        $item = $this->productModel->find($id);
        $photo = $item->photo;
        $this->productModel->delete($id);
        if(file_exists('assets/img/product/'.$photo)){
            unlink('assets/img/product/'.$photo);
        }
        session()->setFlashdata('success','Data Deleted successfully');
        
        return redirect()->to('/Admin');
    }
    public function Purchase(){
       $allOrder =  $this->purchaseModel->findAll();
       $prevKode = '';
       $order = [];
       $user = [];
       $prevuser = '';
       if(!empty($allOrder)){
        foreach($allOrder as $id){
            $nextKode = $id['kode_pembelian'];
            if($prevKode !== $nextKode){
            $prevKode = $id['kode_pembelian'];
            $order[] = $this->productModel->getDetailItemOrder($id['kode_pembelian'])->getResultArray();
         }
        }
        foreach($order as $i){  
            foreach($i as $u){
                if($prevKode !== $u['id_user'] ){
                    $prevKode = $u['id_user'] ;
                    array_push($user,$u['id_user']);
                }
            }
           
        }
        foreach($user as $eachUser){
            $userDetail[] = $this->userModel->find($eachUser);
        }
    }
    return view('Admin/pembelian',[
        'order'=>$order,
        'userDetail'=>$userDetail    
    ]);
    }
}