<?php

namespace App\Models;

use CodeIgniter\Model;

class KostModel extends Model
{
    protected $table            = 'kost';
    protected $primaryKey       = 'id_kost';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kost' , 'alamat_kost' , 'deskripsi' , 'fasilitas' , 'harga' , 'status' ,'foto_kost' ,'created_at' , 'updated_at'];

}
