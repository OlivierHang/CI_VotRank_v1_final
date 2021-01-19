<?php

namespace App\Controllers;

use App\Models\VoteRankUtilisateursModel;
use App\Models\VoteRankPremiumModel;
use App\Models\VoteRankUtilisateursInfosModel;
use \DateTime;


class Home extends BaseController
{
	private $VoteRankUtilisateurs;
	private $VoteRankPremium;
	private $VoteRankUtilisateursInfo;

	private $session;

	public function __Construct()
	{
		helper('form');

		$this->VoteRankUtilisateurs 	= new VoteRankUtilisateursModel();
		$this->VoteRankPremium 			= new VoteRankPremiumModel();
		$this->VoteRankUtilisateursInfo = new VoteRankUtilisateursInfosModel();
		$this->session 					= session();
	}

	public function index()
	{
		echo view('templates/header');
		echo view('welcome_message');
		echo view('templates/footer');
	}

	public function Premium()
	{
		$this->session->setTempdata("temporaryVariable", "Just to make sur i start a session via the controller", 2);



		echo view('templates/header');
		echo view('pages/premium');
		echo view('templates/footer');
	}

	public function PremiumSettings()
	{
		$data 	= [];
		$data["validation"] = null;

		if ($this->request->getMethod() == "post") {
			$rules 	= [
				'Mail'    			=> 'required|valid_email',
				'Prix'    			=> 'required|numeric',
				'Date_debut'    	=> 'required',
				'Date_fin'    		=> 'required',

				'nomCompletCB'  => [

					'rules' => 'required|alpha_numeric_space|min_length[4]',
					'errors' => [
						'required'  			=> 'Nom requis',
						'alpha_numeric_space'   => 'Le nom ne semble pas être au bon format',
						'min_length'  			=> 'Le nom semble être trop court',
					]

				],

				'numeroCB'   => [

					'rules' => 'required|exact_length[19]',
					'errors' => [
						'required'  		=> 'Numéro CB requis',
						'exact_length'  	=> 'Numéro CB incorrect',
					]

				],

				'expirationCB'   => [

					'rules' => 'required|exact_length[7]',
					'errors' => [
						'required'  		=> 'Date expiration CB incorrect',
						'exact_length'  	=> 'Date expiration CB incorrect',
					]

				],

				'CVC'    => [

					'rules' => 'required|numeric|exact_length[3]',
					'errors' => [
						'required'  		=> 'Cryptogramme visuel incorrect',
						'numeric'  			=> 'Cryptogramme visuel incorrect',
						'exact_length'  	=> 'Cryptogramme visuel incorrect',
					]

				],
			];

			$moisExpirationCB 	= (int)substr($_POST["expirationCB"], 0, 2);
			$AnneeExpirationCB  = (int)substr($_POST["expirationCB"], -2, 2);

			if ($this->validate($rules) && ($moisExpirationCB <= 12 && $AnneeExpirationCB >= (int)date("y"))) {
				if (!isset($_POST['Renouvellement'])) {
					$Renouvellement = 0;
				} else {
					$Renouvellement = 1;
				}

				$VoteRankPremiumData = [

					'Date_debut'   		=> $this->request->getVar("Date_debut"),
					'Date_fin'    		=> $this->request->getVar("Date_fin"),
					'Renouvellement'    => $Renouvellement,
					'Prix'   			=> $this->request->getVar("Prix"),
					'ID_Utilisateurs'   => $_SESSION["ID"]
				];

				$updateData = [
					'Premium' 			=> 1
				];

				if ($this->VoteRankUtilisateurs->CreatePremium($VoteRankPremiumData) == true && $this->VoteRankUtilisateursInfo->update($_SESSION["ID"], $updateData) == true) {
					$this->session->setTempdata("success", "Les informations utilisateurs ont bien été misent à jour", 2);
					echo ("<div style = '; text-align: center;color: green;font-weight:bold'>" .  $_SESSION["success"] . "<div/>");

					$this->session->set("Premium", "1");
					$this->session->set("allreadyUpdated", true);

					return header("refresh:2;url=" . base_url('public/Home/Premium') . " ");
				} else {
					$this->session->setTempdata("error", "Mise à jour impossible, une erreur est survenue..redirection automatique dans 5 secondes", 2);
					echo ("<div style = '; text-align: center;color: red;font-weight:bold'>" .  $_SESSION["error"] . "<div/>");

					return header("refresh:2;url=" . base_url('public/Home/PremiumSettings') . " ");
				}
			} elseif (!$this->validate($rules)) {
				$data["validation"] = $this->validator;
			} elseif ($moisExpirationCB > 12 || $AnneeExpirationCB < (int)date("y")) {
				//$data["erreurExpirationCB"] = "Date d'expiration CB invalide";

				$this->session->setTempdata("erreurExpirationCB", true, 5);
			}
		}

		echo view('templates/header');
		echo view('pages/premiumSettingsView', $data);
		echo view('templates/footer');
	}
	//--------------------------------------------------------------------

}
