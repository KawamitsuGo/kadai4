<?php
$link = mysqli_connect("localhost:3306", "root", "", "nichan");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($link,"utf8");



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
foreach($result as $row){
    $id = current($row);
    next($row);
    echo "<a href=thread-detail.php?id=$id>".current($row)."</a>";
    next($row);
    echo "　　".current($row);
    echo "<br/>";
    echo PHP_EOL;
}

function get_first_element($arr) {
    // 引数として受け取った時点で常に内部ポインタは初期化されている！
    return current($arr);
}



echo"<br/><br/>";

//$result = mysqli_query($link,"SELECT * FROM `thread` ");
//foreach($result as $row){
//    foreach ($row as $data){
//        echo $data.",";
//    }
//    echo "<br>";
//    echo PHP_EOL;
//}

mysqli_close($link);

?>

<a href= index.php> トップに戻る</a>