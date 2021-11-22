<?php
if($_GET['id']){
    $id = $_GET['id'];
    require_once "./connect.php";
    
    $sql = "Delete from `users` where `users`.id_user=$id";
    $con->query($sql);
    if($con->affected_rows == 1){
        echo "Usunięto";
        header("location: ../3_bazy_tabela_delete.php?delete=$id");
    }else{
        echo "Nie usunięto";
    }
    $con->close();
}else{
    header("location: .../3_bazy_tabela_delete.php");
}
?>
