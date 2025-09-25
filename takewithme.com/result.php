<?php include "head.php"; ?>
<body>
<?php include "topmenu.php"; ?>
<!-- /navbar -->
<div class="wrapper">
    <div class="container">
        <div class="row">
            <? include "leftmenu.php"?>
            <!--/.span3-->
            <div class="span9">
                <div class="content">
                    <div class="module">
                    <?
                if ($_POST) {
                    if (isset($_POST['country'])) { $country = $_POST['country']; if ($country == '') { unset($country);} }
                    foreach($_POST['PurposeOfTheTrip'] as $selected) $PurposeOfTheTrip=$selected;
                    foreach($_POST['AreYouGoingForALongTime'] as $selected) $AreYouGoingForALongTime=$selected;
                    foreach($_POST['WithWhom'] as $selected) $WithWhom=$selected;
                    foreach($_POST['WhatAreWeGetting'] as $selected) $WhatAreWeGetting=$selected;
                    foreach($_POST['WhereWillWeLive'] as $selected) $WhereWillWeLive=$selected;
                    foreach($_POST['WhatIsTheWeatherLike'] as $selected) $WhatIsTheWeatherLike=$selected;
                    $query="select `ID` from `parametrs` where `Country`='".$country."' and `PurposeOfTravel`='".$PurposeOfTheTrip."' and `TravelDuration`='"
                        .$AreYouGoingForALongTime."' and `FellowTravelers`='".$WithWhom."'  and `Transport`='".$WhatAreWeGetting."' and `PlaceOfResidence`='"
                        .$WhereWillWeLive."' and `Weather`='".$WhatIsTheWeatherLike."'";
                    $row = mysqli_fetch_assoc(mysqli_query($conn,$query));
                    $id =  $row["ID"];
                    if (isset($id)){
                    $query = "select `IDGood` from `setofthings` where `IDSet`='" . $id . "' order by `IDGood`";
                    $result = mysqli_query($conn, $query);
                    echo '<div class="module"><div class="module-head"><h3>Найденный результат</h3></div></div>';
                    echo '<table class="table table-condensed"><thead><tr><th>#</th><th>Категория</th><th>Предмет</th></tr></thead><tbody>';
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $query2 = "select `GTitle`,`GCategory` from `goods` where `ID`='" . $row["IDGood"] . "'";
                        $result2 = mysqli_query($conn2, $query2);
                        while ($goods = mysqli_fetch_array($result2)) {
                            echo '<tr><td>' . $i . '</td><td>' . $goods["GCategory"] . '</td><td>' . $goods["GTitle"] . '</td></tr>';
                            $i++;
                        }
                    }
                    echo '</tbody></table>';
                    ?>
                        <div class="module-body">
                            <div class="stream-list">
                                <?
                                $query = "select `users`.`Photo`,`users`.`FIO`,`comments`.`CDate`, `comments`.`CText` from `comments`,`users` where `comments`.`IDSet`='" . $id . "' and `users`.`ID`=`comments`.`IDUser`";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <div class="media stream">
                                        <div class="media-avatar medium pull-left">
                                            <img alt="" src="<? echo $row["Photo"]; ?>"/>
                                        </div>
                                        <div class="media-body">
                                            <div class="stream-headline">
                                                <h5 class="stream-author">
                                                    <? echo $row["FIO"]; ?>
                                                    <small><? echo $row["CDate"]; ?></small>
                                                </h5>
                                                <div class="stream-text">
                                                    <? echo $row["CText"]; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?
                                }
                                ?>
                            </div>
                            <?
                            if (!empty($_SESSION['login']) and !empty($_SESSION['id']))
                            {
                            ?>
                            <form class="form-horizontal row-fluid" method="post" action="add_comment.php">
                                <input type="hidden" name="idset" id="idset" value="<? echo $id;?>" />
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Комментарий</label>
                                    <div class="controls">
                                        <textarea name="comment" id="comment" class="span8" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Добавить комментарий</button>
                                    </div>
                                </div>
                            </form>
                            <?
                            }
                            ?>
                        </div>
                    </div>
                        <?
                    }
                    else
                    {?>

                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>К сожалению!</strong> У нас ничего не нашлось...
                        </div>
                    <?}
                }
                else{
                ?>



                <?
                }
                ?>
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
