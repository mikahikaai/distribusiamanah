<?php

include '../../../database/database.php';

$database = new Database;
$db = $database->getConnection();

$query = "SELECT * FROM pemesanan WHERE id_distro=?";
$stmt = $db->prepare($query);
$stmt->bindParam(1, $_GET['id']);
$stmt->execute();

$data = [[]];
$i=0;
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $data[$i][]=$result['id'];
  $data[$i][]=$result['nomor_order'];
  $i++;
}

echo json_encode($data);
