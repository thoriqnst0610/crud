<?php
  
  require_once"../config/database.php";
  require_once"../repository/siswarepository.php";
  require_once"../service/siswaservice.php";
      
      use database\connection;
      use repository\siswarepositoryimpl;
      use service\siswaserviceimpl;
      
      
      $connection = connection::gas();
      $repository = new siswarepositoryimpl($connection);
      $service = new siswaserviceimpl($repository);
  
  if($_SERVER["REQUEST_METHOD"] == "POST" ){
    
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $service->save($nama,$alamat);
    
   header("Location: siswafind.php");
    exit();
    
  }
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>tambah data</title>
</head>
<body>
  <h1>Tambah data</h1>
  <form action="" method="POST">
    <label for="nama">nama</label><br>
    <input type="text" name="nama"><br>
    <label for="alamat">alamat</label><br>
    <input type="text" name="alamat">
    <br>
    <input type="submit" value="simpan">
  </form>
</body>
</html>