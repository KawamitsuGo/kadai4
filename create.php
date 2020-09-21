<?php

header( "HTTP/1.1 301 Moved Permanently" ); 
//header("Location: create-result.php");

$link = mysqli_connect("localhost:3306", "root", "", "nichan");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($link,"utf8");

$name = $_GET["name"];

mysqli_query($link,"INSERT INTO `thread` (`id`, `name`,`time`) VALUES (NULL, '$name', current_timestamp());");

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




// sql to create table
$sql = "CREATE TABLE $set (
    id int auto_increment,
    content varchar(140),
    index(id),
    time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 );"
 ;

if ($link->query($sql) === TRUE) {
    echo $set." created successfully";
} else {
    echo "Error creating table: " . $link->error;
}



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
exit;
?>