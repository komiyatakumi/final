<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<form action="product.php"method="post">
<?php
if(isset($_GET['game_id'])){
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('delete from GAME where game_id=?');
    $sql->execute([$_GET['game_id']]);
    echo 'ゲーム一覧から削除しました。';
    echo '<hr>';
}
echo '<td><a href="product.php">戻る</a></td>';
?>
</form>
<?php require 'footer.php'; ?>