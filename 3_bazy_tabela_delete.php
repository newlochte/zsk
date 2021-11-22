<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php
        require_once "./internal/connect.php";
        
        $sql = "Select * from `users`";
        $result = $con->query($sql);
        if(isset($_GET['delete'])){
            echo "Rekord usunięty prawidłowo użytkownika o id=".$_GET['delete']."<hr>";
        }
        echo <<< tbl
            <table>
            <tr>
                <th>Id</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Data urodzenia</th>
            </tr>
            tbl;
        while($row = $result->fetch_assoc()){
            echo <<< tbl
            <tr>
                <th>$row[id_user]</th>
                <th>$row[name]</th>
                <th>$row[surname]</th>
                <th>$row[bday]</th>
                <th><a href="./internal/delete.php?id=$row[id_user]">Usuń</a></th>
            </tr>
            tbl;
        }
        echo "</table>";
        $con->close();
    ?>
</body>
</html>