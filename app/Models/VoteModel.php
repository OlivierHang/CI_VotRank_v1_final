<?php

namespace App\Models;

use CodeIgniter\Model;

class VoteModel extends Model
{
    // protected $table = 'utilisateurs';

    public function getUtilisateurs()
    {
        $db = db_connect();
        $builder = $db->table('utilisateurs');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getChoix($idVote)
    {
        $db = db_connect();
        $builder = $db->table('choix')
            ->where('ID_Votes', $idVote);
        $query = $builder->get();
        // retournera un array avec les choix correspondant à l'ID du vote donné
        return $query->getResultArray();
    }

    public function getVote($idVote)
    {
        $db = db_connect();
        $builder = $db->table('votes')
            ->where('ID', $idVote);
        $query = $builder->get();
        // retournera un array avec les choix correspondant à l'ID du vote donné
        return $query->getResultArray();
    }

    // Créer un vote et Retourne l'ID de ce vote
    public function creationVote($NomSujet, $id_Utilisateur = false)
    {
        // Si ID utilisateur n'est pas renseigné
        if ($id_Utilisateur === false) {
            $data = [
                'NomSujet' => $NomSujet,
                'TotalVotes' => 0,
                'Actif' => 1,
                'ParticipationUnique' => 0
            ];
        }
        // Si ID utilisateur est renseigné, on l'ajoute au Vote 
        else {
            $data = [
                'NomSujet' => $NomSujet,
                'TotalVotes' => 0,
                'Actif' => 1,
                'ParticipationUnique' => 0,
                'ID_Utilisateurs' => $id_Utilisateur
            ];
        }

        $db = db_connect();
        $builder = $db->table('votes');

        // Insert, Création de vote
        $builder->insert($data);

        if ($db->affectedRows() != -1) {
            $builder->select('ID')
                ->where('NomSujet', $NomSujet)
                ->where('TotalVotes', 0)
                ->where('Actif', 1);

            $query = $builder->get();

            // Retourne seulement l'ID du vote créer et non l'array
            return $query->getResultArray()[0]['ID'];
        } else {
            return "Erreur avec l'insert dans la BDD";
        }
    }

    function creationChoix($idVote, $choix)
    {
        $db = db_connect();
        $builder = $db->table('choix');

        foreach ($choix as $unChoix) {
            $data = [
                'Nom' => $unChoix,
                'Points' => 0,
                'ID_Votes' => $idVote
            ];

            $builder->insert($data);
        }

        return $db->affectedRows();
    }

    // Incrémente le nombre 'TotalVotes' et ajoute les points pour chaque choix du vote
    public function vote($idVote, $choix)
    {
        $totalPoint = count($choix) - 1;

        $db = db_connect();

        $builder2 = $db->table('votes');
        // recup le nombre de vote déjà existant
        $totalVotes = $builder2->select('TotalVotes')
            ->where('ID', $idVote)
            ->get()
            ->getResultArray()[0]['TotalVotes'];

        $data = [
            'TotalVotes' => $totalVotes + 1,
        ];
        // update du nombre total de vote dans la table Votes
        $builder2->where('ID', $idVote)
            ->update($data);


        $builder = $db->table('choix');

        foreach ($choix as $unChoix) {
            // recup les points déjà existant du choix 
            $points = $builder->select('Points')
                ->where('ID_Votes', $idVote)
                ->where('Nom', $unChoix)
                ->get()
                ->getResultArray()[0]['Points'];


            $data = [
                'Points' => $points + $totalPoint,
            ];

            // update des points
            $builder->where('ID_Votes', $idVote)
                ->where('Nom', $unChoix)
                ->update($data);

            // decrementation de point de $totalPoint pour le prochain choix au classement
            $totalPoint = $totalPoint - 1;
        }

        return $db->affectedRows();
    }
}
