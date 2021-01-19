<?php 
	namespace App\Models;
	use CodeIgniter\Model;

	class VoteRankPremiumModel extends Model
	{
		protected $table 		 = 'Premium';
		protected $primaryKey 	 = 'ID_Utilisateurs';
		protected $returnType    = 'object'; //Array pour utiliser le résultat de la requete comme tableau sinon écrire "object" si on veut un retour de type Objet		
		protected $allowedFields = ['Date_debut','Date_fin','Prix'];
	}
?>
