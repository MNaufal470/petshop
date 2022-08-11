<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseModel extends Model
{
    protected $table = 'tbl_pembelian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_pembelian','id_user','id_product','quantity','status'];

    public function purchaseCode(){
        $builder = $this->db->query('select max(id) as max_id from tbl_pembelian');
        $rows = $builder->getRow();
        $kode = $rows->max_id + 1;
        $noUrut =  substr($kode, 1,2);
        $noUrut++;

        return $kode;
    }
}
?>