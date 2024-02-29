<?php
require_once("config.php");

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard • DigiFarm</title>
    <?php require('assets/element/meta.html')?>
</head>

<body class="dashbord-page position-relative">
    <!--- main sec Start--->
    <section class="container-fluid h-100 g-0">
        <div class="main position-relative d-flex justify-content-between">
        <?php require('assets/element/topBar.php')?>


        <div class="sidebar position-relative">
            <div class="side-bar-content-wrapper d-flex flex-column h-100">
                <div class="links-content d-flex flex-column justify-content-between h-100">
                    <div class="sidebar-links-wrapper">
                        <a href="dashboard.php" class="side-bar-item active-link d-flex align-items-center">
                            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M10 13H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1m-1 6H5v-4h4ZM20 3h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1m-1 6h-4V5h4Zm1 7h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1M9 9H5V5h4Z" />
                            </svg>
                            <span class="side-bar-text"> Dashboard </span>
                        </a>
                        <a href="addFarm.php" class="side-bar-item d-flex align-items-center">
                            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2">
                                    <path d="m12 8l6-3l-6-3v10" />
                                    <path
                                        d="m8 11.99l-5.5 3.14a1 1 0 0 0 0 1.74l8.5 4.86a2 2 0 0 0 2 0l8.5-4.86a1 1 0 0 0 0-1.74L16 12m-9.51.85l11.02 6.3m0-6.3L6.5 19.15" />
                                </g>
                            </svg>
                            <span class="side-bar-text"> Farm </span>
                        </a>
                        <a href="crop.php" class="side-bar-item d-flex align-items-center">
                            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 28 28">
                                <path fill="currentColor"
                                    d="m9.309 3.25l.002.002l.003.004l.012.013a6.234 6.234 0 0 1 .187.22c.125.152.302.373.516.658a25.6 25.6 0 0 1 1.619 2.443A25.522 25.522 0 0 1 14 11.896a25.522 25.522 0 0 1 2.352-5.306a25.586 25.586 0 0 1 1.619-2.443a18.396 18.396 0 0 1 .703-.878l.012-.013l.003-.004l.001-.001l.001-.001a.75.75 0 0 1 1.309.5v9.364a14.886 14.886 0 0 1 1.617-2.78a10.783 10.783 0 0 1 1.534-1.684a6.853 6.853 0 0 1 .645-.5l.044-.029l.015-.009l.005-.003l.002-.001h.001A.751.751 0 0 1 25 8.75v12.5A3.75 3.75 0 0 1 21.25 25H6.75A3.75 3.75 0 0 1 3 21.25V8.75a.75.75 0 0 1 1.136-.643l.002.001l.002.001l.005.003l.015.01a2.587 2.587 0 0 1 .192.13c.123.09.293.22.497.398c.408.357.953.903 1.534 1.683c.536.72 1.101 1.637 1.617 2.781V3.75a.75.75 0 0 1 1.309-.5M4.5 10.406V21.25a2.25 2.25 0 0 0 2.25 2.25h14.5a2.25 2.25 0 0 0 2.25-2.25V10.406c-.211.23-.44.502-.68.823c-1.023 1.374-2.226 3.64-2.83 7.148a.75.75 0 0 1-1.49-.127V5.99c-.265.394-.555.848-.852 1.357c-1.157 1.978-2.424 4.761-2.906 8.013a.75.75 0 0 1-1.484 0c-.482-3.252-1.75-6.035-2.905-8.013A25.677 25.677 0 0 0 9.5 5.99v12.26a.75.75 0 0 1-1.49.127c-.604-3.509-1.807-5.774-2.83-7.148c-.24-.32-.469-.594-.68-.823" />
                            </svg>
                            <span class="side-bar-text"> Crop </span>
                        </a>
                        <a href="costEstimation.php" class="side-bar-item d-flex align-items-center">
                            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M11 8c0 2.21-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4m0 6.72V20H0v-2c0-2.21 3.13-4 7-4c1.5 0 2.87.27 4 .72M24 20H13V3h11zm-8-8.5a2.5 2.5 0 0 1 5 0a2.5 2.5 0 0 1-5 0M22 7a2 2 0 0 1-2-2h-3c0 1.11-.89 2-2 2v9a2 2 0 0 1 2 2h3c0-1.1.9-2 2-2z" />
                            </svg>
                            <span class="side-bar-text"> Cost Estimation </span>
                        </a>
                    </div>
                    <div class="footer-of-sidebar d-none">
                        <a href="index.php" class="side-bar-item d-flex align-items-center">
                            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 32 32">
                                <path fill="currentColor"
                                    d="M16 4C9.383 4 4 9.383 4 16s5.383 12 12 12c4.05 0 7.64-2.012 9.813-5.094l-1.625-1.156A9.985 9.985 0 0 1 16 26c-5.535 0-10-4.465-10-10S10.465 6 16 6a9.99 9.99 0 0 1 8.188 4.25l1.625-1.156A11.987 11.987 0 0 0 16 4m7.344 7.281l-1.438 1.438L24.188 15H12v2h12.188l-2.282 2.281l1.438 1.438l4-4L28.03 16l-.687-.719z" />
                            </svg>
                            <span class="side-bar-text"> Logout </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content position-relative d-flex flex-column justify-content-between">
            <div class="dashboard-wrapper">
                <div id="dash-boord-content" class="content-wrapper show-data">
                    <div id="map" class="d-flex flex-wrap"></div>

                    <!-- <div class="welcome-banner d-flex flex-wrap">
                            <div class="text-content">
                                <h1 class="h1">Hey Danial, Good  to have you back!</h1>
                                <p>
                                    Monitor the status of your farm, staying informed about the latest updates on your crops and ongoing activities.

                                </p>
                                <a class="d-block text-white banner-button"> Learn More </a>
                            </div>
                            <div class="img-content">
                                <img class="" src="assets/img/banner-img.png" />
                            </div>
                        </div> -->
                    <div class="price-box-wrappwr d-flex flex-wrap">
                        <div class="price-box-item">
                            <div class="content">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-content">
                                        <h3>100+</h3>
                                        <p>Total Farms</p>
                                    </div>
                                    <div
                                        class="price-box-icon icon-color-red d-flex justify-content-center align-items-center">
                                        <span class="material-symbols-outlined">call_made</span>
                                    </div>
                                </div>
                                <div class="link-wrapper text-center">
                                    <a href="addFarm.php">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="price-box-item">
                            <div class="content">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-content">
                                        <h3>15</h3>
                                        <p>Total Crop</p>
                                    </div>
                                    <div
                                        class="price-box-icon icon-color-green d-flex justify-content-center align-items-center">
                                        <span class="material-symbols-outlined">grass</span>
                                    </div>
                                </div>
                                <div class="link-wrapper text-center">
                                    <a href="crop.html">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="price-box-item">
                            <div class="content">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-content">
                                        <h3>100+</h3>
                                        <p>Total Cost</p>
                                    </div>
                                    <div
                                        class="price-box-icon icon-color-blue d-flex justify-content-center align-items-center">
                                        <span class="material-symbols-outlined">attach_money</span>
                                    </div>
                                </div>
                                <div class="link-wrapper text-center">
                                    <a href="cost-estimation.html">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="price-box-item">
                            <div class="content">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-content">
                                        <h3>150+</h3>
                                        <p>Total Upcoming Event</p>
                                    </div>
                                    <div
                                        class="price-box-icon icon-color-blue d-flex justify-content-center align-items-center">
                                        <span class="material-symbols-outlined">calendar_month</span>
                                    </div>
                                </div>
                                <div class="link-wrapper text-center">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="table-wrapper d-flex flex-wrap">
                        <div class="col-12 col-lg-6">
                            <div class="crop-activity-table w-100">
                                <div class="top-label-table d-flex justify-content-between align-items-center">
                                    <h3>Crop Activity</h3>
                                    <a href="#"> View All </a>
                                </div>
                                <div class="table-container">
                                    <div
                                        class="crop-table-row title-row d-flex justify-content-between align-items-center">
                                        <div class="start-table-col table-col">Id</div>
                                        <div class="content-table-col table-col">
                                            Crops Name
                                        </div>
                                        <div class="content-table-col table-col">Farm Name</div>
                                        <div class="end-table-col table-col text-center">
                                            Status
                                        </div>
                                    </div>
                                    <div
                                        class="crop-table-row body-row d-flex justify-content-between align-items-center">
                                        <div class="start-table-col number-wrapper table-col">
                                            1
                                        </div>
                                        <div class="content-table-col table-col">Wheat</div>
                                        <div class="content-table-col table-col">
                                            Farms PVT limited
                                        </div>
                                        <div class="end-table-col table-col d-flex justify-content-center">
                                            <div class="status-wrapper active">Active</div>
                                        </div>
                                    </div>
                                    <div
                                        class="crop-table-row body-row d-flex justify-content-between align-items-center">
                                        <div class="start-table-col number-wrapper table-col">
                                            2
                                        </div>
                                        <div class="content-table-col table-col">Rice</div>
                                        <div class="content-table-col table-col">Farms PVT limited</div>
                                        <div class="end-table-col table-col d-flex justify-content-center">
                                            <!--                                            <div class="status-wrapper deactive">-->
                                            <!--                                                Deactivate-->
                                            <!--                                            </div>-->
                                            <div class="status-wrapper active">Active</div>
                                        </div>
                                    </div>
                                    <div
                                        class="crop-table-row body-row d-flex justify-content-between align-items-center">
                                        <div class="start-table-col number-wrapper table-col">
                                            3
                                        </div>
                                        <div class="content-table-col table-col">Maize</div>
                                        <div class="content-table-col table-col">
                                            Farms PVT limiteds
                                        </div>
                                        <div class="end-table-col table-col d-flex justify-content-center">
                                            <!--                                            <div class="status-wrapper blocked">-->
                                            <!--                                                Blocked-->
                                            <!--                                            </div>-->
                                            <div class="status-wrapper active">Active</div>
                                        </div>
                                    </div>
                                    <div
                                        class="crop-table-row body-row d-flex justify-content-between align-items-center">
                                        <div class="start-table-col number-wrapper table-col">
                                            4
                                        </div>
                                        <div class="content-table-col table-col">
                                            Sugar cane
                                        </div>
                                        <div class="content-table-col table-col">
                                            Farms PVT limited
                                        </div>
                                        <div class="end-table-col table-col d-flex justify-content-center">
                                            <div class="status-wrapper active">Active</div>
                                        </div>
                                    </div>
                                    <div
                                        class="crop-table-row body-row d-flex justify-content-between align-items-center">
                                        <div class="start-table-col number-wrapper table-col">
                                            5
                                        </div>
                                        <div class="content-table-col table-col">Wheat</div>
                                        <div class="content-table-col table-col">
                                            Farms PVT limited
                                        </div>
                                        <div class="end-table-col table-col d-flex justify-content-center">
                                            <div class="status-wrapper active">Active</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="evant-table-wrapper w-100">
                                <div class="top-label-table d-flex justify-content-between align-items-center">
                                    <h3>Upcoming Events</h3>
                                    <a href="#"> View All </a>
                                </div>
                                <div class="events-table-content">
                                    <div class="event-row d-flex align-items-center justify-content-between">
                                        <div class="event-labels">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="date-wrapper-bd d-flex flex-column justify-content-center align-items-center">
                                                    <p class="day">17</p>
                                                    <p class="month">March</p>
                                                </div>
                                                <div class="evant-name">
                                                    <div class="description">
                                                        First Plough and land Preparation
                                                    </div>
                                                    <div class="time">08:30 AM</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-row d-flex align-items-center justify-content-between">
                                        <div class="event-labels">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="date-wrapper-bd d-flex flex-column justify-content-center align-items-center">
                                                    <p class="day">17</p>
                                                    <p class="month">March</p>
                                                </div>
                                                <div class="evant-name">
                                                    <div class="description">
                                                        Start Irrigation and ensure moisture level in soil
                                                    </div>
                                                    <div class="time">08:30 AM</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-row d-flex align-items-center justify-content-between">
                                        <div class="event-labels">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="date-wrapper-bd d-flex flex-column justify-content-center align-items-center">
                                                    <p class="day">17</p>
                                                    <p class="month">March</p>
                                                </div>
                                                <div class="evant-name">
                                                    <div class="description">
                                                        Seeding and fertiliser spray
                                                    </div>
                                                    <div class="time">08:30 AM</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-row d-flex align-items-center justify-content-between">
                                        <div class="event-labels">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="date-wrapper-bd d-flex flex-column justify-content-center align-items-center">
                                                    <p class="day">17</p>
                                                    <p class="month">March</p>
                                                </div>
                                                <div class="evant-name">
                                                    <div class="description">
                                                        Carriage and Selling in the market
                                                    </div>
                                                    <div class="time">08:30 AM</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require('assets/element/footer.html')?>
        </div>
        </div>
    </section>
    
    <?php require('assets/element/alertPopup.html')?>
    <!--- main sec End --->
    <!--- Footer  end --->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/main.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR6-3A3Zsqfepqe2aXJdZ3perIq0IrdW4&callback=initMap">
    </script>
</body>

</html>
