<div class="header-top d-flex align-items-center justify-content-between bg-body w-100 position-fixed">
    <div class="profile-wrapper d-flex justify-content-between align-items-center">
        <div class="profile-icon-svg">
            <img src="assets/img/fram-logo.png">
        </div>
        <div id="side-menu" class="menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="svg replaced-svg">
                <path fill="#525768"
                    d="M5,8H19a1,1,0,0,0,0-2H5A1,1,0,0,0,5,8Zm16,3H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Zm-2,5H5a1,1,0,0,0,0,2H19a1,1,0,0,0,0-2Z">
                </path>
            </svg>
        </div>
    </div>
    <div class="profile-info-wrapper d-flex align-items-center">
        <div class="dropdown-links-wrapper">
            <a class="drop-down-item d-flex align-items-center logout">
                <span class="drop-down-icon  material-symbols-outlined">logout</span>
            </a>
        </div>

        <div id="profile-dropdown" class="d-flex align-items-center h-100">
            <div class="user-profile-icon">
                <img src="assets/img/author-nav.png">
            </div>
            <?php
            $email = $_SESSION['email'];
            $log_in = "SELECT name FROM user WHERE email='$email'";
            $log_in_rs = mysqli_query($conn, $log_in);

            if($log_in_rs) {
                $row = mysqli_fetch_assoc($log_in_rs);
            $name = $row['name'];
                            ?>
            <span><?php echo $name; ?></span>
            <?php
                        } else {
                echo "Error: " . mysqli_error($conn);
                        }
            ?>
        </div>
    </div>
    <div id="drop-down-toggler">
        <span class="material-symbols-outlined">more_vert</span>
    </div>
</div>