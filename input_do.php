<?php 
require('dbconnect.php');
$statement = $db->prepare('INSERT INTO memos SET memo=?, id=?');
$statement->execute(array($_POST['memo'], $_POST['id']));
echo 'メッセージが登録されました';
header('Location: index.php');
?>
<a href="index.php">トップページに戻る</a>

