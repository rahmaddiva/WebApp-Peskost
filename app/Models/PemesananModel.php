<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id_kost', 'id_user', 'tanggal_mulai', 'tanggal_selesai', 'total_bayar', 'status_pemesanan', 'created_at', 'updated_at'];

    public function getPemesanan()
    {
        return $this->db->table($this->table)
            ->select('pemesanan.*, users.nama_lengkap AS nama_user, kost.nama_kost')
            ->join('users', 'users.id_user = pemesanan.id_user', 'left')
            ->join('kost', 'kost.id_kost = pemesanan.id_kost', 'left')
            ->get()
            ->getResultArray();
    }

}
