<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>2500000ちゃんねる</title>
    <link rel="stylesheet" href="style.css">
</head>

<header>
<h1>  250000ちゃんねる</h1>
</header>
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
    echo current($row)."<p class='indent-1'>".$content."</p>";

    echo PHP_EOL;
}

?>


<hr>
<!-- コメントを追加 -->
<input type="submit" name="送信"/>
<input type="text" name="name" placeholder="名前を追加"/>
<?php
print "<form action=add-comment.php method=`GET`>";
?>
    <textarea name="content" rows="4" cols="40" placeholder="コメントを追加"></textarea><br/>
    
    <input type="hidden" name="id" value="<?php echo $id;?>"/>
</form>
<br/><br/><a href=thread-index.php>スレッド一覧に戻る</a>


<?php
mysqli_close($link);
exit;
?>

