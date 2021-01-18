<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends BaseController
{
	public function index()
	{
		helper(['form']);
		$data=[];
		echo view('templates/header');
        echo view('templates/register', $data);
    	echo view('templates/footer');
	}

	public function save()
	{
		//include helper form
		helper(['form']);
		//set rules validation form
		$rules = [
			'Nom'          => 'required|min_length[2]|max_length[20]',
			//'Mail'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
			'MotDePasse'      => 'required|min_length[6]|max_length[200]',
			'Prenom'          => 'required|min_length[2]|max_length[20]'
		];
		if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'Nom'     => $this->request->getVar('Nom'),
				'Prenom'    => $this->request->getVar('Prenom'),
				'Mail'    => $this->request->getVar('Mail'),
				'MotDePasse' => password_hash($this->request->getVar('MotDePasse'), PASSWORD_DEFAULT)
				//'MotDePasse'    => $this->request->getVar('MotDePasse')
            ];
            $model->save($data);
            return redirect()->to(base_url('public/login'));
        }else{
			$data['validation'] = $this->validator;
			echo view('templates/header');
			echo view('templates/register', $data);
			echo view('templates/footer');
        }
	}

}