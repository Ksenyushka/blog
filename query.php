<?php 
session_start();
require_once('DB.php');

// 1. Создание записи (добавление друга)
if(isset($_POST['creater'])){
    // Защита от SQL-инъекций
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;
    
    $sql = "INSERT INTO `kotik` (`first_name`, `name`, `last_name`, `phone`, `email`, `address`, `user_id`)
            VALUES ('$first_name', '$name', '$last_name', '$phone', '$email', '$address', '$user_id')";
    
    $result = mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) {
        echo "Ошибка: " . mysqli_error($mysqli);
        exit();
    }
    header("Location: http://localhost/Praktika/praktika/content.php");
    exit();
}

// 2. Регистрация пользователя
if(isset($_POST['redistr'])){
    // Проверка на пустые поля
    if(empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['error'] = "Все поля должны быть заполнены!";
        header("Location: http://localhost/Praktika/praktika/reg.php");
        exit();
    }
    
    // Проверка формата email
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Неверный формат email!";
        header("Location: http://localhost/Praktika/praktika/reg.php");
        exit();
    }
    
    // Защита от SQL-инъекций
    $login = mysqli_real_escape_string($mysqli, $_POST['login']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = $_POST['password'];
    
    // Проверка, существует ли уже такой email
    $check_sql = "SELECT id FROM `mimimi` WHERE `email` = '$email'";
    $check_result = mysqli_query($mysqli, $check_sql);
    
    if(mysqli_num_rows($check_result) > 0) {
        $_SESSION['error'] = "Пользователь с таким email уже существует!";
        header("Location: http://localhost/Praktika/praktika/reg.php");
        exit();
    }
    
    // Вставка нового пользователя
    $sql = "INSERT INTO `mimimi` (`login`, `email`, `password`) 
            VALUES ('$login', '$email', PASSWORD('$password'))";
    
    $result = mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) {
        echo "Ошибка регистрации: " . mysqli_error($mysqli);
        exit();
    }
    
    header("Location: http://localhost/Praktika/praktika/login.php");
    exit();
}

// 3. Вход пользователя
if(isset($_POST['login_submit'])){ // Изменено имя, чтобы не конфликтовать с переменной
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM `mimimi` WHERE `email` = '$email' AND `password` = PASSWORD('$password')";
    $result = mysqli_query($mysqli, $sql);
    
    if(mysqli_errno($mysqli)) {
        echo "Ошибка: " . mysqli_error($mysqli);
        exit();
    }
    
    $row = mysqli_fetch_assoc($result);
    if($row){
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['login'] = $row['login'];
        header("Location: http://localhost/Praktika/praktika/content.php");
        exit();
    } else {
        $_SESSION['error'] = "Неверный email или пароль!";
        header("Location: http://localhost/Praktika/praktika/login.php");
        exit();
    }
}

// 4. Обновление записи
if(isset($_POST['update'])){
    $id = (int)$_POST['id'];
    $firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    
    // Исправлена ошибка в SQL-запросе (удалено лишнее присваивание)
    $sql = "UPDATE `kotik` SET 
            `first_name` = '$firstname',
            `name` = '$name',
            `last_name` = '$last_name',
            `phone` = '$phone',
            `email` = '$email',
            `address` = '$address' 
            WHERE `id` = $id";
    
    mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) {
        echo "Ошибка обновления: " . mysqli_error($mysqli);
        exit();
    }
    header("Location: http://localhost/Praktika/praktika/content.php");
    exit();
}

// 5. Удаление записи
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM `kotik` WHERE `id` = $id";
    mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) {
        echo "Ошибка удаления: " . mysqli_error($mysqli);
        exit();
    }
    header("Location: http://localhost/Praktika/praktika/content.php");
    exit();
}

// 6. Изменение роли пользователя
if(isset($_GET['role'])){
    $id = (int)$_GET['role'];
    $sql = "UPDATE `mimimi` SET `role` = 'reader' WHERE `id` = $id";
    mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) {
        echo "Ошибка изменения роли: " . mysqli_error($mysqli);
        exit();
    }
    header("Location: http://localhost/Praktika/praktika/content.php");
    exit();
}
?>