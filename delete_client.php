<?php
// Устанавливаем соединение с базой данных

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем соединение с базой данных

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Получаем идентификатор клиента из параметра URL

$client_id = $_GET['id'];

// Удаляем клиента из базы данных

$sql = "DELETE FROM client WHERE Client_id = $client_id";

if (mysqli_query($conn, $sql)) {
    // Успешное удаление, перенаправление на страницу клиентов
    header('Location: Clients.php');
} else {
    echo "Ошибка удаления: " . mysqli_error($conn);
}

// Закрываем соединение с базой данных
mysqli_close($conn);
?>
