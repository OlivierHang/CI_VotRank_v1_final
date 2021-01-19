<?php

namespace App\Models;

use CodeIgniter\Model;

class TableauDeBordModel extends Model
{
  protected $table = 'votes';

  public function getVotes($ID = false)
  {
    if ($ID === false) {
      return $this->findAll();
    }
    return $this->asArray()
      ->where(['ID' => $ID])
      ->first();
  }

  public function getVoteUtilisateur($ID_Utilisateur)
  {
    // return $this->where(['ID_Utilisateurs' => $ID_Utilisateur])->getResultArray();


    // Avec Query Builder Class BROO !!!!
    $db = db_connect();
    $builder = $db->table('votes')
      ->where('ID_Utilisateurs', $ID_Utilisateur);
    $query = $builder->get();
    // retournera un array avec les choix correspondant à l'ID du vote donné
    return $query->getResultArray();
  }

  public function del($ID)
  {
    //   $this->asArray()->where(['ID' => $ID]);
    //   $this->delete('votes');
    $this->db->query("Delete from votes where ID='$ID'");
  }
}
