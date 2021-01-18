<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'utilisateurs';
    protected $allowedFields = ['Nom','user_email','Prenom','Mail', 'MotDePasse'];
}