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
                            if (isset($_GET['NameClass'])) { $NameClass = $_GET['NameClass']; if ($NameClass == '') { unset($NameClass);} }

                            if (isset($NameClass)) {
                                $query = "DELETE FROM `settings` WHERE `NameClass`='" . $NameClass . "'";
                                $result = mysqli_query($conn, $query);
                                if ($result == 'TRUE') {
                                    echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Все хорошо! </strong>Информация успешно удалена!</div>';
                                } else {
                                    echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Ошибка! </strong>Информация не удалена.</div>';
                                }
                            }
                            ?>
                            <div class="module-head">
                                <h3>Таблица с параметрами выбора</h3>
                                <br>
                                <p><a href="settings_new.php">Добавить новый параметр</a></p>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Английское название</th>
                                        <th>Категория</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    $query="select * from `settings`";
                                    $result = mysqli_query ($conn, $query);
                                    while ($memberinfo = mysqli_fetch_array ($result))
                                        echo '<tr class="gradeA"><td>'.$memberinfo["Place"].'</td><td>'.$memberinfo["NameClass"].'</td><td>'.$memberinfo["Category"].'</td><td><a href="settings_update.php?NameClass='.$memberinfo["NameClass"].'">Изменить</a></td><td><a href="settings.php?NameClass='.$memberinfo["NameClass"].'">Удалить</a></td></tr>';
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Название</th>
                                        <th>Английское название</th>
                                        <th>Категория</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div><!--/.module-->
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
