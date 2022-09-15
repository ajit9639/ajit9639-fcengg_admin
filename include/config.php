<?php
session_start();
$conn = mysqli_connect("localhost","root","","fcengg_admin");
if(!$conn){
    echo "<script>alert('Invalid')</script>";
}
?>