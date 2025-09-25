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
                                if (isset($_POST['Place'])) { $Place = $_POST['Place']; if ($Place == '') { unset($Place);} }
                                if (isset($_POST['NameClass'])) { $NameClass = $_POST['NameClass']; if ($NameClass == '') { unset($NameClass);} }
                                foreach($_POST['Category'] as $selected) $Category=$selected;

                                $query="INSERT INTO `settings` (`NameClass`, `Place`, `Category`) VALUES ('".$NameClass."','".$Place."','".$selected."')";
                                $result = mysqli_query ($conn, $query);
                                // Проверяем, есть ли ошибки
                                if ($result=='TRUE')
                                {
                                    echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Все хорошо! </strong>Информация успешно сохранена! <a href="settings.php">Вернуться к списку</a></div>';
                                }
                                else {
                                    echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Ошибка! </strong>Информация не сохранена. <a href="settings_new.php">Вернуться</a></div>';
                                }

                            }else{
                            ?>
                            <div class="module-head">
                                <h3>Добавление нового параметра</h3>
                            </div>
                            <div class="module-body">
                                <form class="form-horizontal row-fluid" action="settings_new.php" method="post">
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Название параметра</label>
                                        <div class="controls">
                                            <input type="text" id="Place" name="Place" placeholder="Название параметра" class="span8">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Английское название</label>
                                        <div class="controls">
                                            <input type="text" id="NameClass" name="NameClass" placeholder="Английское название" class="span8">
                                            <span class="help-inline">Писать без пробелов</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Категория</label>
                                        <div class="controls">
                                            <select name="Category[]" data-placeholder="Выберите категорию" class="span8">
                                                <option value="PurposeOfTheTrip">Цель поездки</option>
                                                <option value="AreYouGoingForALongTime">Длительность</option>
                                                <option value="WithWhom">С кем?</option>
                                                <option value="WhatAreWeGetting">Транспорт</option>
                                                <option value="WhereWillWeLive">Жилье</option>
                                                <option value="WhatIsTheWeatherLike">Погода</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Сохранить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?}?>
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
