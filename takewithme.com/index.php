<?php include "head.php"; ?>
<body>
<?php include "topmenu.php"; ?>
<!-- /navbar -->
<div class="wrapper">
    <div class="container">
        <div class="row">
            <? include "leftmenu.php" ?>
            <!--/.span3-->
         <?   if (!empty($_SESSION['login']) and !empty($_SESSION['id']))echo '<div class="span9">';?>
                <div class="content">
                <?
                if (isset($_GET['id'])) {
                    ?>
                    <div class="module">
                        <div class="module-head">
                            <h3>Выберите параметры</h3>
                        </div>
                        <div class="module-body">
                            <form class="form-horizontal row-fluid" method="post" action="result.php">
                                <input type="hidden" id="country" name="country" value="<? echo $_GET['id']; ?>" />
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Цель поездки?</label>
                                    <div class="controls">
                                        <select name="PurposeOfTheTrip[]" tabindex="1" data-placeholder="Цель поездки?" class="span8">
                                            <?
                                            $query="select `NameClass`,`Place` from `settings` where `Category`='PurposeOfTheTrip'";
                                            $result = mysqli_query ($conn,$query);
                                            while ($memberinfo = mysqli_fetch_array ($result))
                                                echo '<option value="'.$memberinfo["NameClass"].'">'.$memberinfo["Place"].'</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Надолго едем?</label>
                                    <div class="controls">
                                        <select name="AreYouGoingForALongTime[]" tabindex="2" data-placeholder="Надолго едем?" class="span8">
                                            <?
                                            $query="select `NameClass`,`Place` from `settings` where `Category`='AreYouGoingForALongTime'";
                                            $result = mysqli_query ($conn,$query);
                                            while ($memberinfo = mysqli_fetch_array ($result))
                                                echo '<option value="'.$memberinfo["NameClass"].'">'.$memberinfo["Place"].'</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">С кем?</label>
                                    <div class="controls">
                                        <select name="WithWhom[]" tabindex="3" data-placeholder="С кем?" class="span8">
                                            <?
                                            $query="select `NameClass`,`Place` from `settings` where `Category`='WithWhom'";
                                            $result = mysqli_query ($conn,$query);
                                            while ($memberinfo = mysqli_fetch_array ($result))
                                                echo '<option value="'.$memberinfo["NameClass"].'">'.$memberinfo["Place"].'</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Чем добираемся?</label>
                                    <div class="controls">
                                        <select name="WhatAreWeGetting[]" tabindex="4" data-placeholder="Чем добираемся?" class="span8">
                                            <?
                                            $query="select `NameClass`,`Place` from `settings` where `Category`='WhatAreWeGetting'";
                                            $result = mysqli_query ($conn,$query);
                                            while ($memberinfo = mysqli_fetch_array ($result))
                                                echo '<option value="'.$memberinfo["NameClass"].'">'.$memberinfo["Place"].'</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Где будем жить?</label>
                                    <div class="controls">
                                        <select name="WhereWillWeLive[]" tabindex="5" data-placeholder="Где будем жить?" class="span8">
                                            <?
                                            $query="select `NameClass`,`Place` from `settings` where `Category`='WhereWillWeLive'";
                                            $result = mysqli_query ($conn,$query);
                                            while ($memberinfo = mysqli_fetch_array ($result))
                                                echo '<option value="'.$memberinfo["NameClass"].'">'.$memberinfo["Place"].'</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Какая погода?</label>
                                    <div class="controls">
                                        <select name="WhatIsTheWeatherLike[]" tabindex="6" data-placeholder="Какая погода?" class="span8">
                                            <?
                                            $query="select `NameClass`,`Place` from `settings` where `Category`='WhatIsTheWeatherLike'";
                                            $result = mysqli_query ($conn, $query);
                                            while ($memberinfo = mysqli_fetch_array ($result))
                                                echo '<option value="'.$memberinfo["NameClass"].'">'.$memberinfo["Place"].'</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <input type="hidden" name="country" value="<? echo $_GET['id'];?>"/>
                                        <button type="submit" class="btn">Найти</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        <?
                }
                else
                {
                ?>
                    <div class="module-head" id="place" style="height:400px; width: 800px; margin: 0 auto;">
                        <h1>Выберите страну</h1></div>
                    <script type="text/javascript">
                        function countryclick(tld) {
                            location.href = "http://takewithme.com/index.php?id=" + tld;
                        }
                        jQuery(document).ready(function(){
                            jQuery('#place').SVGWorldMap({
                                bottom:20, /* Bottom padding (removes antarctica from map) */
                                clickhandler :'countryclick', /* Click handler function name */
                                c : {} /* Country classes */
                            });
                        });
                    </script>
                    <!--/.content-->
                    <?}?>
                </div>
                <!--/.content-->

            <?   if (!empty($_SESSION['login']) and !empty($_SESSION['id']))echo '</div>';?>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<? include "footer.php"?>
