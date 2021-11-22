<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        require_once "./internal/connect.php";
        
        $sql = "Select * from `users`";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
            echo <<< EOT
                ID: $row[id_user]<br>
                Imię: $row[name], nazwisko: $row[surname], data urodzenia: $row[bday]
                <hr>
            EOT;
        }
    ?>
</body>
</html>