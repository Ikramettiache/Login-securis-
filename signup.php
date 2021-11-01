<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscription en ligne</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
		<form class="p-5 rounded shadow" 
			  style="width: 40rem"
			  action="signupauth.php"
			  method="post">
				<h1 class="text-center pb-5 display-4">Inscription en ligne</h1>
				<?php if(isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert">
					<?=htmlspecialchars($_GET['error'])?>
					</div>
				<?php } ?>
				<div class="input-group mb-3">
 				 <input type="text" class="form-control" placeholder="Identifiant" aria-label="Identifiant" aria-describedby="basic-addon1" name="identifiant"required>
 				 <div>
				</div>
				<div class="input-group mb-3">
  				<span class="input-group-text" id="basic-addon1">@</span>
 				 <input type="email" class="form-control" placeholder="Entrer votre adresse email" aria-label="Entrer votre adresse email" aria-describedby="basic-addon1" name="email" required>
				</div>
				<div class="input-group mb-3">
 				 <input type="password" class="form-control" placeholder="Entrer votre password" aria-label="Entrer votre password" aria-describedby="basic-addon1" name="password" required>
				</div>
				<div class="input-group mb-3">
				<input type="submit" name="S'inscrire" >
				</div>




		</form>



	</div>
</body>
</html>
