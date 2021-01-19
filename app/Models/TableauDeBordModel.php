<?php namespace App\Models;

use CodeIgniter\Model;

class TableauDeBordModel extends Model
{
    protected $table = 'votes';

    public function getVotes($ID=false)
    {
        if($ID===false)
        {
            return $this->findAll();

        }
        return $this->asArray()
                    ->where(['ID'=>$ID])
                    ->first();
    }
  public function del($ID)
  {
    //   $this->asArray()->where(['ID' => $ID]);
    //   $this->delete('votes');
      $this->db->query("Delete from votes where ID='$ID'");
      
  }
     

}
