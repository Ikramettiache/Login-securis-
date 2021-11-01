<?php 
session_start();


function get_random_string($lentgh){
$array=array('1','2','3','4','5','6','7','8','9','0','a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$text="";
$lentgh=rand(4,$lentgh);
for ($i=0;$i<$lentgh;$i++){
	$random=rand(0,61);
#	$text.=$array[$random];
}
return $random;
}
$_SESSION['token'] = get_random_string(60);
	
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) { 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Secure login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">

		<form class="p-5 rounded shadow" 
			  style="width: 30rem"
			  action="auth.php"
			  method="post">
				<h1 class="text-center pb-5 display-4">LOGIN
				</h1>
				<?php if(isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert">
					<?=htmlspecialchars($_GET['error'])?>
					</div>
				<?php } ?>
				  <div class="mb-3">		  
				   	<label for="exampleInputEmail1" 
				    		class="form-label">Email address
				    </label>
				    <input type="email"
				    		name="email" 
				    		value="
				    		<?php if(isset($_GET['email']))
				    		echo(htmlspecialchars($_GET['email']))?>"
				    		class="form-control" 
				    		id="exampleInputEmail1" 
				    		aria-describedby="emailHelp">
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputPassword1" 
				    		class="form-label">Password
					</label>
				    <input type="password" 
				    		name="password"
				    		class="form-control" 
				    		id="exampleInputPassword1">
				  </div>

				  <input type="hidden" name="token" value="<?=$_SESSION['token']?>">

				  <div class="btn-group" role="group" aria-label="Basic example">
				  <button type="Reset"
				  		  class="btn btn-primary">Reset
				  </button>

				  <button type="submit" 
				  			class="btn btn-primary">Ok
				  </button>

				    <button class="btn btn-primary" type="button" onclick=window.parent.location.href='signup.php' target='_parent'>S'inscrire</button>
				</div>
		</form>
</body>
</html>

<?php
	}else{
		header("Location: ..\index.php");
	}
?>