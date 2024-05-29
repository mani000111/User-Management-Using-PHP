<?php
    if(isset($_POST["submit"]))
    {
      $fname=$_POST["fname"];
      $lname=$_POST["lname"];
      $uname=$_POST["uname"];
      $email=$_POST["email"];
      $dob=$_POST["dob"];
      $country=$_POST["country"];
      $state=$_POST["state"];
      $city=$_POST["city"];

    //conncecting database
    $con=mysqli_connect("localhost","root","","users");
    $tab="INSERT INTO details(fname,lname,username,email,dob,country,state,city)values('$fname','$lname','$uname','$email','$dob','$country','$state','$city')";
    $cm=mysqli_query($con,$tab);
    if($cm){
      echo "1 row inserted";
    }
    else{
      echo "No changes made!";
    }
    }
  ?>