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
                                if (isset($_POST['GCategory'])) { $GCategory = $_POST['GCategory']; if ($GCategory == '') { unset($GCategory);} }
                                if (isset($_POST['GCatName'])) { $GCatName = $_POST['GCatName']; if ($GCatName == '') { unset($GCatName);} }
                                foreach($_POST['Category'] as $selected) $Category=$selected;

                                if (!empty($GTitle) and ((!empty($GCatName)and !empty($GCategory)) or !empty($Category) )){

                                    if (isset($Category)) if ($Category<>"") $pieces = explode(":", $Category);
                                    $query="";
                                    if (isset($pieces))
                                    {
                                        $query="INSERT INTO `goods` (`GTitle`, `GCategory`, `GCatName`) VALUES ('".$GTitle."','".$pieces[0]."','".$pieces[1]."')";
                                    }
                                    else{
                                        $query="INSERT INTO `goods` (`GTitle`, `GCategory`, `GCatName`) VALUES ('".$GTitle."','".$GCatName."','".$GCategory."')";
                                    }
                                    $result = mysqli_query ($conn, $query);
                                    // Проверяем, есть ли ошибки
                                    if ($result=='TRUE')
                                    {
                                        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Все хорошо! </strong>Информация успешно сохранена! <a href="goods.php">Вернуться к списку</a></div>';
                                    }
                                    else {
                                        echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Ошибка! </strong>Информация не сохранена. <a href="goods_new.php">Вернуться</a></div>';
                                    }
                                }
                            }else{
                                ?>
                                <div class="module-head">
                                    <h3>Добавление новой вещи</h3>
                                </div>
                                <div class="module-body">
                                    <form class="form-horizontal row-fluid" action="goods_new.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Название вещи</label>
                                            <div class="controls">
                                                <input type="text" id="GTitle" name="GTitle" placeholder="Название вещи" class="span8">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Категория</label>
                                            <div class="controls">
                                                <input type="text" id="GCategory" name="GCategory" placeholder="Категория" class="span8">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Английское название категории</label>
                                            <div class="controls">
                                                <input type="text" id="GCatName" name="GCatName" placeholder="Английское название категории" class="span8">
                                                <span class="help-inline">Писать без пробелов</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Имеющиеся</label>
                                            <div class="controls">
                                                <select name="Category[]" data-placeholder="Выберите категорию" class="span8">
                                                    <option value="">Выберите категорию</option>
                                                    <option value="Documents:Документы">Документы</option>
                                                    <option value="Anything:Всяко для путешествий">Всяко для путешествий</option>
                                                    <option value="Health:Здоровье">Здоровье</option>
                                                    <option value="Footwear:Обувь">Обувь</option>
                                                    <option value="Cosmetics:Косметика">Косметика</option>
                                                    <option value="Clothing:Одежда">Одежда</option>
                                                    <option value="Props:Реквизит">Реквизит</option>
                                                    <option value="Electronics:Электроника">Электроника</option>
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
