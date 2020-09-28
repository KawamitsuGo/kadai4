<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body bgcolor="efefef">



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
echo "<br/><br/>";

$title =mysqli_query($link,"SELECT DISTINCT `name` FROM `thread` WHERE `id` = $id");
foreach ($title as $row){
    echo "<h3><span style='color:red;'>".current($row)."</span></h3>";
}




$result = mysqli_query($link,"SELECT * FROM `thread$id` ");
foreach ($result as $row){
    echo current($row)." : <span style='color: green;'>名無しさん＠10万円ほしい </span>";
    next($row);
    $content = current($row);
    next($row);
    echo current($row)."<br/>".$content."<br/><br/>";

    echo PHP_EOL;
}


?>

</comment>

<!-- ここがうまく行かない。コメント内容とスレッドIDを元にコメントを追加したい-->
<?php
print "<form action=thread.php method=`GET`>";
?>

    <input type="text" name="content" placeholder="コメントを追加"/>
    <input type="submit" name="送信"/>
</form>
<br/><br/><a href=thread-index.php>スレッド一覧に戻る</a>


<?php

mysqli_close($link);
exit;
?>

