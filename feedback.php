<?php
session_start();

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $fullName = $_POST['fname'];
    $email = $_POST['email'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $suggestions = $_POST['suggestions'];

    if(!empty($fullName) && !empty($email) && !empty($q1) && !empty($q2) && !empty($q3) && !empty($q4) && !empty($q5) && !empty($q6) && !empty($suggestions))
    {
        $query = "insert into feedback (fullName, email, q1, q2, q3, q4, q5, q6, suggestions) values ('$fullName', '$email', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$suggestions')";
        mysqli_query($con, $query);
        
        header('Location: index.html');
    }else{
        echo "Please enter vaild informations <br>";
        echo "try after 5 seconds...";
        header( "refresh:5;url=feedback.php" );
    }
    $con -> close();
}
?>