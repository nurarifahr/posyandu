<?php 
//session
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}  

require 'functions3.php';

$id = $_GET["id"];
if(hapusvaksin($id) > 0){
	echo"
    <script>
      alert('Data berhasil dihapus !');
      document.location.href='datavaksin.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal dihapus !');
      document.location.href='datavaksin.php';
    </script>
    ";
  }

?>