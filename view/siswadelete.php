<?php

require_once"../config/database.php";
require_once"../repository/siswarepository.php";
require_once"../service/siswaservice.php";

use database\connection;
use repository\siswarepositoryimpl;
use service\siswaserviceimpl;


$id = $_GET['id'];

$connection = connection::gas();
$repository = new siswarepositoryimpl($connection);
$service = new siswaserviceimpl($repository);
$service->delete($id);


header("Location: siswafind.php");
exit();
