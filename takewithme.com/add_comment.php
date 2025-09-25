<? include "bd.php";

if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    exit ("Доступ на эту страницу разрешен только зарегистрированным пользователям. Если вы зарегистрированы, то войдите на сайт под своим логином и паролем<br><a href='index.php'>Главная страница</a>");
}
if (isset($_POST['idset'])) { $idset = $_POST['idset']; if ($idset == '') { unset($idset);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['comment'])) { $comment=$_POST['comment']; if ($comment =='') { unset($comment);} }

if (!empty($idset) and !empty($comment)) {
    $query="INSERT INTO `comments`(`IDUser`, `IDSet`, `CDate`, `CText`)  VALUES('" . $_SESSION['id'] . "','" . $idset . "',NOW(),'".$comment."')";
    $result = mysqli_query($conn, $query);
// Проверяем, есть ли ошибки
    if ($result == 'TRUE') {
        exit("Комментарий добавлен");
    } else {
        exit( "Ошибка добавления");
    }
}
