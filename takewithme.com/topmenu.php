<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="<? echo $site;?>">Возьми с собой </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
               <? if (empty($_SESSION['login']) or empty($_SESSION['id'])){?>
                   <ul class="nav pull-right">
                       <li><a href="register.php">
                               Регистрация
                           </a></li>
                       <li><a href="login.php">
                               Войти
                           </a></li>
                   </ul>
                <?}
                else
               {?>
                   <ul class="nav pull-right">
                       <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <?
                                   echo '<img src="'.$_SESSION['Photo'].'" class="nav-avatar" />';
                               ?>
                               <b class="caret"></b></a>
                           <ul class="dropdown-menu">
                               <li><a href="profile.php">Редактировать профиль</a></li>
                               <li class="divider"></li>
                               <li><a href="logout.php">Выйти</a></li>
                           </ul>
                       </li>
                   </ul>
                <?}?>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>
