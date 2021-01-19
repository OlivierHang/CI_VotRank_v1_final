<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Models\VoteRankUtilisateursModel;
use App\Models\VoteRankPremiumModel;
use App\Models\VoteRankUtilisateursInfosModel;
use \DateTime;

class Login extends BaseController

{
    private $VoteRankUtilisateurs;
    private $VoteRankPremium;
    private $VoteRankUtilisateursInfo;

    private $session;

    public function __Construct()
    {
        helper('form');

        $this->VoteRankUtilisateurs     = new VoteRankUtilisateursModel();
        $this->VoteRankPremium             = new VoteRankPremiumModel();
        $this->VoteRankUtilisateursInfo = new VoteRankUtilisateursInfosModel();
        $this->session                     = session();
    }

    public function index()
    {
        if (isset($_SESSION["logged_in"]) == false) {
            helper(['form']);
            echo view('templates/header');
            echo view('templates/login');
            echo view('templates/footer');
        } else {
            // REDIRECT DASHBOARD ALEKSANDAR !
            return redirect()->to(base_url('public/dashboard/tamama'));
        }

        // var_dump($_SESSION);
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
                // verification si premium, si "renouvellement premium" OK, sinon "premium" = 0 
                if (isset($_SESSION["logged_in"]) && !isset($_SESSION["allreadyUpdated"])) {
                    $userData = $this->VoteRankUtilisateurs->VerifyPremium($_SESSION["ID"]);
                    $date_now = new DateTime('now');
                    $date_now = $date_now->format('Y-m-d'); // format MySql

                    if ($userData && $userData["Renouvellement"] == 0) {

                        if ($date_now > $userData["Date_fin"]) {
                            $updateData = [
                                'Premium'             => 0
                            ];

                            if ($this->VoteRankUtilisateursInfo->update($_SESSION["ID"], $updateData) == true) {
                                $this->session->setTempdata("success", "Premium expiré..MAJ en cours..Redirection automatique dans 5 secondes..", 2);
                                echo ("<div style = '; text-align: center;color: red;font-weight:bold'>" .  $_SESSION["success"] . "<div/>");

                                $this->session->set("Premium", "0");
                                $this->session->set("allreadyUpdated", true);

                                return header("refresh:2;url=" . base_url('public/Home/Premium') . " ");
                            }
                        }
                    } elseif ($userData && $userData["Renouvellement"] == 1) {
                        $dateFin = $userData["Date_fin"];
                        $date_fin = date_create_from_format('Y-m-d', $dateFin);
                        $newDate_fin = $date_fin->modify('+1 month');
                        $newDate_fin_BDD = $newDate_fin->format('Y-m-d h:i:s'); // format MySql


                        if ($date_now > $userData["Date_fin"]) {

                            $updateData = [
                                'Date_fin'         => $newDate_fin_BDD,
                                'Prix'             => $userData["Prix"] + 2
                            ];

                            if ($this->VoteRankPremium->update($_SESSION["ID"], $updateData) == true) {
                                $this->session->setTempdata("success", "Premium renouvellé..MAJ en cours..Redirection automatique dans 5 secondes..", 2);
                                echo ("<div style = '; text-align: center;color: green;font-weight:bold'>" .  $_SESSION["success"] . "<div/>");

                                $this->session->set("Premium", "1");
                                $this->session->set("allreadyUpdated", true);

                                return header("refresh:2;url=" . base_url('public/Home/Premium') . " ");
                            }
                        }
                    }
                }
                // redirect to Aleksandar page
                return redirect()->to(base_url('public/tableaudebord'));
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
