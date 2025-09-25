<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="<? echo $site.'admin/';?>">Администратор, возьми меня с собой)</a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
               <? if (empty($_SESSION['login'])){?>
                   <ul class="nav pull-right">
                       <li>
                       <li>
                           <a href="<? echo $site.'admin/';?>">Войти</a>
                       </li>
                   </ul>
                <?}
                else
               {?>
                   <ul class="nav pull-right">
                       <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="images/user.png" class="nav-avatar" />
                               <b class="caret"></b></a>
                           <ul class="dropdown-menu">
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
