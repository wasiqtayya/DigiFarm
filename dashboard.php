<?php
require_once("config.php");

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
include("header.php");
?>
<body class="dashbord-page position-relative">
    <!--- main sec Start--->
    <section class="container-fluid h-100 g-0">
        <div class="main position-relative d-flex justify-content-between">
            <?php 
            include('navbar.php');
            include('sidebar.php');
            ?>

            <div class="main-content position-relative d-flex flex-column justify-content-between">

                <?php 
                if(isset($_GET['p']))
                {
                    if($_GET['p']=="farm")
                    {
                        include("farm.php");
                    }
                    else if($_GET['p']=="crop")
                    { 
                        include("crop.php");
                    }else if($_GET['p']=="costEstimation")
                    {
                        include("costEstimation.php");
                    }else if($_GET['p']=="croprecord")
                    {
                        include("cropRecord.php");
                    }                    
                }
                else
                {
                    include("dashboardPage.php");
                    
                }
                include('footer.php');
                ?>
                <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
                    <div class="modal-dialog w-100">
                        <div class="modal-content">
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
 
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/main.js?time=<?php echo time(); ?> "></script>
</body>

</html>