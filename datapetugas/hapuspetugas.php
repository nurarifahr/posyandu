<?php 

//session
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}  
require 'functions4.php';

$id = $_GET["id"];
if(hapuspetugas($id) > 0){
	echo"
    <script>
      alert('Data berhasil dihapus !');
      document.location.href='datapetugas.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal dihapus !');
      document.location.href='datapetugas.php';
    </script>
    ";
  }

?>