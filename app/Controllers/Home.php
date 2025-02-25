<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Home extends BaseController
{

    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }


    public function dashboard()
    {
        // cek apakah user sudah login
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Dashboard Page'
        ];

        return view('dashboard', $data);
    }
    public function index(): string
    {
        return view('welcome_message');
    }

    public function login()
    {
        $data = [
            'title' => 'Login Page'
        ];

        return view('login', $data);
    }

    public function registrasi()
    {
        $data = [
            'title' => 'Registrasi Page'
        ];

        return view('registrasi', $data);
    }

    public function forgot_password()
    {
        $data = [
            'title' => 'Forgot Password Page'
        ];

        return view('lupa_password', $data);
    }

    public function reset_password()
    {
        $data = [
            'title' => 'Reset Password Page',
            'token' => $this->request->getUri()->getSegment(2)
        ];

        return view('reset_password', $data);
    }


    public function proses_login()
    {
        // validasi input login
        $validation = \Config\Services::validation();
        $validation->setRules([
            // username dan password wajib diisi
            'username' => 'required',
            'password' => 'required'
        ]);

        // cek validasi
        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/login')->withInput()->with('errors', $validation->getErrors());
        }

        // ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');



        // cek apakah username ada di database
        $user = $this->usersModel->where('username', $username)->first();

        // jika username tidak ada
        if (!$user) {
            return redirect()->to('/login')->withInput()->with('error', 'Username tidak ditemukan');
        }
        // cek apakah password benar
        if (!password_verify($password, $user['password'])) {
            return redirect()->to('/login')->withInput()->with('error', 'Password salah');
        }
        // simpan data user ke dalam session
        session()->set([
            'username' => $user['username'],
            'id_user' => $user['id_user'],
            'email' => $user['email'],
            'nama_lengkap' => $user['nama_lengkap'],
            'role' => $user['role']
        ]);
        // redirect ke halaman dashboard dengan pesan sukses
        return redirect()->to('/dashboard')->with('success', 'Login berhasil');

    }

    public function proses_registrasi()
    {
        // validasi input registrasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required|min_length[8]',
            'email' => 'required|valid_email',
            'nama_lengkap' => 'required'
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/registrasi')->withInput()->with('errors', $validation->getErrors());
        }

        // Cek apakah username sudah ada
        if ($this->usersModel->where('username', $this->request->getPost('username'))->first()) {
            return redirect()->to('/registrasi')->withInput()->with('error', 'Username sudah terdaftar');
        }

        // Cek apakah email sudah ada
        if ($this->usersModel->where('email', $this->request->getPost('email'))->first()) {
            return redirect()->to('/registrasi')->withInput()->with('error', 'Email sudah terdaftar');
        }

        // Simpan data ke dalam database
        $this->usersModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'alamat' => $this->request->getPost('alamat'),
            'role' => 'pemesan'
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil');
    }

    public function proses_forgot_password()
    {
        // Validasi input email
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email'
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/forgot_password')->withInput()->with('error', 'Email tidak valid!');
        }

        // Ambil email dari input
        $email = $this->request->getPost('email');
        $user = $this->usersModel->where('email', $email)->first();

        // Jika email tidak ditemukan
        if (!$user) {
            return redirect()->to('/forgot_password')->withInput()->with('error', 'Email tidak terdaftar!');
        }

        // Buat token reset password
        $token = bin2hex(random_bytes(32));

        // Update token reset password ke database
        $data = [
            'reset_token' => $token
        ];
        $this->usersModel->update($user['id_user'], $data);

        // Kirim email reset password
        $resetLink = base_url("/reset-password/$token");
        $subject = "Reset Password";
        $message = "Klik link berikut untuk mereset password Anda: <a href='$resetLink'>$resetLink</a>";

        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setFrom('simpenpora31@gmail.com', 'PESKOST');
        $emailService->setSubject($subject);
        $emailService->setMessage($message);

        if (!$emailService->send()) {
            return redirect()->to('/forgot-password')->withInput()->with('error', 'Gagal mengirim email, coba lagi!');
        }

        return redirect()->to('/login')->with('success', 'Email reset password telah dikirim!');
    }



    public function proses_reset_password()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'token' => 'required'
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('error', 'Password tidak valid atau tidak cocok!');
        }

        // Ambil token dari form
        $token = $this->request->getPost('token');
        $user = $this->usersModel->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Token tidak valid atau sudah kadaluarsa!');
        }

        // Hash password baru
        $newPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Update password dan hapus token
        $this->usersModel->set(['password' => $newPassword, 'reset_token' => null])
            ->where('id_user', $user['id_user'])
            ->update();

        return redirect()->to('/login')->with('success', 'Password berhasil diubah!');
    }


    public function ingat_saya()
    {
        $rememberMe = $this->request->getPost('remember_me');
        $username = $this->request->getPost('username');

        if ($rememberMe && !empty($username)) {
            // Hash username sebelum disimpan di cookie (opsional)
            $hashedUsername = base64_encode($username);

            setcookie(
                'remember_me',
                $hashedUsername,
                time() + (86400 * 30), // 30 hari
                "/",
                "",
                isset($_SERVER['HTTPS']), // Secure jika HTTPS
                true // HttpOnly
            );
        } else {
            // Hapus cookie jika user tidak mencentang "ingat saya"
            setcookie('remember_me', '', time() - 3600, "/", "", isset($_SERVER['HTTPS']), true);
        }

        return redirect()->to('/login')->with('success', 'Pengaturan ingat saya telah diperbarui!');
    }


    public function logout()
    {
        // hapus data user dari session
        session()->remove(['username', 'id_user', 'email', 'nama_lengkap', 'role']);
        // redirect ke halaman login
        return redirect()->to('/login')->with('success', 'Logout berhasil');
    }


}
