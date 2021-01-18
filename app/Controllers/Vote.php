<?php

namespace App\Controllers;

use App\Models\VoteModel;
use ErrorException;

class Vote extends BaseController
{
    public function index($idVote = null)
    {
        $model = new VoteModel();

        // Quand la form sera submit
        if ($this->request->getMethod() === 'post') {
            $post = $this->request->getPost();

            $result = $model->vote($post['idVote'], $post['arrayChoix']);

            // Si il n'y a pas d'erreur avec l'update dans la BDD, redirection vers le controller Resultat
            if ($result !== -1) {
                return redirect()->to(base_url() . '/vote/resultat/' . $post['idVote']);
            } else {
                return "Erreur avec l'update de la BDD";
            }
        } else {
            // Si l'ID du vote est précisé en parametre du controller
            if ($idVote !== null) {
                // recup du vote
                $vote = $model->getVote($idVote);

                // Si ID_Vote n'est pas dans la BDD, $vote sera empty
                if (empty($vote)) {

                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    // A TERMINER -> Faire redirection vers page d'accueil
                    // return redirect()->to(base_url() . '/vote/creation');
                    return "Vote introuvable (VOTE)";
                } else {
                    // Si le vote est clos, redirection vers le resultat
                    // ATTENTION => "$vote[0]['Actif']" renvoie du string et non un nombre !
                    if ($vote[0]['Actif'] === '0') {
                        return redirect()->to(base_url() . '/vote/resultat/' . $idVote);
                    } else {

                        // recup des choix
                        $arrayChoix = $model->getChoix($idVote);

                        foreach ($arrayChoix as $choix) {
                            $arrayNom[] = $choix['Nom'];
                        }

                        $data['choix'] = $arrayNom;
                        $data['idVote'] = $idVote;
                        // Renvoie seulement le titre
                        $data['titre'] = $vote[0]['NomSujet'];
                        echo view('Olivier/vote', $data);
                    }
                }
            }
            // Si il n'y a pas d'ID de Vote en arguments du controller, redirection vers la creation de vote
            else {
                return redirect()->to(base_url() . '/vote/creation');
            }
        }
    }

    public function creation()
    {
        session_start();

        // Si un utilisateur est connecté (SESSION["ID_Utilisateur"]), son ID sera stocké dans $idUtil
        if (isset($_SESSION["ID_Utilisateur"]) === false) {
            $idUtil = false;
        } else {
            $idUtil = $_SESSION["ID_Utilisateur"];
        }

        $model = new VoteModel();

        // Quand la form est submit
        if ($this->request->getMethod() === 'post') {
            // recup info de la form passé en Post dans un array
            $arrayPost = $this->request->getPost();
            // recup NomSujet du form
            $nomSujet = $arrayPost['NomSujet'];
            // declaration array pour les choix
            $arrayChoix = array();
            foreach ($arrayPost as $key => $value) {
                if (stripos($key, 'choix') !== false) {
                    // recup des choix et mis dans l'array
                    $arrayChoix[] = $value;
                }
            }

            // Creation et insert du vote dans la BDD, Retourne l'ID du vote
            $IDVote = $model->creationVote($nomSujet, $idUtil);
            // Creation et insert des choix du vote correspondant dans la BDD
            $resultChoix = $model->creationChoix($IDVote, $arrayChoix);

            // Si il n'y a pas d'erreur dans la BDD
            if ($resultChoix !== -1) {
                // Redirection vers la page de vote
                return redirect()->to(base_url() . '/vote/index/' . $IDVote);
            }
        } else {
            echo view('Olivier/creation_vote');
        }
    }

    public function resultat($idVote = null)
    {
        $model = new VoteModel();

        if ($idVote !== null) {
            // recup du vote
            $vote = $model->getVote($idVote);

            // Si ID_Vote n'est pas dans la BDD, $vote sera empty
            if (empty($vote)) {

                // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                // A TERMINER -> Faire redirection vers page d'accueil
                // return redirect()->to(base_url() . '/vote/creation');
                return "Vote introuvable (RESULTAT)";
            } else {
                // recup des choix
                $choix = $model->getChoix($idVote);

                // mise des infos dans la variables data
                foreach ($choix as $unChoix) {
                    $data['noms'][] = $unChoix['Nom'];
                    $data['points'][] = $unChoix['Points'];
                }

                // Grace au "json_encode", l'array se transformera en string
                $data['noms'] = json_encode($data['noms']);
                $data['points'] = json_encode($data['points']);
                $data['titre'] = json_encode($vote[0]['NomSujet']);
                // var_dump($data);

                echo view('Olivier/resultat', $data);
            }
        } else {
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            // A TERMINER -> Faire redirection vers page d'accueil
            // return redirect()->to(base_url() . '/vote/creation');
            return "A TERMINER -> Faire redirection vers page d'accueil";
        }
    }

    //--------------------------------------------------------------------

}
