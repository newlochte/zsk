<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST)){
    foreach($_POST as $key => $val){
        if(empty($val)){
            header("location ../4_all.php?error=Wypełnij wszystkie dane w formularzu!");
            exit();
        }
    }
    require_once './connect.php';
    $sql = "insert into `users` (`id_user`, `id_city`, `name`, `surname`, `bday`) VALUES (NULL, '$_POST[id_city]', '$_POST[name]', '$_POST[surname]', '$_POST[bday]')";
    $con->query($sql);
    if($con->affected_rows == 1){
        header('location: ../4_all.php?error=Prawidłowo dodano użytkownika');
    }else{
        echo "$_POST[id_city], $_POST[name], $_POST[surname], $_POST[bday]";
        //header('location: ../4_all.php?error=Nie dodano użytkownika!&addUser="');
    }
}
$con->close();
?>
</body>
</html>

