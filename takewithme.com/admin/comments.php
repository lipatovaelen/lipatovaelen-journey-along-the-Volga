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
                            if (isset($_GET['id'])) { $ID = $_GET['id']; if ($ID == '') { unset($ID);} }

                            if (isset($ID)) {
                                $query = "DELETE FROM `comments` WHERE `ID`='" . $ID . "'";
                                $result = mysqli_query($conn, $query);
                                if ($result == 'TRUE') {
                                    if (mysqli_affected_rows($conn)>0)
                                        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Все хорошо! </strong>Информация успешно удалена!</div>';
                                    else
                                        echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Внимание! </strong>Ни одна запись не удалена.</div>';
                                } else {
                                    echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Ошибка при удалении! </strong>Информация не удалена.</div>';
                                }
                            }
                            ?>
                            <div class="module-head">
                                <h3>Таблица с комментариями</h3>
                                <br>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Комментарий</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    $query="select ID, CText from `comments`";
                                    $result = mysqli_query ($conn, $query);
                                    while ($memberinfo = mysqli_fetch_array ($result))
                                        echo '<tr class="gradeA"><td>'.$memberinfo["CText"].'</td><td><a href="comments.php?id='.$memberinfo["ID"].'">Удалить</a></td></tr>';
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Комментарий</th>
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
