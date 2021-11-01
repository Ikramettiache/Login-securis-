<?php
include 'db_conn.php';
if ($_SERVER['REQUEST_METHOD']=="POST")

{
$identifiant = $_POST['identifiant'];
$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);
$query1="select * from users where email= :email or identifiant= :identifiant limit 1";	

$stm= $conn->prepare($query1);
$check=$stm->execute(array(
		'email'=>$email,
		'identifiant'=> $identifiant));

if($check){
	$data=$stm->fetchAll(PDO::FETCH_OBJ);
	if(is_array($data) && count($data)>0){
		$data=$data[0];
		header("Location: signup.php?error=Email ou Identifiant existe déjà");
		

		}
	else {

		
		$query ="insert into users(identifiant,email,password) values (:identifiant,:email,:password)";		    		
		$req = $conn->prepare($query);
		$req->execute(array('identifiant'=> $identifiant,
			'email'=>$email,
			'password'=>$password));
		header("Location: login.php");
		die;


	}


			}

}
?>


