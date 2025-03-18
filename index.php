<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "optiway";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос к базе данных для получения данных из таблицы Carriers
$sql = "SELECT carrier_id, name, contact_info, vehicle_type, capacity, availability FROM Carriers";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о перевозчиках</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* Белый фон */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff; /* Белый фон контейнера */
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #003366; /* Синий цвет для заголовка */
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid #ffcc00; /* Желтая граница таблицы */
            border-radius: 7px; /* Закругленные углы таблицы */
            overflow: hidden; /* Чтобы закругленные углы работали */
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 3px solid #ffcc00; /* Желтые границы ячеек */
        }
        th {
            background-color: #003366; /* Синий фон заголовков */
            color: #ffffff; /* Белый цвет текста заголовков */
        }
     
       
    </style>
</head>
<body>

<div class="container">
    <h2>Информация о перевозчиках</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Контактная информация</th>
            <th>Тип транспортного средства</th>
            <th>Грузоподъемность</th>
            <th>Доступность</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Вывод данных каждой строки
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["carrier_id"]. "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["contact_info"]. "</td>
                        <td>" . $row["vehicle_type"]. "</td>
                        <td>" . $row["capacity"]. "</td>
                        <td>" . $row["availability"]. "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='no-data'>Нет данных о перевозчиках</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

<?php
// Закрытие соединения
$conn->close();
?>