<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<form action="product.php"method="post">
商品検索
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>
<hr>
<?php
echo '<table>';
echo '<tr><th>ゲームID</th><th>ゲームタイトル</th><th>制作会社</th></tr>';
$pdo=new PDO($connect,USER,PASS);
if(isset($_POST['keyword'])){
$sql=$pdo->prepare('select * from GAME where game_name like ?');
$sql->execute(['%'.$_POST['keyword'].'%']);
}else{
    $sql=$pdo->query('select * from GAME');
}
foreach($sql as $row){
$id=$row['game_id'];
echo '<tr>';
echo '<td>',$id,  '</td>';
echo '<td>',$row['game_name'], '</td>';
echo '<td>',$row['planning_company'],'</td>';
echo '</tr>';
}
echo '</table>';
?>
<?php require 'footer.php'; ?>