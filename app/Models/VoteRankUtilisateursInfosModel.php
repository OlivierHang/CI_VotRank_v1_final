<?php 
	namespace App\Models;
	use CodeIgniter\Model;

	class VoteRankUtilisateursInfosModel extends Model
	{
		protected $table 		 = 'utilisateurs';
		protected $primaryKey 	 = 'ID';
		protected $returnType    = 'object'; //Array pour utiliser le résultat de la requete comme tableau sinon écrire "object" si on veut un retour de type Objet		
		protected $allowedFields = ['Nom','Mail','MotDePasse','Admin','Premium'];

		protected $validationRules    = [
			'Nom'     		=> 'alpha_numeric_space|min_length[2]',
			'Mail'    		=> 'valid_email|is_unique[utilisateurs.Mail]',
			'MotDePasse'    => 'min_length[6]',
			'Admin'     	=> 'numeric|max_length[1]',
			'Premium' 		=> 'numeric|max_length[1]'
		];
	
		protected $validationMessages = [
			'Mail'     => [
								'is_unique' => "Désolé. l'adresse mail saisie est déja prise."
						   ]		   
		];

	}

?>
