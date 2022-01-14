<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_barang');
        $this->load->model('model_auth');
        $this->load->library('cart', 'session');
    }

    public function login()
    {
        $this->cart->destroy();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_form');
            $this->load->view('admin/footer');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $cek = $this->model_barang->cek_login($username, $password);

            if ($cek == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Username atau Password Salah !. <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $cek->username);
                $this->session->set_userdata('role_id', $cek->role_id);
                $this->session->set_userdata('nama', $cek->nama);
                $this->session->set_userdata('alamat', $cek->alamat);
                $this->session->set_userdata('id_customer', $cek->id_customer);

                switch ($cek->role_id) {
                    case 1:
                        redirect('admin/dashboard');
                        break;
                    case 2:
                        redirect('dashboard/welcome');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }

    public function ganti_password()
    {
        $this->load->view('ganti_password');
        $this->load->view('admin/footer');
    }

    public function ganti_password_aksi()
    {
        $pass_baru  = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[pass_baru]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('ganti_password');
            $this->load->view('admin/footer');
        } else {
            $data   = array('password' => md5($pass_baru));
            $id     = array('id_customer' => $this->session->userdata('id_customer'));

            $this->model_barang->update_password($id, $data, 'customer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Password Berhasil Diupdate, Silahkan Login !. <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>');
            redirect('auth/login');
        }
    }

    //Bagian lupa password
    public function lupa_password(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('lupa_form');
        } else {
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->model_auth->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');
                redirect(site_url('auth/login'), 'refresh');
            }

            //build token   

            $token = $this->model_auth->insertToken($userInfo->id_customer);
            $qstring = $this->base64url_encode($token);
            $url = site_url() . '/auth/lupa_password/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';

            $message = '';
            $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.</strong><br>';
            $message .= '<strong>Silakan klik link ini:</strong> ' . $link;

            echo $message; //send this through mail  
            exit;
        }
    }

    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->model_auth->isTokenValid($cleanToken); //either false or array();          

        if (!$user_info) {
            $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');
            redirect(site_url('auth/login'), 'refresh');
        }

        $data = array(
            'title' => 'Halaman Reset Password',
            'nama' => $user_info->nama,
            'email' => $user_info->username,
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('reset_form', $data);
        } else {

            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = md5($cleanPost['password']);
            $cleanPost['password'] = $hashed;
            $cleanPost['id_user'] = $user_info->id_customer;
            unset($cleanPost['passconf']);
            if (!$this->model_auth->updatePassword($cleanPost)) {
                $this->session->set_flashdata('sukses', 'Update password gagal.');
            } else {
                $this->session->set_flashdata('sukses', 'Password anda sudah  
             diperbaharui. Silakan login.');
            }
            redirect(site_url('auth/login'), 'refresh');
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
