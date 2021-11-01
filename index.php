<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
  	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Page d'acceuil </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>
<body>
	 <div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
	 	
        <h1 class="text-center display-4" style="margin-top: -60px;font-size: 2rem">Hi</h1>
        <a href="private\logout.php" class="btn btn-warning">Se déconnecter</a>

	 </div>
</body>
</html>
<?php 
}else {
   header("Location: login.php");
}
 ?>