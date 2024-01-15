<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
$game_id=$game_name=$planning_company='';
if(isset($_SESSION['GAME'])){
    $game_id=$_SESSION['GAME']['game_id'];
$game_name=$_SESSION['GAME']['game_name'];
$planning_company=$_SESSION['GAME']['planning_company'];
}
echo '<form action="insert-output.php" method="post">';
echo '<table>';
echo '<tr><td>ゲームID</td><td>';
echo '<input type="number" name="game_id" value="',$game_id,'">';
echo '</td></tr>';
echo '<tr><td>ゲームタイトル</td><td>';
echo '<input type="text" name="game_name" value="',$game_name,'">';
echo '</td></tr>';
echo '<tr><td>制作会社</td><td>';
echo '<input type="text" name="planning_company" value="',$planning_company,'">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="登録">';
echo '</form>';
?>
<?php require 'footer.php'; ?>