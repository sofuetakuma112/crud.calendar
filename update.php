<?php require('dbconnect.php') ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>更新する内容を入力してください</h2>
    <form action="update_do.php" method="post">
        <input type="hidden" name="id" value="<?php print($_REQUEST['id']); ?>">
        <textarea name="memo" cols="30" rows="10"></textarea>
        <br>
        <input type="submit">
    </form>
</body>
</html>