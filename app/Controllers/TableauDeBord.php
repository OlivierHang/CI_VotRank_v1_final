<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TableauDeBordModel;
use phpDocumentor\Reflection\Types\Null_;

$session = \Config\Services::session();

class TableauDeBord extends Controller
{
    public function index()
    {
        $model = new TableauDeBordModel();

        $data['votes'] = $model->getVoteUtilisateur($_SESSION['ID']);

        echo view('templates/header');
        echo view('tableauDebord', $data);
        echo view('templates/footer');
        //var_dump($data['votes']);
    }

    public function  view($ID = NULL)
    {
        $model = new TableauDeBordModel();

        $data['votes'] = $model->getVotes($ID);
        if (empty($data['votes'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('cannot find vote :' . $ID);
        }

        echo view('templates/header');
        echo view('view', $data);
        echo view('templates/footer');
    }

    public function delete($ID = NULL)
    {
        $model = new TableauDeBordModel();
        $data['votes'] = $model->del($ID);
        return redirect()->to(base_url() . "/public/Tableaudebord");
    }
}
