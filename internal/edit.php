<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
    require_once './connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id_user` = $id";
    $res = $con->query($sql);
    $row = $res->fetch_assoc();
    echo <<< DOC
        <h2>Edytuj użytkownika $row[name] $row[surname]</h4>
        <form action="./update.php?id=$row[id_user]" method="post">
            <input type="text" name="name" value="$row[name]"><br><br>
            <input type="text" name="surname" value="$row[surname]"><br><br>
            <input type="date" name="bday" value="$row[bday]"><br><br>
            <input type="submit" value="Zapisz">
    DOC;
    
?>
</body>
</html>

