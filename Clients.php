<?php
// Подключение к базе данных (замените значения на свои)

// Создание подключения
$connection = mysqli_connect("localhost", "root", "", "karimov_t");

// SQL-запрос для выборки данных из таблицы "client"
$sql = "SELECT * FROM 'client'";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Список клиентов</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        table {
            color: white;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<h2>Список клиентов</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Пол</th>
        <th>Номер телефона</th>
        <th>Электронная почта</th>
        <th>Дата рождения</th>
        <th>ID Абонемента</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        header('Content-Type: text/html; charset=utf-8');
        // Вывод данных каждого клиента в таблицу
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["Client_id"]."</td>";
            echo "<td>".$row["Surname"]."</td>";
            echo "<td>".$row["Name"]."</td>";
            echo "<td>".$row["Patronymic"]."</td>";
            echo "<td>".$row["Gender"]."</td>";
            echo "<td>".$row["Phone_number"]."</td>";
            echo "<td>".$row["Email"]."</td>";
            echo "<td>".$row["Birthday_date"]."</td>";
            echo "<td>".$row["Abonement_id"]."</td>";
            echo "<td>".'<a href="delete_client.php?id=' . $row["Client_id"]. '" style="color: white">Удалить клиента</a>'."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Нет данных</td></tr>";
    }
    ?>
</table>
<form style="color: white" action="add_client.php" method="POST">
    <input type="text" name="Client_id" required placeholder="ID клиента"><br>

    <input type="text" name="Surname" required placeholder="Фамилия"><br>

    <input type="text" name="Name" required placeholder="Имя"><br>

    <input type="text" name="Patronymic" required placeholder="Отчество"><br>

    <input type="text" name="Gender" required placeholder="Пол"><br>

    <input type="text" name="Phone_number" required placeholder="Номер телефона"><br>

    <input type="text" name="Email" required placeholder="Почта"><br>

    <input type="text" name="Birthday_date" required placeholder="Дата рождения"><br>
    
    <input type="text" name="Abonement_id" required placeholder="ID абонемента"><br>


    <input type="submit" value="Добавить клиента">
</form>


</body>
</html>

<?php
// Закрытие соединения с базой данных
$connection->close();
?>
