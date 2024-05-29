<?php
  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BookStore</title>
	<style type="text/css">
		*{
			text-decoration: none;
		}
    body{
      background-image: url(image1.jpg);
      background-size: cover;
    }
		.navbar{
			border-radius: 10px; font-family: calibri; padding-right: 15px;padding-left: 15px;
		}
		.navdiv{
			display: flex; align-items: center; justify-content: space-between;
		}
		.logo a{
			font-size: 35px; font-weight: 600; color: white;
		}
		li{
			list-style: none; display: inline-block;
		}
		li a{
			color: white; font-size: 18px; font-weight: bold; margin-right: 25px;
		}
		button{
			background-color: black; margin-left: 10px; border-radius: 10px; padding: 10px; width: 90px;
		}
		button a{
			color: white; font-weight: bold; font-size: 15px;
		}
    footer{
      background-color: black;
      color: white;
      text-align: center;
      padding: 30px;
    }
    .centers{
      background-color: white;
      width: 50%;
      margin-left: 25%;
      color: black;
      padding-top: 25px;
      padding-bottom: 25px;
      border-radius: 75px;
      font-weight: bold;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .centers input{
      margin-top: 20px;
      border-radius: 2px;
    }
    .centers button{
      margin-top: 10px;
      color: white;
      background-color: brown;
    }
    </style>
</head>
<body>
<nav class="navbar">
		<div class="navdiv">
			<div class="logo"><a href="index.php">OurBook</a> </div>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php">About</a></li>
				<li><a href="index.php">Contact</a></li>
				<button><a href="Registration.php">Register</a></button>
				<button><a href="login.php">Login</a></button>
			</ul>
		</div>
	</nav>
  <br><br><br><br><br>
  <center class="centers">
    <h1>ForgetPassword?</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Email: <input type="email" name="email" id="email"><br>
        OTP: <input type="number" name="otp" id="otp"><br>
        New Password: <input type="password" name="npass" id="npass"><br>
        Confirm Password: <input type="password" name="cpass" id="cpass"><br>
        <button type="submit">Submit</button>
    </form>
  </center>
  <br><br><br><br><br><br><br><br>
  <footer>
    <h2>&copy  2021-2024 | CONTACT: Email- mvel3372@gmail.com | Phone - +919122320705</h2>
  </footer>
</body>
</html>