<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('update GAME set game_name=?,planning_company=? where game_id=?');

if(empty($_POST['game_name'])){
    echo 'ゲームタイトルを入力してください。';
}else
if(empty($_POST['game_name'])){
    echo '制作会社を入力してください。';
}
if($sql->execute([htmlspecialchars($_POST['game_name']),$_POST['planning_company'],$_POST['game_id']])){
    echo '更新に成功しました。';
}else{
    echo '更新に失敗しました。';
}
?>
<hr>
<table>
<tr><th>ゲームID</th><th>ゲームタイトル</th><th>制作会社</th></tr>
<?php
foreach($pdo->query('select * from GAME') as $row){
echo '<tr>';
echo '<td>',$row['game_id'],'</td>';
echo '<td>',$row['game_name'], '</td>';
echo '<td>',$row['planning_company'],'</td>';
echo '</tr>';
}
echo '</table>';
echo '<td><a href="menu.php">戻る</a></td>';
?>
<?php require 'footer.php'; ?>