<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<title>form</title>
</head>
<?php
	$name = $_GET["name"];
	$mail = $_GET["mail"];
	$massage = $_GET["massage"];
	$submit = $_GET["submit"];
	$missingName = "<p>pleace insert the name</p>";
	$missingEmail = "<p>pleace insert the email</p>";
	$missingMassage = "<p>pleace insert the massage</p>";
	if($submit){
		if(!$name){
			$error .= $missingName;
		}else{
			$name = filter_var($name, FILTER_SANITIZE_STRING);
		}
		if(!$mail){
			$error .= $missingEmail;
		}else{
			$mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
		}
		if(!$massage){
			$error .= $missingMassage;
		}
		if(!$error){
			$headers = "Content-type : text/html";
			$to = "kubyshkin2@gmail.com";
			$subject = "just read this";
			$mes = "<html><head><title></title></head><body><h1 class='h1'>From: $name</h1><h2 class='h2'>$massage</h2></body></html>";
			if(mail($to, $subject, $mes, $headers)){
				echo "cool";
			}
		}
		// what of the day of the week I were born
		$timestams = mktime(0, 0, 0, 2, 15, 1989);
		$time = date('l', $timestams);
		echo $time;	

		//time of 1000 days from now

		$timestams = mktime(0, 0, 0, date('m'), date('d') + 1000, date('Y'));
		$time = date('M  l  Y' , $timestams);
		echo $time;			
	}
?>
<body>
	<div class="container">
		<div class="erorr-massage">
			<?php 
				if($error){
					echo $error;
				}
			?>
		</div>
	 <form action="index.php" method="GET">
	 	<div class="form-group">
	 		<label for="name">Name</label>
		 	<input type="text" name = "name" id="name" class="form-control">
	 	</div>
	 	<div class="form-group">
		 	<label for="mail">E-mail</label>
		 	<input type="text"	name = "mail" id="mail" class="form-control" value="<?php echo $mail;?>">
	 	</div>
	 	<div class="form-group">
		 	<label for="message">Massage</label>
		 	<textarea name="massage" id="massage" cols="30" rows="10" class="form-control"></textarea>
	 	</div>
	 	<input type="submit" name="submit" id="submit" class="btn" value="SUBMIT">
	 </form>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<!-- <script src="https://use.fontawesome.com/3b86389fcc.js"></script> -->
	<script src="js/app.js"></script>
</body>
</html>