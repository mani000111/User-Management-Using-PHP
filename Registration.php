

        <!-- Registration data sanitize -->
        <?php
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function generateToken() {
    return bin2hex(random_bytes(16));
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $fname = sanitizeInput($_POST["fname"]);
    $lname = sanitizeInput($_POST["lname"]);
    $uname = sanitizeInput($_POST["uname"]);
    $email = sanitizeInput($_POST["email"]);
    $dob = sanitizeInput($_POST["dob"]);
    $country = sanitizeInput($_POST["country"]);
    $state = sanitizeInput($_POST["state"]);
    $city = sanitizeInput($_POST["city"]);

    // Validate first name
    if (empty($fname)) {
        $errors[] = "First name is required.";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
        $errors[] = "Only letters and white space allowed in first name.";
    }

    // Validate last name
    if (empty($lname)) {
        $errors[] = "Last name is required.";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
        $errors[] = "Only letters and white space allowed in last name.";
    }

    // Validate username
    if (empty($uname)) {
        $errors[] = "Username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
        $errors[] = "Only letters and numbers allowed in uname.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate date of birth
    if (empty($dob)) {
        $errors[] = "Date of Birth is required.";
    } elseif (new DateTime($dob) >= new DateTime()) {
        $errors[] = "Date of Birth must be in the past.";
    }

    // Validate country
    if (empty($country)) {
        $errors[] = "Country is required.";
    }

    // Validate state
    if (empty($state)) {
        $errors[] = "State is required.";
    }

    // Validate city
    if (empty($city)) {
        $errors[] = "City is required.";
    }

    // If there are no errors, save the data to the database and send a verification email
    if (empty($errors)) {
        // Database connection details
        $servername = "localhost";
        $username_db = "root"; // Change this to your database username
        $password_db = ""; // Change this to your database password
        $dbname = "user_registration";

        // Create connection
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Generate verification token
        $verification_token = generateToken();

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (fname, lname, username, email, dob, country, state, city, verification_token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssssssssss", $fname, $lname, $uname, $email, $dob, $country, $state, $city, $verification_token);

        if ($stmt->execute()) {
            // Send verification email
            $to = $email;
            $subject = "Email Verification";
            $message = "Please click the link below to verify your email:\n";
            $message .= "http://localhost/verify.php?token=" . $verification_token;
            $headers = "From: no-reply@localhost.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Registration successful! A verification email has been sent to $email.";
            } else {
                echo "Registration successful, but the verification email could not be sent.";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close connections
        $stmt->close();
        $conn->close();
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
<!-- ------------------------------------------------------------- -->




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <style>
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
			background-color: black; margin-left: 10px; border-radius: 10px; padding: 10px; width: 90px;color: white;
		}
		button a{
			color: white; font-weight: bold; font-size: 15px;
		}
    .form-center input,label,select{
      margin-bottom: 15px;
    }
    .form-center{
      background-color: white;
      width: 50%;
      margin-left: 25%;
      border-radius: 25%;
      font-weight: bold;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .form-center{
      padding-bottom: 20px;
    }
    .form-center h1{
      padding-top: 20px;
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: bolder;
    }
    footer{
      background-color: black;
      color: white;
      text-align: center;
      padding: 30px;
    }
    .error{
      color: red;
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
  <center class="form-center">
    <h1>SignUp Here!</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      FirstName: <input type="text" name="fname" id="name" required><br>
      LastName: <input type="text" name="lname" id="name" required><br>
      Username: <input type="text" name="uname" id="uname" required><br>
      Email-id: <input type="text" name="email" id="email" required><br>
      Date of Birth: <input type="date" name="dob" id="dob" required><br>
      <label for="country">Country:</label>
      <select name="country" id="country" required>
        <option>Select</option>
        <option >India</option>
        <option >Pakistan</option>
        <option >Bangladesh</option>
      </select><br>
      <label for="state">State:</label>
      <select name="state" id="state" required>
        <option>Select</option>
        <option >Tamilnadu</option>
        <option >Andrapradesh</option>
        <option >Karnataka</option>
      </select><br>
      <label for="city">City:</label>
      <select name="city" id="city" required>
        <option>Select</option>
        <option >Chennai</option>
        <option >Bangalore</option>
        <option >Hyderabad</option>
      </select><br>
      <button type="submit" name="submit" id="submit"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">Submit</a></button>
      <button><a href="login.php">Login</a></button>
      <p>Already have an account?<a href="Login.php"> Login</a>Here!</p>
    </form>
  </center>
  <br><br><br><br><br><br>
  <?php
    
  ?>
  <footer>
    <h2>@copy 2021-2024 | CONTACT: Email- mvel3372@gmail.com | Phone - +919122320705</h2>
  </footer>
  
  <script>
        function validateForm() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            if (password !== confirmPassword) {
                alert('Passwords do not match.');
                return false;
            }
            const dob = document.getElementById('dob').value;
            if (new Date(dob) >= new Date()) {
                alert('Date of Birth must be in the past.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>






