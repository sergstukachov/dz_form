<?php
$name = trim(strip_tags($_POST["name"]));
$email = trim(strip_tags($_POST["email"]));
$password = trim(strip_tags($_POST["password"]));
$passRepeat = trim(strip_tags($_POST["pR"]));
//echo $password;
//echo $name;
$host = 'localhost';  // Хост, у нас все локально
$user = 'newuser';    // Имя созданного вами пользователя
$pass = '333'; // Установленный вами пароль пользователю
$db_table = "users";
$db_name = 'my_form';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

// Ругаемся, если соединение установить не удалось
if (!$link) {
    echo '
I can not connect to the database. Error code:' . mysqli_connect_errno() . ',error: ' . mysqli_connect_error();
    exit;
}
//echo $passRepeat;
if((!empty($name) )&& filter_var($email, FILTER_VALIDATE_EMAIL)){
    if (!empty($password)&&($password===$passRepeat)) {
        echo $name . " 
Thanks! Data entered is correct.";
        //Вставляем данные, подставляя их в запрос
        $sql = mysqli_query($link, "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name','$email' , '$password')");
        //Если вставка прошла успешно
        if ($sql) {
            echo '<p>
You have successfully completed the registration.</p>';
        } else {
            echo '<p>
An error has occurred: ' . mysqli_error($link) . '</p>';
        }}
    else echo'check password';
}
else echo'Luser :) ';



