<?php
if(isset($_POST)){
    foreach($_POST as $key => $val){
        if($val == ""){
            header("location: ../4_all.php?error=Dane nie mogą być puste");
            exit();
        }
    }
    require_once './connect.php';
    $sql = "UPDATE `users` SET `name` = '$_POST[name]', 
    `surname` = '$_POST[surname]', `bday` = '$_POST[bday]' 
    WHERE `users`.`id_user` = $_GET[id]";
    $con->query($sql);
    if($con->affected_rows == 1){
        header('location: ../4_all.php?error=Zapisano zmiany użytkownika');
    }else{
        header('location: ../4_all.php?error=Nie zmieniono danych!&id=$_GET[id]');
    }
}
$con->close();
?>