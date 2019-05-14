<?php




class UserSession{

    // fonction qui créer une session si aucune session n'est créer 
    function __construct()
    {

        if (session_status()== PHP_SESSION_NONE){

            session_start();
        }
    }

    //fonction qui verrifi si l'utilisateur est authentifié
    function isAuthenticated()
    {

        if (array_key_exists('user', $_SESSION) && isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }



    // fonction qui permet " si une session est lancé " ,de récuperer le Nom et Prénom de l'user"
    function getUserName()
    {

        if ($this->isAuthenticated()) {
            return $_SESSION['user']['Firstname'] .' ' .$_SESSION['user']['Lastname'];

        }
        return null;

    }
             
    //fonction qui créer rempli le tableau $_SESSION['user'] avec les donné récuperé dans la table User de la BDD, selon l'utilisateur qui s'est identifié
    function creatUser($userId,$email,$firstname,$lastname)
    {
       
        $_SESSION['user']=['Id'=> $userId, 'Email'=>$email,'Firstname'=>$firstname,'Lastname'=>$lastname];

    }

    //fonction qui permet de déconecter l'utilisateur et de clear toute ses donné de la session
    function signOut()
    {
        //on clear le tableau  $_SESSION['user']
        $_SESSION['user']=[];
        //fonction native qui détruit la session existante
        session_destroy();

    }
 
 }