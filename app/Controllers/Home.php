<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\PurchaseModel;

class Home extends BaseController
{
    protected $productModel;
    protected $userModel;
    protected $cartModel;
    protected $pruchaseModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->session = session();
        $this->userModel = new AuthModel();
        $this->cartModel = new CartModel();
        $this->pruchaseModel = new PurchaseModel();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $product = $this->productModel->findAll();
        return view('home',[
            'product'=>$product
        ]);
    }
    public function ProductDetail($id){
        $product = $this->productModel->find($id);

        return view('detail',[
            "product"=>$product
        ]);
    }
    public function Checkout(){
        $findUser = session('loggedUser');
        $user = $this->userModel->where('username',$findUser)->first();
        $itemCart = $this->cartModel->where('id_user', $user['id'])->findAll();
        $product = [];
        $total = 0;
        if(!empty($itemCart)){
            foreach($itemCart as $id){
                $product = $this->productModel->getDetailItem($id['id_user'])->getResultArray(); 
             }
             foreach($product as $item){
                 $harga[] = $item["harga"] * $item["quantity"];    
              }
              $total = array_sum($harga);
        }
        return view('checkout',[
            'user'=>$user,
            'product'=>$product,
            'total'=>$total
        ]);
       
    }
    public function MyOrder(){
        $findUser = session('loggedUser');
        $user = $this->userModel->where('username',$findUser)->first();
        $allOrder = $this->pruchaseModel->where('id_user',$user['id'])->findAll();
        $order = [];
        $prevKode = '';
        if(!empty($allOrder)){
            foreach($allOrder as $id){
                $nextKode = $id['kode_pembelian'];
                if($prevKode !== $nextKode){
                $prevKode = $id['kode_pembelian'];
                $order[] = $this->productModel->getDetailItemOrder($id['kode_pembelian'])->getResultArray();
             }
            }
        } 
        $order = array_reverse($order,true); 
        return view('MyOrder',[
            'order'=>$order
        ]);
    }
    public function AddToCart($id){
        $quantity = $this->request->getPost('quantity');
        $username = session('loggedUser');
        $userInfo = $this->userModel->where('username', $username)->first();
        $userId = $userInfo['id'];
        $checkProduct = $this->cartModel->where('id_user', $userId)->findAll();
        // Initial default SameProduct
        $sameProduct = null;
        // Cek apakah $checkproduct tidak empty
        foreach ($checkProduct as $c){
            if($c['id_product'] === $id){
                 $sameProduct = $c['id'];
            }
        }
        if($sameProduct == null){
            $values = [
                'id_user'=>$userId,
                'id_product'=>$id,
                'quantity'=>$quantity
               ];
            $this->cartModel->save($values);
            session()->setFlashdata('success', 'Success Add Product To Your Cart'); 
            return redirect()->to('/Home/CheckOut/');  
        } 
        // cari produknya
        $detailSameProduct = $this->cartModel->where('id', $sameProduct)->first();
        $quantityBefore = $detailSameProduct['quantity'];
        $quantityAfter = $quantityBefore + $quantity;
        $values = [
            'id_user'=>$userId,
            'id_product'=>$id,
            'quantity'=>$quantityAfter
        ];
        $this->cartModel->update($sameProduct,$values);
        session()->setFlashdata('success', 'Success Add Product To Your Cart'); 
        return redirect()->to('/Home/CheckOut');   
    } 
    public function DeleteItem($id){
        $this->cartModel->delete($id);
        session()->setFlashdata('success', 'Success Remove Product To Your Cart'); 
        return redirect()->to('/Home/CheckOut'); 
    }
    public function UpdateStockItem($id){
        $product = $this->cartModel->find($id);
        $newQuantity = $this->request->getPost('quantity');
        $values = [
            'id_user' => $product['id_user'],
            'id_product' => $product['id_product'],
            'quantity' => $newQuantity,
        ];
        $this->cartModel->update($id,$values);
        session()->setFlashdata('success', 'Success Upate Product To Your Cart'); 
        return redirect()->to('/Home/CheckOut'); 
    }
    public function BuyCart(){
        $findUser = session('loggedUser');
        $user = $this->userModel->where('username',$findUser)->first();
        $getAllCart = $this->cartModel->where('id_user',$user['id'])->findAll();
        $purchaseCode = $this->pruchaseModel->purchaseCode();
        foreach($getAllCart as $item){
            $values[] = [
                'kode_pembelian'=>$purchaseCode,
                'id_product'=>$item['id_product'],
                'id_user'=>$item['id_user'],
                'quantity'=>$item['quantity'],
            ];
            $this->cartModel->delete($item['id']);
        }
          $this->pruchaseModel->insertBatch($values);
         
          return redirect()->to('/Home/MyOrder');
    }

    public function MyProfile($user){
        $user = $this->userModel->where('username',$user)->first();
        return view('myprofile',[
            'user'=>$user
        ]);
    }
    public function UpdateUser($id){
        if($this->request->getPost()){
            $user = $this->userModel->find($id);
            $data = $this->request->getPost();
            $this->validation->run($data,'updateProfile');
            $errors = $this->validation->getErrors();
            if(!$errors){
                $values = [
                    'username'=>$user['username'],
                    'password'=>$user['password'],
                    'role'=>$user['role'],
                    'nama'=>$this->request->getPost('nama'),
                    'alamat'=>$this->request->getPost('alamat'),
                    'email'=>$this->request->getPost('email'),
                ];
               $this->userModel->update($id,$values);
               session()->setFlashdata('success', 'Success Update Your Profile');
               return redirect()->to('/Home/MyProfile/'.$user['username']);
            }
            session()->setFlashdata('fail-update', $errors);
            return redirect()->to('/Home/MyProfile/'.$user['username']);
        }
        
    }
}