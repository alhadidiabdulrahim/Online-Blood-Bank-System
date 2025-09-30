<?php
session_start();

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password))
    {
        $query = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) == 1)
        {
            echo "<h1 style='color: green'> You are now logged in </h1>";
            echo "<p style='color: red'> Please wite 5 seconds... </p>";
            header( "refresh:5;url=index.html" );
        }
        else{
            echo "<h1 style='color: green'> You are not registered </h1>";
            echo "<p style='color: red'> Please wite 5 seconds... </p>";
            header('Location: Sign In.html');
        }    
    }else{
        echo "<h1 style='color: green'> Please enter vaild informations </h1>";
        echo "<p style='color: red'> Please try after 5 seconds... </p>";
        header( "refresh:5;url=Sign In.html" );
    }
    $con -> close();
}
?>
