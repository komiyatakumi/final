<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
$pdo=new PDO($connect,USER,PASS);
if(isset($_SESSION['GAME'])){
    $id=$_SESSION['GAME']['game_id'];
    $sql=$pdo->prepare('select * from GAME where game_id!=? and game_id=?');
    $sql->execute([$id,$_POST['game_name']]); 
}else{
    $sql=$pdo->prepare('select * from GAME where planning_company=?');
    $sql->execute([$_POST['planning_company']]); 
}
if(empty($sql->fetchAll())){
    if(isset($_SESSION['GAME'])){
        $sql=$pdo->prepare('update GAME set game_id=?, game_name=?,'.'planning_company=? where id=?');
        $sql->execute([
            $_POST['game_id'],$_POST['game_name'],$_POST['planning_company'],$id]);
            $_SESSION['GAME']=[
                'game_id'=>$id,'game_name'=>$_POST['game_name'],
                'planning_company'=>$_POST['planning_company']];
echo 'お客様情報を更新しました。';
}else{
    $sql=$pdo->prepare('insert into GAME values(?,?,?)');
    $sql->execute([
        $_POST['game_id'],$_POST['game_name'],
        $_POST['planning_company']]);
echo '新規商品を追加しました。';
echo '<hr>';
}

}
?>
<?php require 'footer.php'; ?>