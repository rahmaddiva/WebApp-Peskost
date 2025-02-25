<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KostModel;


class KostController extends BaseController
{
    protected $kostModel;

    public function __construct()
    {
        $this->kostModel = new KostModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kost',
            'kost' => $this->kostModel->findAll()
        ];
        return view('kost/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Kost'
        ];
        return view('kost/tambah', $data);
    }

    public function edit($id_kost)
    {
        $data = [
            'title' => 'Edit Data Kost',
            'kost' => $this->kostModel->find($id_kost)
        ];
        return view('kost/edit', $data);
    }

    public function simpan_kost()
    {
        // validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_kost' => 'required',
            'alamat_kost' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'foto_kost' => 'uploaded[foto_kost]|max_size[foto_kost,3020]|is_image[foto_kost]|mime_in[foto_kost,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/kost/tambah')->withInput()->with('errors', $validation->getErrors());

        }

        // kondisi apabila foto diupload dan juga tidak, jika tidak maka akan menggunakan foto default
        $fileFoto = $this->request->getFile('foto_kost');
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'foto_kost', $namaFoto);
        }

        $this->kostModel->insert([
            'nama_kost' => $this->request->getPost('nama_kost'),
            'alamat_kost' => $this->request->getPost('alamat_kost'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'fasilitas' => $this->request->getPost('fasilitas'),
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status'),
            'foto_kost' => $namaFoto
        ]);

        return redirect()->to('/kost')->with('success', 'Data Kost berhasil ditambahkan');
    }

    public function update_kost()
    {
        $id_kost = $this->request->getPost('id_kost');
        $fotoLama = $this->request->getPost('foto_lama');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_kost' => 'required',
            'alamat_kost' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'foto_kost' => 'max_size[foto_kost,3020]|is_image[foto_kost]|mime_in[foto_kost,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/kost/edit/' . $id_kost)->withInput()->with('errors', $validation->getErrors());
        }

        $fileFoto = $this->request->getFile('foto_kost');
        if ($fileFoto->getError() == 4) {
            $namaFoto = $fotoLama;
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move(FCPATH . 'foto_kost', $namaFoto);
            if ($fotoLama != 'default.jpg') {
                unlink(FCPATH . 'foto_kost/' . $fotoLama);
            }
        }

        $this->kostModel->update($id_kost, [
            'nama_kost' => $this->request->getPost('nama_kost'),
            'alamat_kost' => $this->request->getPost('alamat_kost'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'fasilitas' => $this->request->getPost('fasilitas'),
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status'),
            'foto_kost' => $namaFoto
        ]);
        return redirect()->to('/kost')->with('success', 'Data Kost berhasil diubah');

    }

    public function hapus_kost()
    {
        $id_kost = $this->request->getPost('id_kost');
        $foto = $this->kostModel->find($id_kost);
        if ($foto['foto_kost'] != 'default.jpg') {
            unlink(FCPATH . 'foto_kost/' . $foto['foto_kost']);
        }
        $this->kostModel->delete($id_kost);
        return redirect()->to('/kost')->with('success', 'Data Kost berhasil dihapus');
    }
}
