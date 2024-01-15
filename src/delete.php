<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
if(isset($_SESSION['GAME'])){
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('delete from GAME where game_id=?');
    $sql->execute([$_SESSION['GAME']['game_id']]);
    echo 'ゲーム一覧から削除しました。';
    echo '<hr>';
}
?>
<?php require 'footer.php'; ?>