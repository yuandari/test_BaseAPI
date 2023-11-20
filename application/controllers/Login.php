<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Masukkan username'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Masukkan password'
        ]);
        if ($this->form_validation->run() == false) {

            $data['title'] = "Login";
            $this->load->view('templates_login/header', $data);
            $this->load->view('Login');
            $this->load->view('templates_login/footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //ambil data user, lalu query
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //user ada
        if ($user) {
            if (password_verify($password, $user['password'])) {
                //password benar
                $this->session->set_userdata('username', $user['username']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Login Berhasil !!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button></div>');
                redirect('Pegawai');
            } else {
                //password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button></div>');
                redirect('Login');
            }
        } else {
            //user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            username tidak terdaftar !<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('Login');
        }
    }

    public function Daftar()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Bagian Nama Lengkap wajib di isi.'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'required' => 'Bagian Username wajib di isi.',
            'is_unique' => 'Username sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Bagian Password wajib di isi',
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Daftar";
            $this->load->view('templates_login/header', $data);
            $this->load->view('Daftar');
            $this->load->view('templates_login/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Akun anda berhasil dibuat.<br> Silahkan Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('Login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-success" password="alert">
            Logout berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        redirect('Login');
    }
}
