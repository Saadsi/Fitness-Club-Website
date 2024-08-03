<?php
// Подключение к базе данных и выполнение запроса на получение данных

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$sql = "SELECT * FROM workout";
$result = mysqli_query($conn, $sql);

// Формирование массива данных
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Возвращаем данные в формате JSON
header('Content-Type: application/json');
echo json_encode($data);

mysqli_close($conn);
?>
