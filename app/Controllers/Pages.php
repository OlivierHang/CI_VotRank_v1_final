<?php

namespace App\Controllers;

$session = \Config\Services::session();
class Pages extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('templates/accueil');
        echo view('templates/footer');
    }

    /*public function test($page='home'){
    echo view('templates/header');
    echo view('pages/'.$page);
    echo view('templates/footer');*/


    //--------------------------------------------------------------------

}
