<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="ozimizdata";
$conn=new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Ошибка подключения: ".$conn->connect_error);
}
$email=$_POST['email'];
$password=$_POST['password'];
$db= "SELECT * FROM userinfo WHERE User_email='$email' AND User_password='$password'";
$a=$conn->query($db);
if($a->num_rows == 1){
    $_SESSION['email']= $email;
    header("Location:Courses.html");
}
else{
    header("Location:ozimiz.html");
}
$conn->close();
?>