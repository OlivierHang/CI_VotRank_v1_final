<?php 
	namespace App\Models;
	use CodeIgniter\Model;

	class VoteRankVotesModel extends Model
	{
		protected $table 		 = 'votes';
		protected $primaryKey 	 = 'id';
		protected $returnType    = 'object'; //Array pour utiliser le résultat de la requete comme tableau sinon écrire "object" si on veut un retour de type Objet		
		protected $allowedFields = ['Titre', 'Description','TotalReponses','ID_Utilisateurs'];

		protected $validationRules    = [
			'Titre'     		=> 'required|alpha_numeric_space',
			'Description'   	=> 'alpha_numeric_space',
			'TotalReponses'		=> 'numeric',
			'ID_Utilisateurs'	=> 'required|numeric'
		];
	
	}

?>
