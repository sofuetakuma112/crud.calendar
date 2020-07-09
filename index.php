<?php
require('dbconnect.php');


$year=date('Y');
$month=date('n');

// その月の最後が何日かを調べている
$last_day=date('j', mktime(0, 0, 0, $month + 1, 0, $year));

$calendar=array();
$j=0;

for ($i=1; $i < $last_day + 1; $i++) {
    $week=date('w', mktime(0, 0, 0, $month, $i, $year));

    if ($i==1) {
        for ($s=1; $s<=$week; $s++) {
            $calendar[$j]['day']='';
            $j++;
        }
    }

    $calendar[$j]['day']=$i;
    $j++;

    if ($i==$last_day) {
        for ($e=1; $e<=6 - $week; $e++) {
            $calendar[$j]['day']='';
            $j++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php echo $year; ?>年<?php echo $month; ?>月のカレンダー
    <br>
    <table>
        <tr>
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </tr>

        <tr>
        <?php $cnt=0; ?>
        <?php foreach ($calendar as $key => $value): ?>

            <td>
            <?php $cnt++; ?>
            <a href="memo.php?id=<?php echo $value['day']; ?>"><?php echo $value['day']; ?></a>
            </td>

        <?php if ($cnt == 7): ?>
        </tr>
        <!-- <tr> -->
        <?php $cnt=0; ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <!-- </tr> -->
    </table>
    <h2>メモ内容</h2>
    <?php $memos=$db->query('SELECT * FROM memos ORDER BY id ASC'); ?>
    <article>
        <?php while ($memo = $memos->fetch()): ?>
            <time><?php print($memo['id']) ?>日</time>
            <p><?php print($memo['memo']); ?></p>
            <a href="update.php?id=<?php print($memo['id']) ?>">編集する</a>
            <a href="delete.php?id=<?php print($memo['id']) ?>">削除する</a><br>
        <?php endwhile; ?>
    </article>
</body>
</html>