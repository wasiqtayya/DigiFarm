<?php
require_once("config.php");

if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit(); 
}

include("header.php"); 
?>

<body class="position-relative">
    <!--- main sec Start--->
    <section class="container-fluid g-0">
        <div class="main loginpage d-flex justify-content-between position-relative">
            <div class="left-wrapper w-50 position-relative">
                <div class="sitelogo-wrapper d-flex">
                    <img src="assets/img/fram-logo.png">
                </div>
                <?php
                    if(isset($_GET['p']))
                    {
                        if($_GET['p']=="register")
                        {
                            include("register.php");
                        }
                    }
                    else
                    {
                        include("login.php");
                    }
                ?>
            </div>
            <div class="image-wrapper w-50">
                <img src="assets/img/smartframing.jpg">
            </div>
        </div>
    </section>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/main.js?time=<?php echo time(); ?> "></script>
</body>

</html>