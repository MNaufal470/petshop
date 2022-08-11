<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['photo','nama','deskripsi','harga'];
    protected $returnType = 'App\Entities\Product';
    protected $useTimestamps = false;

    public function getDetailItem($id){
        $query = "SELECT * from product join tbl_cart on product.id = tbl_cart.id_product where tbl_cart.id_user = $id";
        $builder = $this->db->query($query);
        return $builder;
    }
    public function getDetailItemOrder($id){
        $query = "SELECT * from product join tbl_pembelian on product.id = tbl_pembelian.id_product where tbl_pembelian.kode_pembelian = $id";
        $builder = $this->db->query($query);
        return $builder;
    }
}
?>