<?
header("Content-Type: text/html; charset=UTF-8");
$name = htmlentities($_POST['name']);
$message = htmlentities($_POST['message']);
$serverName = $_SERVER['SERVER_NAME'];
$gender = htmlentities($_POST['radioGender']);
$age = $_POST['checkboxAge'];
$hiddenInfo = htmlentities($_POST['hiddenTest']);

foreach($age as $item)
{
    $output.= htmlentities($item) . " ";
}

mail("uvarov.artem16@yandex.ru", "Вам пришло письмо с сайта $serverName",
    "Ваше имя: $name \nВаше сообщение: $message \nПол: $gender \nВозрастная категория: $output \nСкрытый блок: $hiddenInfo",
    "From: piligrim16@mail.ru \r\n"
    ."X-Mailer: PHP/" . phpversion());

echo "Письмо отправлено<br>";
?>