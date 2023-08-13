<?php 
//session
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}  
require 'functions2.php';

$id = $_GET["id"];
if(hapusanak($id) > 0){
	echo"
    <script>
      alert('Data berhasil dihapus !');
      document.location.href='dataanak.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal dihapus !');
      document.location.href='dataanak.php';
    </script>
    ";
  }

?>