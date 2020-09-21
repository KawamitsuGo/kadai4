<?php
$link = mysqli_connect("localhost:3306", "root", "", "blog");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($link,"utf8");

$content = $_GET["content"];
$category = $_GET["category"];

mysqli_query($link,"INSERT INTO `article` (`id`, `content`, `categoryid`, `created`) VALUES (NULL, '$content', '$category', current_timestamp());");


$result = mysqli_query($link,"SELECT * FROM `article` ");
foreach ($result as $row){
    foreach ($row as $data){
        echo $data.",<br>";
    }
    echo PHP_EOL;
}



mysqli_close($link);
?>