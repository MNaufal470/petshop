<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Product extends Entity
{
    public function setPhoto($file){
        $filename = $file->getRandomName(); 
        $writepath = 'assets/img/product';
        $file->move($writepath,$filename);
        $this->attributes['photo'] = $filename;
        return $this; 
    }
}