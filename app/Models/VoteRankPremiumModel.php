<?php 
	namespace App\Models;
	use CodeIgniter\Model;

	class VoteRankPremiumModel extends Model
	{
		public function CreatePremium($premiumData)
		{

			$builder	= $this->db->table("premium");
			$result 	= $builder->insert($premiumData);

			if(	$this->db->affectedRows() == 1 )
			{
				return true;
			}
			else
			{
				return false;
			}

		}
	}
?>
