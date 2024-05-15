<?php
require_once __DIR__ . '/utils/DataSource.php';

$dataSource = new DataSource();
$result=$dataSource->getConnection()->prepare("select * from myinfo");
$result->execute();
$row=$result->fetch(PDO::FETCH_ASSOC);
echo "MY NAME IS ".$row["FIRST"]." ".$row["LAST"];
?>