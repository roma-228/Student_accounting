<header class="header">
    <div class="logo-container">
        <a class="logo">
            <img src="assets/images/logo.png" height="35" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
            data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        <?php if (isset($_GET['q'])) {
            $Search = $_GET['q'];
        } ?>
        <form action="Search.php" method="GET" class="search nav-form">
            <div class="input-group input-search">
                <input type="text" class="form-control" name="q" id="q" placeholder="Пошук">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="assets/images/!logged-user.jpg" class="img-circle"
                        data-lock-picture="assets/images/!logged-user.jpg" />
                </figure>
                <div class="profile-info">
                    <span class="name">
                        <?= $_SESSION['user']['full_name'] ?>
                    </span>
                    <span class="role">
                        <?= $adminName ?>
                    </span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="vendor/logout.php"><i class="fa fa-power-off"></i>
                            Вийти</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>