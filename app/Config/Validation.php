<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $register = [
        "nama"=> ['rules'=>'required'],
        "alamat"=> ['rules'=>'required'],
        "no_hp"=> ['rules'=>'required|numeric|max_length[14]'],
        "username" => ['rules'=>'required|is_unique[users.username]'],
        "password" => ['rules'=>'required'],
        "email" => ['rules'=>'required'],
    ];
    public $register_errors = [
        'nama' => [
           'required'=> 'Name is a required field',
        ],
        'alamat' => [
            'required'=> 'Address is a required field',
         ],
         'no_hp' => [
            'required'=> 'Phone Number is a required field',
            'numeric'=> 'This field only accept numbers',
            'max_length'=> 'max numbers accepted is 14 '
         ],
         'username' => [
            'required'=>'Username is a required field',
            'is_unique'=> 'Username Already Exists '
        ],
        'password' => [
            'required'=>'Password is a required field'
        ],
        'email' => [
            'required'=>'Email is a required field'
        ],
       
       
    ];
    public $checkUser = [
        "username" => ['rules'=>'required'],
        "password" => ['rules'=>'required'],
    ];
    public $checkUser_errors = [
        'username' => [
            'required'=>'Username is a required field'
        ],
        'password' => [
            'required'=>'Password is a required field'
        ],
        ];

    public $addItem = [
        'photo' => ['rules'=>['uploaded[photo]']],
        'nama' => ['rules'=>['required']],
        'deskripsi' => ['rules'=>['required']],
        'harga' => ['rules'=>['required']],
    ];
    public $addItem_errors = [
        'photo'=>[
            'uploaded'=>"you haven't uploaded a picture"
        ],
        'nama'=>['required'=>'field Nama is required'],
        'deskripsi'=>['required'=>'field Deskripsi is required'],
        'harga'=>['required'=>'field Harga is required'],
        ];
    public $updateItem = [
        'nama' => ['rules'=>['required']],
        'deskripsi' => ['rules'=>['required']],
        'harga' => ['rules'=>['required']],
    ];
    public $updateItem_errors = [
        'nama'=>['required'=>'field Nama is required'],
        'deskripsi'=>['required'=>'field Deskripsi is required'],
        'harga'=>['required'=>'field Harga is required'],
    ];
    public $updateUser = [
        "nama"=> ['rules'=>'required'],
        "alamat"=> ['rules'=>'required'],
        "no_hp"=> ['rules'=>'required|numeric|max_length[14]'],
        "username" => ['rules'=>'required'],
    ];
    public $updateUser_errors = [
        'nama' => [
            'required'=> 'Name is a required field',
         ],
         'alamat' => [
             'required'=> 'Address is a required field',
          ],
          'no_hp' => [
             'required'=> 'Phone Number is a required field',
             'numeric'=> 'This field only accept numbers',
             'max_length'=> 'max numbers accepted is 14 '
          ],
          'username' => [
             'required'=>'Username is a required field',
         ],
    ];
    public $updateProfile = [
        "nama"=> ['rules'=>'required'],
        "alamat"=> ['rules'=>'required'],
        "no_hp"=> ['rules'=>'required|numeric|max_length[14]'],
        "email" => ['rules'=>'required'],
    ];
    public $updateProfile_errors = [
        'nama' => [
            'required'=> 'Name is a required field',
         ],
         'alamat' => [
             'required'=> 'Address is a required field',
          ],
          'email' => [
            'required'=> 'Email is a required field',
         ],
          'no_hp' => [
             'required'=> 'Phone Number is a required field',
             'numeric'=> 'This field only accept numbers',
             'max_length'=> 'max numbers accepted is 14 '
          ],

    ];
}