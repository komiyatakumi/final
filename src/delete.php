<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'product.php'; ?>
<?php
unset($_SESSION['GAME'][$_GET['game_id']]);
echo 'ゲーム一覧から削除しました。';
echo '<hr>';
?>
<?php require 'footer.php'; ?>