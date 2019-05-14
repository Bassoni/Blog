<?php

require_once 'AbstractModel.php';
include_once 'Database.php';


class UserModel extends AbstractModel{



    function addUser($email, $firstname, $lastname, $password, $birthdate, $address, $zipcode, $city, $gender){                
        
        


        $sql = 'SELECT Id FROM User WHERE Email=?';  

        $database = new Database();         
        $user=$database->queryOne($sql,[$email]);

        if (!empty($user)) {
            

            throw new Exception("Ce compte existe déjà");

        }


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql='INSERT INTO User(Email, Firstname, Lastname, Password, Birthdate, Address, Zipcode, City, Gender, CreatedAt) VALUES (?,?,?,?,?,?,?,?,?,NOW())';

        $this->db->queryAction($sql,[$email, $firstname, $lastname, $hashedPassword, $birthdate, $address, $zipcode, $city, $gender]);

    }    


    function checkUser($email,$password){


        $sql = 'SELECT Id, Email, Firstname, Lastname, Password FROM User WHERE Email=?';   

        $database= new Database();
        $user=$database->queryOne($sql,[$email]);


        if (!empty($user)) {
        	

        	if (password_verify($password, $user['Password'])) {
        		
        		return $user;

        	}	
      	}

      	//return false;
        throw new Exception("Identifieant incorrect");
        
    }
         
}
 
