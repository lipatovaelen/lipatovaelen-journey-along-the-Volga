<? include "head.php";

if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['fio'])) { $fio=$_POST['fio']; if ($fio =='') { unset($fio);} }

if (!empty($email) and !empty($fio))
{
    $query="update `users` set `FIO`='".$fio."', `Email`='".$email."'";
    $result = mysqli_query ($conn,$query);
    if ($result == 'TRUE') {
        $_SESSION['login']=$email;
        $_SESSION['FIO']=$fio;
    }
}

?>
<body>
<? include "topmenu.php"; ?>
<!-- /navbar -->
<div class="wrapper">
    <div class="container">
        <div class="row">
            <? include "leftmenu.php"?>
            <!--/.span3-->
            <div class="span9">
                <div class="content">
                    <div class="module">
                        <div class="module-head">
                            <h3>Информация о пользователе</h3>
                        </div>
                        <div class="module-body">
                            <div class="stream-list">
                                <div class="media stream">
                                    <div class="media-avatar medium pull-left">
                                        <?
                                            echo '<img src="'.$_SESSION['Photo'].'">';
                                        ?>
                                    </div>
                                    <div class="media-body">
                                        <form class="form-horizontal row-fluid" method="post" action="profile.php">
                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">ФИО</label>
                                                <div class="controls">
                                                    <input type="text" name="fio" id="fio" value="<? echo $_SESSION['FIO']; ?>"  placeholder="<? echo $_SESSION['FIO']; ?>" class="span8">
                                                </div>
                                                <br>
                                                <label class="control-label" for="basicinput">E-mail</label>
                                                <div class="controls">
                                                    <input type="text" name="email" id="email" value="<? echo $_SESSION['login'];?>"  placeholder="<? echo $_SESSION['login'];?>" class="span8">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <button type="submit" class="btn">Сохранить</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="wrapper-div" style="text-align:center; padding:0px; width:100px; height:100px; border:1px dashed grey;">
                                        <div id="drop-area">
                                            <h3 class="drop-text">Замена фото</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<? include "footer.php"?>
