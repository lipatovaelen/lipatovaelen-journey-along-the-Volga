<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <?
            if (!empty($_SESSION['login'])){?>
                <li><a href="goods.php"><i class="icon-check"></i> Предметы</a></li>
                <li><a href="parametrs.php"><i class="icon-check"></i> Наборы предметов</a></li>
                <li><a href="settings.php"><i class="icon-inbox"></i> Параметры</a></li>
                <li><a href="comments.php"><i class="icon-inbox"></i> Комментарии</a></li>
                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Выйти </a></li>
            <?}?>
        </ul>
    </div>
</div>
