<?php
// Подключение к базе данных

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка подключения к базе данных

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Обработка данных формы добавления клиента

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['Client_id'];
    $surname = $_POST['Surname'];
    $name = $_POST['Name'];
    $patronymic = $_POST['Patronymic'];
    $gender = $_POST['Gender'];
    $phone_number = $_POST['Phone_number'];
    $email = $_POST['Email'];
    $birthday_date = $_POST['Birhtday_date'];
    $abonement_id = $_POST['Abonement_id'];

    // Вставка данных клиента в базу данных

    $sql = "INSERT INTO client (Client_id,Surname, Name, Patronymic,Gender,Phone_number,Email,Birthday_date,Abonement_id) VALUES ('$client_id','$surname','$name','$patronymic','$gender','$phone_number' ,'$email', '$birthday_date','$abonement_id')";

    if (mysqli_query($conn, $sql)) {
        echo "Клиент успешно добавлен";
    } else {
        echo "Ошибка добавления клиента: " . mysqli_error($conn);
    }
}
header('Location: Clients.php');

// Закрытие соединения с базой данных

mysqli_close($conn);
?>

<!-- Форма добавления клиента -->
