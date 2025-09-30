<?php
session_start();

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    if(!empty($firstName) && !empty($lastName) && !empty($username) && !empty($email) && !empty($password) && !empty($gender))
    {
        $query = "insert into registration (firstName, lastName, username, email, password, gender) values ('$firstName', '$lastName', '$username', '$email', '$password', '$gender')";
        mysqli_query($con, $query);
        
        header('Location: Sign In.html');
    }else{
        echo "Please enter vaild informations <br>";
        echo "try after 5 seconds...";
        header( "refresh:5;url=Sign Up.html" );
    }
    $con -> close();
}
?>

