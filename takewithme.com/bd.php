<?
session_start();
$site="http://takewithme.com/";
$domain='localhost';
$db_name = 'takewithme';
$db_user = 'root';
$db_pass = '';
$db_loc = 'localhost';
$conn=mysqli_connect($domain,$db_user,$db_pass,$db_name);
$conn2=mysqli_connect($domain,$db_user,$db_pass,$db_name);
if (!$conn) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
