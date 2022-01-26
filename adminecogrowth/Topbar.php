<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <div
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <h3><b>Laos Ewaste</b></h3>
        </div>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
        <?php 
            require_once('db.php');
            $query = "select count(*) from transictions";
            $result_tasks = mysqli_query($mysql_db, $query); 
            $row = mysqli_fetch_assoc($result_tasks);
            $count = $row["count(*)"]; ?>
                <a class="nav-link dropdown-toggle" href="Active.php">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter"><?php echo $count; ?></span>
                </a>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <?php 
                require_once('db.php');
                $query = "SELECT * FROM admin";
                $result_tasks = mysqli_query($mysql_db, $query); 
                $upload_dir = './img/school/';
                while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['username']; ?></span>
                        <img class="img-profile rounded-circle"  src="<?= "./img/admin/".$row['file']?>">
                    </a>
            <?php } ?>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="Profile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    ໂປຣໄຟ
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    ອອກຈາກລະບົບ
                </a>
            </div>
        </li>

    </ul>

</nav>