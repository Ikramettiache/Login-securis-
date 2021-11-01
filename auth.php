<?php
include 'db_conn.php';

function get_random_string($lentgh){
$array=array(1,2,3,4,5,6,7,8,9,0,'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$text="";
$lentgh=rand(4,$lentgh);
for ($i=0;$i<$lentgh;$i++){
	$random=rand(0,61);
	$text.=$array[$random];
}
return $text;
}
session_start();

if(isset($_POST['email']) && isset($_POST['password']) && $_SESSION['token']=$_POST['token'] && isset($_POST['token']))
{

	$email=$_POST['email'];
	$password=$_POST['password'];

	
	if(empty($email)){
		header("Location: login.php?error=Veuillez entrer un email ");
	}
	elseif (empty($password)) {
		header("Location: login.php?error=Veuillez entrer un mot de passe");
	
	}else {
		header("Location: login.php?error=Email ou mot de passe incorrect&email=$email");
		$req = $conn->prepare("SELECT * FROM users WHERE email =? ");
		$req->execute([$email]);
	
		if($req->rowCount() ===1){
			$user = $req->fetch();
			$user_id=$user['id'];
			$user_email=$user['email'];
			$user_identifiant=$user['identifiant']; 
			$user_password=$user['password'];
		if($email === $user_email or $email==$user_identifiant ){
				if($password=$user_password){
				#if (password_verify($password, $user_password)){
					$_SESSION['user_identifiant']=$user_id;
					$_SESSION['user_email']=$user_email;
					$_SESSION['user_nom']=$user_name;
					header("Location: ..\index.php");

				}else {
					header("Location: login.php?error=Mot de passe incorrect&email=$email");
				}
			}else {
					header("Location: login.php?error=Email ou identifiant incorrect&email=$email");
				}
		}else {
			header("Location: login.php?error=Email ou mot de passe incorrect&email=$email");
		}
	}
}