<?php 
require('dbconnect.php');
$statement = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
$statement->execute(array($_POST['memo'], $_POST['id']));
echo 'メッセージが更新されました';
?>
<a href="index.php">トップページに戻る</a>