<?php
$link = mysqli_connect("localhost:3306", "root", "", "nichan");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($link,"utf8");

$name = $_POST["name"];



$id = mysqli_query($link,"SELECT id FROM `thread` WHERE 1 ORDER BY id DESC LIMIT 1");


//改良する
foreach ($id as $row){
    foreach ($row as $data){
        $set = "thread".(string)$data;
    }
    echo "<br>";
    echo PHP_EOL;
}


//create文のSQL

//CREATE TABLE t1 (
//    id int auto_increment,
//     name varchar(10),
//    index(id),
//    ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );





echo "<br/><br/>";

$result = mysqli_query($link,"SELECT * FROM `thread` ");
foreach ($result as $row){
    foreach ($row as $data){
        echo $data.",";
    }
    echo "<br>";
    echo PHP_EOL;
}

var_dump($result);

mysqli_close($link);
?>