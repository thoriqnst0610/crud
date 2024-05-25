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
    
    if($_SERVER['REQUEST_METHOD'] == "GET"){
      
    $id = $_GET['id'];
    
    $data = $service->find($id);
    
    $id_lagi = $data['id'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    
    }
    ?>
    
      <?php
  
  if($_SERVER["REQUEST_METHOD"] == "POST" ){
    
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    
    $service->update($id,$nama,$alamat);
    
    echo"<h1>berhasil update data</h1>";
    echo"<a href='siswafind.php'>Kembali ke halaman</a>";
    exit();
    
}
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>update data</title>
</head>
<body>
  <h1>Update data</h1>
  <form action="" method="post">
    
    <label for="id">Id</label><br>
    <input type="text" name="id" value="<?= $id; ?>" readonly><br>
    <label for="nama">Nama</label><br>
    <input type="text" name="nama" value="<?= $nama; ?>"><br>
    <label for="alamat">Alamat</label><br>
    <input type="text" name="alamat" value="<?= $alamat; ?>"><br>
    <br>
    <input type="submit" value="simpan">
  </form>
</body>
</html>