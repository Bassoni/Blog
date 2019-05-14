<?php

//les deux lignes qui suivent effectuent la connexion a la Base de données
	require_once 'UserModel.php';

	$firstname="";
	$lastname="";
	$password="";
	$birthdate="";
	$address="";
	$zipcode="";
	$city="";



if (!empty($_POST)) {
	
	$email=$_POST['email'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$password=$_POST['password'];
	$birthdate=$_POST['birthdate'];
	$address=$_POST['address'];
	$zipcode=$_POST['zipcode'];
	$city=$_POST['city'];
	$gender=$_POST['gender'];



	try{

		$user= new UserModel();	
		$user ->addUser($email, $firstname, $lastname, $password, $birthdate, $address, $zipcode, $city, $gender);    

		header('Location: index.php');

		exit;
	}

	catch(Exception $e){
	
		//code qui traite l'exception si il y a un défaut
	
		$error="Ce compte existe déjà";
	}

}

include 'signup_form.phtml';
