<?php

class Auth extends CI_Controller {
    public function login()
    {
        $this->load->helper('url');

        if($this->input->method() == 'post') {
            // $this->load->library('database');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->load->model('User_model');
            $user = $this->User_model->get_user_by_username($username);

            if($user != null) {
                if(password_verify($password, $user->password)) {
                    redirect('/');
                }
            }
        }

        $this->load->helper('form');
        $this->load->view('auth/login');
    }
}