<?php
include "env.php";
	$class = new Env();
	$class2 = $class->loginDB();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration System - By lmardark</title>
	<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Kanit:wght@100;300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>

	    main {
		    display: grid;
		    place-items: center;
	    }
	
    </style>

</head>
<body>
	<form action="" method="post">
	    <main>
            <header>
			    <h1>Login System</h1>
		    </header>
		
			User<input id="user_input" type="text" name="user_log" required=""></input>
			Password<input id="password_input" type="password" name="password_log" minlength="8" maxlength="16" required=""></input>
			<button id="submit_input" type="submit">Registrar-se</button>
			<a href="login.php">Login</a> or <a href="index.php">Register</a>
		</main>
	</form>
</body>
</html>
