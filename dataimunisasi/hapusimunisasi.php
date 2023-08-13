<?php 
require 'functions6.php';

$id = $_GET["id"];
if(hapusimunisasi($id) > 0){
	echo"
    <script>
      alert('Data berhasil dihapus !');
      document.location.href='dataimunisasi.php';
    </script>
    ";
  }else{
    echo"
    <script>
      alert('Data gagal dihapus !');
      document.location.href='dataimunisasi.php';
    </script>
    ";
  }

?>