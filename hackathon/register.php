<?php
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$number = $_POST['phone'];
$password = $_POST['password'];
$conn=new mysqli('localhost','root',"","ozimizdata");
$taken=mysqli_query($conn, "SELECT * FROM userinfo WHERE User_email = '$email'");
if(mysqli_num_rows($taken)>0){
    echo "<script> alert('Данная почта уже зарегистрирована, попробуйте зайти с данной почтой!');</script>";
    header("Location:ozimiz.html");
    exit;
}
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
else{
    $stmt = $conn->prepare("INSERT INTO userinfo(User_fname, User_lname, User_email, User_phone, User_password) VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssss", $fname, $lname, $email, $number, $password);
    $stmt ->execute();
    echo "Success";
    $stmt->close();
    $conn->close();
    header("Location: courses.html");
    exit;
}
?>