<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <?
            if (!empty($_SESSION['login']) and !empty($_SESSION['id'])){?>
            <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                    </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                    </i>Профиль </a>
                <ul id="togglePages" class="collapse unstyled">
                    <li><a href="profile.php"><i class="icon-inbox"></i>Редактировать профиль </a></li>
                    <li><a href="newset.php"><i class="icon-inbox"></i>Добавить свою сборку </a></li>
                </ul>
            </li>
            <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Выйти </a></li>
            <?}?>
        </ul>
    </div>
</div>
