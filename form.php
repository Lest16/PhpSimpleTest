<?
include_once 'config.php';
header("Content-Type: text/html; charset=UTF-8");
$name = htmlentities($_POST['name']);
if(!preg_match('([А-ЯЁ]{1}[а-яё]{1,29}|[A-Z]{1}[a-z]{1,29})', $name)){
    echo "Имя введено некорректно<br>";
}

$message = htmlentities($_POST['message']);
$serverName = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$gender = htmlentities($_POST['radioGender']);
$age = $_POST['checkboxAge'];
$ageResult = '';
if (!isset($age)) {
    echo "Вы не заполнили поле возраст<br>";
}
else{
    foreach($age as $item)
    {
        if (end($age) == $item)
        {
            $ageResult.= htmlentities($item);
        }
        else
        {
            $ageResult.= htmlentities($item) . "|";
        }

    }
}
$dateOpenForm = htmlentities($_POST['dateOpenForm']);
$passwordHash = $_POST['passwordHash'];

if ($passwordHash != md5('qwerty123')){
    echo "Неправильный пароль!<br>";
}

$genderAltNames = array("men" => "Мужчина", "women" => "Женщина");
$dateOpenFormClass = new DateTime($dateOpenForm);
$dateSendForm = date('Y-m-d H:i:s');
$dateSendFormClass = new DateTime($dateSendForm);
$diffDate = $dateOpenFormClass->diff($dateSendFormClass);

echo "Время открытия формы: $dateOpenForm <br>";
echo "Время отправки данных с формы: $dateSendForm <br>";
echo "Время заполнения формы :" . $diffDate->format("%H:%I:%S") . "<br>";

/*if (mail($emailTo, "Вам пришло письмо с сайта $serverName",
    "Ваше имя: $name
    \nВаше сообщение: $message
    \nПол: $genderAltNames[$gender]
    \nВозрастная категория: $ageResult
    \nВремя открытия формы: $dateOpenForm
    \nВремя отправки данных с формы: $dateSendForm
    \nВремя заполения формы: " . $diffDate->format("%H:%I:%S"),
    "From: $emailFrom \r\n")) {
    echo "Письмо отправлено<br>";
}
else {
    echo "Ошибка<br>";
}*/

$link = mysqli_connect($db_host, $db_user, $db_password, $db_base) or die('Ошибка' . mysqli_error($link));


$query_insert = 'INSERT INTO messages (name, message, age, sex, date_open_form, date_send_form, diff_date) 
                      VALUES ("' . $name . '", 
                      "' . $message . '", 
                      "' . $ageResult . '", 
                      "' . $genderAltNames[$gender] . '" , 
                      "' . $dateOpenForm . '" , 
                      "' . $dateOpenForm . '" ,
                      "' . $diffDate->format("%H:%I:%S") . '" )';

//mysqli_query($link, $query_insert) or die('Ошибка' . mysqli_error($link));

$query_select = 'SELECT * FROM messages';
$result = mysqli_query($link, $query_select) or die('Ошибка' . mysqli_error($link));

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
echo $row["id"] . ' 
' . $row["name"] . ' 
' . $row["message"] . ' 
' . $row["age"] . ' 
' . $row["sex"] . ' 
' . $row["date_open_form"] . ' 
' . $row["date_send_form"] . ' 
' . $row["diff_date"] . ' <br />';
}

mysqli_free_result($result);
mysqli_close($link);
?>