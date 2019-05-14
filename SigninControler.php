<?php

//le fichier signin_form.php fait office de controleur
include_once  'UserModel.php';
include 'UserSession.php';
include_once 'Database.php';
include 'FlashBag.php';


/**
 * 
 */
class SigninControler 
{
	
	function showForm()
	{
		
		include 'signin_form.phtml';
	}


	function signin()
	{

		$email=$_POST['email'];
		$password=$_POST['password'];
		// var_dump($_POST);

		$isUser = new UserModel();

		try{			
			
			$user = $isUser->checkUser($email,$password);
		
			$userSession = new UserSession();
			$userSession->creatUser($user['Id'],$user['Email'],$user['Firstname'],$user['Lastname']);


			$fb=new FlashBag;
			$fb ->add('vous êtes bien connecté.');
			
			// équivalentr de $_SESSION['user']=['Id'=>,'Email'=>$user['Email'],'Firstname'=>$user['Firstname'],'Lastname'=>$user['Lastname']];
			header('Location: index.php');
			exit;

		}

		catch(Exception $e){
		
			//code qui traite l'exception si il y a un défaut
		
			$error='Identifiant ou MDP incorrect.';

		}

	}


}