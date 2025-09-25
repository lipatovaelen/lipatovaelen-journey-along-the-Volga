<? include "head.php"; ?>
<body>
<? include "topmenu.php"; ?>
<!-- /navbar -->
<div class="wrapper">
    <div class="container">
        <div class="row">
            <?
            if ($_SESSION['role'] <> "admin"){
                header("Location: index.php");
                exit;
            } else {?>
                <? include "leftmenu.php" ?>
                <!--/.span3-->
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <?
                            if ($_POST)
                            {
                                if (isset($_POST['GTitle'])) { $GTitle = $_POST['GTitle']; if ($GTitle == '') { unset($GTitle);} }
                                if (isset($_POST['ID'])) { $ID = $_POST['ID']; if ($ID == '') { unset($ID);} }
                                if (!empty($GTitle) and !empty($ID)){
                                    $query = "UPDATE `goods` SET `GTitle`='" . $GTitle . "' where `ID`='" . $ID . "'";
                                    $result = mysqli_query($conn, $query);
                                    // Проверяем, есть ли ошибки
                                    if ($result == 'TRUE') {
                                        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Все хорошо! </strong>Информация успешно сохранена! <a href="goods.php">Вернуться к списку</a></div>';
                                    } else {
                                        echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Ошибка! </strong>Информация не сохранена. <a href="goods_update.php?id='.$id.'">Вернуться</a></div>';
                                    }
                                }
                            }else{
                                if ($_GET) {
                                    ?>
                                    <div class="module-head">
                                        <h3>Обновление параметра</h3>
                                    </div>
                                    <div class="module-body">
                                        <?
                                        $id=$_GET["id"];
                                        $query="select `GTitle` from `goods` where `ID`='".$id."'";
                                        $result = mysqli_query ($conn, $query);
                                        while ($memberinfo = mysqli_fetch_array ($result))
                                        {?>
                                            <form class="form-horizontal row-fluid" action="goods_update.php" method="post">
                                                <div class="control-group">
                                                    <label class="control-label" for="basicinput">Название вещи</label>
                                                    <div class="controls">
                                                        <input type="text" value="<? echo $memberinfo["GTitle"]?>" id="GTitle" name="GTitle" placeholder="Название вещи" class="span8">
                                                        <input type="hidden" name="ID" id="ID" value="<? echo $id; ?>">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <button type="submit" class="btn">Сохранить</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <? } ?>
                                    </div>
                                <?}
                                else {
                                    header("Location: settings.php");
                                    exit;
                                }
                            }?>
                        </div>
                        <br />
                    </div><!--/.content-->
                </div><!--/.span9-->
            <?}?>
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<? include "footer.php"?>
