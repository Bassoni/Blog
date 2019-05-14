<?php

class FlashBag {

    /**
     * Constructeur de la classe FlashBag
     */
     public function __construct() 
     {
        // Si la session n'est pas démarrée...
        if (session_status() == PHP_SESSION_NONE) {
            
            // ... on la démarre
            session_start();
        }
        
        // Si la clé 'flash-messages' n'existe pas dans le tableau $_SESSION
        if ( !array_key_exists('flash-messages', $_SESSION) || !isset($_SESSION['flash-messages']) ) {
        
            $_SESSION['flash-messages'] = [];
        }
     }
     
     /**
      * Ajoute un message au flashbag
      * @param string $message Le message à ajouter
      */
     public function add($message) 
     {
        $_SESSION['flash-messages'][] = $message;
        // ou bien: array_push($_SESSION['flash-messages'], $message);
     }
     
     /**
      * Vérifie l'existence de messages dans le flashbag
      * @return bool Retourne true si il y a des messages, false sinon
      */
     public function hasMessages()
     {
        return !empty($_SESSION['flash-messages']);
     }
     
     /**
      * Retourne le message le plus ancien et le supprime du flashbag
      */
     public function fetch() 
     {
        return array_shift($_SESSION['flash-messages']);
     
     }
     
     /**
      * Retourne tous les messages et les supprime du flashbag
      */
     public function fetchAll()
     {
        $messages = $_SESSION['flash-messages'];
        $_SESSION['flash-messages']=[];
        return $messages;
     }
    
}