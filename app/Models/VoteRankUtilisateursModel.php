<?php 
	namespace App\Models;
	use CodeIgniter\Model;

	class VoteRankUtilisateursModel extends Model
	{
		public function CreateUser($userData)
		{

			$builder	= $this->db->table("utilisateurs");
			$result 	= $builder->insert($userData);

			if(	$this->db->affectedRows() == 1 )
			{
				return true;
			}
			else
			{
				return false;
			}

		}

		public function VerifyEmail($userMail)
		{
			$builder	= $this->db->table("utilisateurs");

			$builder->select("ID,Nom,Mail,MotDePasse,Admin,Premium");
			$builder->where("Mail",$userMail);
			$result = $builder->get();

			if(	count( $result->getResultArray() ) == 1 )
			{
				return $result->getRowArray();
			}
			else
			{
				return false;
			}

		}

	}

?>
