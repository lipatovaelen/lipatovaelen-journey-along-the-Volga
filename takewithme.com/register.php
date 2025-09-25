<? include "head.php";
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['md5password'])) { $password=$_POST['md5password']; if ($password =='') { unset($password);} }
if (empty($email) or empty($password)) {
?>
<body>
<?php include "topmenu.php"; ?>
	<div class="wrapper">
		<div class="container">
                        <div class="row">
				<div class="module module-login span4 offset4">
                    <script type="text/javascript">
                        <!--
                        function pwd_handler(form)
                        {
                            if (form.password.value != '')
                            {
                                form.md5password.value = md5(form.password.value);
                                form.password.value = '';
                            }
                        }
                        //-->
                    </script>
					<form class="form-vertical" action="register.php" method="post" onsubmit="pwd_handler(this);">
						<div class="module-head">
							<h3>Зарегистрироваться в систему</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" name="email" id="email" placeholder="Имя пользователя">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" name="password" id="password" placeholder="Пароль">
                                    <input type="hidden" id="md5password"  name="md5password" value="" />
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right">Зарегистрироваться</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->
<? }
else {
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $email = trim($email);
    $password = trim($password);
    $query="SELECT 'ID' FROM users WHERE `Email`='$email'";
    $result = mysqli_query ($conn, $query);
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['ID'])) {
        echo "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";
        exit();
    }
// если такого нет, то сохраняем данные
    $query="INSERT INTO `users`(`Email`, `Password`, `Photo`)  VALUES('" . $email . "','" . $password . "','images/user.png')";
    $result2 = mysqli_query($conn, $query);
// Проверяем, есть ли ошибки
    if ($result2 == 'TRUE') {
        echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='login.php'>Войти</a>";
    } else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
}
include "footer.php";
?>
