
<?php


$link = mysqli_connect("localhost:3306", "root", "", "nichan");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($link,"utf8");

$id = $_GET["id"];
$content = $_GET["content"];

// \nを<br/>に変換
$content = str_replace ("\n","<br/>",$content);


if ($id==""){
    
}else{

    mysqli_query($link,"INSERT INTO `thread$id` (`id`, `content`,`time`) VALUES (NULL, '$content', current_timestamp());");
}



//スレッドにコメントを追加



if($_GET['送信']){
$uri = $_SERVER['HTTP_REFERER'];
header("Location: ".$uri);
}
?>

