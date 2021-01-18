<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController

{
    public function index()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('templates/login');
        echo view('templates/footer');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('Mail');
        $password = $this->request->getVar('MotDePasse');
        $data = $model->where('Mail', $email)->first();

        // var_dump($data);
        if ($data) {
            $pass = $data['MotDePasse'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'ID'       => $data['ID'],
                    'Nom'     => $data['Nom'],
                    'Mail'    => $data['Mail'],
                    'Admin'     => $data['Admin'],
                    'Premium'     => $data['Premium'],
                    'Prenom'     => $data['Prenom'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('public/dashboard/tamama'));
                // redirect to Aleksandar page
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('public/login'));
            }
        }

        // else{
        //     $session->setFlashdata('msg', 'Email not Found');
        //     return redirect()->to(base_url('public/login'));
        // }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('public/login'));
    }
}
