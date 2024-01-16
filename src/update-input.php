<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
$pdo=new PDO($connect,USER,PASS);
foreach($pdo->query('select * from GAME') as $row){
    echo '<form action="update-output.php" method="post">';
    echo '<input type="hidden" name="game_id" value="',$row['game_id'],'">';
    echo '<input type="text" name="game_name" value="',$row['game_name'],'">';
    echo '<input type="text" name="planning_company" value="',$row['planning_company'],'">';
    echo '<input type="submit" value="更新">';
    echo '</form>';
    echo "\n";
}
?>
<?php require 'footer.php'; ?>