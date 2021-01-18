<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // $session = session();
        // echo view('templates/header');
        // echo "Bonjour : " . $session->get('Nom');
        // echo view('templates/footer');
    }

    public function tamama()
    {
        // echo 'TA MAMAN';
        $session = session();
        echo view('templates/header');
        echo "Bonjour : " . $session->get('Nom');
        echo view('templates/footer');
    }
}
