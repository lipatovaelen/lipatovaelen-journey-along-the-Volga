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
                        if (isset($_GET['id'])) {
                        if ($_POST) {
                            $country=$_POST["country"];

                            $PurposeOfTheTrip="";
                            foreach($_POST['PurposeOfTheTrip'] as $selected) {
                                $PurposeOfTheTrip=$selected;
                            }
                            $AreYouGoingForALongTime="";
                            foreach($_POST['AreYouGoingForALongTime'] as $selected) {
                                $AreYouGoingForALongTime=$selected;
                            }
                            $WithWhom="";
                            foreach($_POST['WithWhom'] as $selected) {
                                $WithWhom=$selected;
                            }
                            $WhatAreWeGetting="";
                            foreach($_POST['WhatAreWeGetting'] as $selected) {
                                $WhatAreWeGetting=$selected;
                            }
                            $WhereWillWeLive="";
                            foreach($_POST['WhereWillWeLive'] as $selected) {
                                $WhereWillWeLive=$selected;
                            }
                            $WhatIsTheWeatherLike="";
                            foreach($_POST['WhatIsTheWeatherLike'] as $selected) {
                                $WhatIsTheWeatherLike=$selected;
                            }

                            $query="INSERT INTO `parametrs`(`Country`, `PurposeOfTravel`, `TravelDuration`, `FellowTravelers`, `Transport`, `PlaceOfResidence`, `Weather`) VALUES ('".$country."','".$PurposeOfTheTrip."','".$AreYouGoingForALongTime."','".$WithWhom."','".$WhatAreWeGetting."','".$WhereWillWeLive."','".$WhatIsTheWeatherLike."')";
                            $result = mysqli_query($conn,$query);

                            $query="select max(ID) as maxid from `parametrs`";
                            $row = mysqli_fetch_assoc(mysqli_query($conn,$query));
                            $maxid =  $row["maxid"];
                            ?>

                            <div class="module-head">
                                <h3>Добавить свою сборку вещей в путешествие</h3>
                            </div>
                            <div class="module-body">
                                <form class="form-horizontal row-fluid" method="post" action="addgoods.php">
                                    <input type="hidden" id="idset" name="idset" value="<? echo $maxid; ?>" />
                                    <?
                                    $query="SELECT DISTINCT `GCatName`,`GCategory` FROM `goods`";
                                    $category=mysqli_query($conn,$query);
                                    foreach ($category as $item)
                                    {
                                        echo '<div class="control-group">';
                                        echo '<label class="control-label">'.$item["GCategory"].'</label>';
                                        echo '<div class="controls">';
                                        $query="select `ID`,`GTitle` from `goods` where `GCatName`='".$item["GCatName"]."'";
                                        $goods=mysqli_query($conn,$query);
                                        while ($memberinfo = mysqli_fetch_array ($goods)) {
                                            echo '<label class="checkbox">';
                                            echo '<input type="checkbox" name="'.$item["GCatName"].'[]" value="'.$memberinfo["ID"].'">';
                                            echo $memberinfo["GTitle"];
                                            echo '</label>';
                                        }
                                        echo '</div></div>';
                                    }
                                    ?>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Добавить сборку</button>
                                        </div>
                                    </div>
                                </form>
                            </div>



                            <?


                        }
                            else {
                            ?>
                            <div class="module">
                                <div class="module-head">
                                    <h3>Выберите параметры</h3>
                                </div>
                                <div class="module-body">
                                    <form class="form-horizontal row-fluid" method="post" action="newset.php?id=<? echo $_GET['id']; ?>">
                                        <input type="hidden" id="country" name="country" value="<? echo $_GET['id']; ?>" />
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Цель поездки?</label>
                                            <div class="controls">
                                                <select name="PurposeOfTheTrip[]" tabindex="1"
                                                        data-placeholder="Цель поездки?" class="span8">
                                                    <?
                                                    $query = "select `NameClass`,`Place` from `settings` where `Category`='PurposeOfTheTrip'";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($memberinfo = mysqli_fetch_array($result))
                                                        echo '<option value="' . $memberinfo["NameClass"] . '">' . $memberinfo["Place"] . '</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Надолго едем?</label>
                                            <div class="controls">
                                                <select name="AreYouGoingForALongTime[]" tabindex="2"
                                                        data-placeholder="Надолго едем?" class="span8">
                                                    <?
                                                    $query = "select `NameClass`,`Place` from `settings` where `Category`='AreYouGoingForALongTime'";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($memberinfo = mysqli_fetch_array($result))
                                                        echo '<option value="' . $memberinfo["NameClass"] . '">' . $memberinfo["Place"] . '</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">С кем?</label>
                                            <div class="controls">
                                                <select name="WithWhom[]" tabindex="3" data-placeholder="С кем?"
                                                        class="span8">
                                                    <?
                                                    $query = "select `NameClass`,`Place` from `settings` where `Category`='WithWhom'";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($memberinfo = mysqli_fetch_array($result))
                                                        echo '<option value="' . $memberinfo["NameClass"] . '">' . $memberinfo["Place"] . '</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Чем добираемся?</label>
                                            <div class="controls">
                                                <select name="WhatAreWeGetting[]" tabindex="4"
                                                        data-placeholder="Чем добираемся?" class="span8">
                                                    <?
                                                    $query = "select `NameClass`,`Place` from `settings` where `Category`='WhatAreWeGetting'";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($memberinfo = mysqli_fetch_array($result))
                                                        echo '<option value="' . $memberinfo["NameClass"] . '">' . $memberinfo["Place"] . '</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Где будем жить?</label>
                                            <div class="controls">
                                                <select name="WhereWillWeLive[]" tabindex="5"
                                                        data-placeholder="Где будем жить?" class="span8">
                                                    <?
                                                    $query = "select `NameClass`,`Place` from `settings` where `Category`='WhereWillWeLive'";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($memberinfo = mysqli_fetch_array($result))
                                                        echo '<option value="' . $memberinfo["NameClass"] . '">' . $memberinfo["Place"] . '</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Какая погода?</label>
                                            <div class="controls">
                                                <select name="WhatIsTheWeatherLike[]" tabindex="6"
                                                        data-placeholder="Какая погода?" class="span8">
                                                    <?
                                                    $query = "select `NameClass`,`Place` from `settings` where `Category`='WhatIsTheWeatherLike'";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($memberinfo = mysqli_fetch_array($result))
                                                        echo '<option value="' . $memberinfo["NameClass"] . '">' . $memberinfo["Place"] . '</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="hidden" name="country" value="<? echo $_GET['id']; ?>"/>
                                                <button type="submit" class="btn">Найти</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        <?
                        }
                        }
                        else{
                        ?>
                            <div class="module-head" id="place" style="height:400px;">
                                <h1>Выберите страну</h1></div>
                            <script type="text/javascript">
                                function countryclick(tld) {
                                    location.href = "http://takewithme.com/newset.php?id=" + tld;
                                }
                                jQuery(document).ready(function(){
                                    jQuery('#place').SVGWorldMap({
                                        bottom:20, /* Bottom padding (removes antarctica from map) */
                                        clickhandler :'countryclick', /* Click handler function name */
                                        c : {} /* Country classes */
                                    });
                                });
                            </script>
                        <?}?>
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
