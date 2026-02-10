<?php
require "connect.php";
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  if ($username == 'rayeda' && $password == 'rara') {
    header('location: dashboard.php');
  } else {
    echo "<script>
    alert ('Username atau Password salah!! coba lagi');
    window.location= 'index.php';
    </script>";
  }
}
