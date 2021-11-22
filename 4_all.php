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
                <th><a href="./internal/edit.php?id=$row[id_user]">Edytuj</a></th>
            </tr>
            tbl;
        }
        echo "</table>";
        if(isset($_GET['error'])){
            echo "<br>$_GET[error]<br>";
        }
        if(isset($_GET['addUser'])){
            echo <<< FORMABUSER
                <h4>Dodawanie użytkownika</h4>
                    <form action="./internal/insert.php" method="post">
                        <input type="text" name="name" placeholder="Podaj imię"><br><br>
                        <input type="text" name="surname" placeholder="Podaj nazwisko"><br><br>
                        <select name="id_city">
            FORMABUSER;
            $sql = "select * from `cities` order by city";
            $res = $con->query($sql);
            while($city = $res->fetch_assoc()){
                echo "<option value=\"$city[id_city]\">$city[city]</option>";
            }
            echo <<< FORMABUSER
                    </select><br><br>
                    <input type="date" name="bday">Data urodzenia<br><br>
                    <input type="submit" value="Dodaj użytkownika">
                </form>
            FORMABUSER;
        }else{
            echo "<br><a href='./4_all.php?addUser='>Dodaj użytkownika</a>";
        }


        $con->close();
    ?>
</body>
</html>