<? include "head.php";
if (isset($_POST['email'])) { $login = $_POST['email']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['md5password'])) { $password=$_POST['md5password']; if ($password =='') { unset($password);} }

if (empty($login) or empty($password)) {
    ?>
    <body>
    <?php include "topmenu.php"; ?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module module-login span4 offset4">
                    <script type="text/javascript">
                        <!--
                        function pwd_handler(form) {
                            if (form.password.value != '') {
                                form.md5password.value = md5(form.password.value);
                                form.password.value = '';
                            }
                        }

                        //-->
                    </script>
                    <form class="form-vertical" method="post" action="login.php" onsubmit="pwd_handler(this);">
                        <div class="module-head">
                            <h3>Войти в систему</h3>
                        </div>
                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="text" name="email" id="email"
                                           placeholder="Имя пользователя">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" name="password" id="password"
                                           placeholder="Пароль">
                                    <input type="hidden" id="md5password" name="md5password" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right">Войти</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.wrapper-->
    <?
}
else{
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    $query="SELECT `ID`,`Password`, `Photo`,`FIO` FROM `users` WHERE `Email`='".$login."'";
    $result = mysqli_query ($conn, $query);
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['Password']))
    {
        exit ("Извините, введённый вами login или пароль неверный.");
    }
    else {
        if ($myrow['Password']==($password)) {
            $_SESSION['login']=$login;
            $_SESSION['Photo']=$myrow['Photo'];
            $_SESSION['FIO']=$myrow['FIO'];
            $_SESSION['id']=$myrow['ID'];
            echo '<script language="JavaScript" type="text/javascript">location="'. $site.'"</script>';
        }
        else {
            //если пароли не сошлись
            exit ("Извините, введённый вами login или пароль неверный.");
        }
    }
}

include "footer.php"?>
