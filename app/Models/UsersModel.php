<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['username', 'password', 'email', 'nama_lengkap', 'no_hp', 'alamat', 'role', 'created_at', 'updated_at', 'reset_token'];

}
