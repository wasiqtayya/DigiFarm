<?php
require_once("config.php");

if (!isset($_SESSION['email'])) {
    // Redirect the user to the login page
    header("Location: index.php");
    exit(); // Stop executing further code
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cost Estimation • DigiFarm</title>
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
                        <a href="dashboard.php" class="side-bar-item d-flex align-items-center">
                            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg"
                                 width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M10 13H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1m-1 6H5v-4h4ZM20 3h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1m-1 6h-4V5h4Zm1 7h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1M9 9H5V5h4Z"/>
                            </svg>
                            <span class="side-bar-text">
                             Dashboard
                         </span>
                        </a>
                        <a href="addFarm.php" class="side-bar-item d-flex align-items-center">
                            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg"
                                 width="20" height="20" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="2">
                                    <path d="m12 8l6-3l-6-3v10"/>
                                    <path d="m8 11.99l-5.5 3.14a1 1 0 0 0 0 1.74l8.5 4.86a2 2 0 0 0 2 0l8.5-4.86a1 1 0 0 0 0-1.74L16 12m-9.51.85l11.02 6.3m0-6.3L6.5 19.15"/>
                                </g>
                            </svg>
                            <span class="side-bar-text">
                            Farm
                         </span>
                        </a>
                        <a href="crop.php" class="side-bar-item d-flex align-items-center">
                            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg"
                                 width="20" height="20" viewBox="0 0 28 28">
                                <path fill="currentColor"
                                      d="m9.309 3.25l.002.002l.003.004l.012.013a6.234 6.234 0 0 1 .187.22c.125.152.302.373.516.658a25.6 25.6 0 0 1 1.619 2.443A25.522 25.522 0 0 1 14 11.896a25.522 25.522 0 0 1 2.352-5.306a25.586 25.586 0 0 1 1.619-2.443a18.396 18.396 0 0 1 .703-.878l.012-.013l.003-.004l.001-.001l.001-.001a.75.75 0 0 1 1.309.5v9.364a14.886 14.886 0 0 1 1.617-2.78a10.783 10.783 0 0 1 1.534-1.684a6.853 6.853 0 0 1 .645-.5l.044-.029l.015-.009l.005-.003l.002-.001h.001A.751.751 0 0 1 25 8.75v12.5A3.75 3.75 0 0 1 21.25 25H6.75A3.75 3.75 0 0 1 3 21.25V8.75a.75.75 0 0 1 1.136-.643l.002.001l.002.001l.005.003l.015.01a2.587 2.587 0 0 1 .192.13c.123.09.293.22.497.398c.408.357.953.903 1.534 1.683c.536.72 1.101 1.637 1.617 2.781V3.75a.75.75 0 0 1 1.309-.5M4.5 10.406V21.25a2.25 2.25 0 0 0 2.25 2.25h14.5a2.25 2.25 0 0 0 2.25-2.25V10.406c-.211.23-.44.502-.68.823c-1.023 1.374-2.226 3.64-2.83 7.148a.75.75 0 0 1-1.49-.127V5.99c-.265.394-.555.848-.852 1.357c-1.157 1.978-2.424 4.761-2.906 8.013a.75.75 0 0 1-1.484 0c-.482-3.252-1.75-6.035-2.905-8.013A25.677 25.677 0 0 0 9.5 5.99v12.26a.75.75 0 0 1-1.49.127c-.604-3.509-1.807-5.774-2.83-7.148c-.24-.32-.469-.594-.68-.823"/>
                            </svg>
                            <span class="side-bar-text">
                             Crop
                         </span>
                        </a>
                        <a href="costEstimation.php" class="side-bar-item d-flex align-items-center active-link">
                            <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M11 8c0 2.21-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4m0 6.72V20H0v-2c0-2.21 3.13-4 7-4c1.5 0 2.87.27 4 .72M24 20H13V3h11zm-8-8.5a2.5 2.5 0 0 1 5 0a2.5 2.5 0 0 1-5 0M22 7a2 2 0 0 1-2-2h-3c0 1.11-.89 2-2 2v9a2 2 0 0 1 2 2h3c0-1.1.9-2 2-2z"/>
                            </svg>
                            <span class="side-bar-text">
                             Cost Estimation
                         </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content position-relative d-flex flex-column justify-content-between">
            <div class="dashboard-wrapper">
                <div id="add-cost-estimation" class="content-wrapper show-data">
                    <div class="add-data-table">
                        <div class="table-header d-flex justify-content-between align-items-center">
                            <div class="title-wrapper">
                                <h2>
                                    Cost Estimation
                                </h2>
                            </div>
                        </div>
                        <div class="search-box-wrapper d-flex align-items-center justify-content-between">
                            <div class="inputs-seletions w-50">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center input-select-wrapper">
                                        <label class="form-label">Select Farm</label>
                                        <select class="form-select">
                                            <option value="1">All</option>
                                            <option selected="">Farm One</option>
                                            <option value="2">Faram Two</option>
                                            <option value="3">Farm Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-table">
                        <div class="row-add-table">
                            <div class="table-container">
                                <div class="crop-table-row title-row d-flex justify-content-between align-items-center">
                                    <div class="start-table-col table-col">
                                        Id
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Crop Name
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Crop Area  (Acre)
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Created At
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Price
                                    </div>
                                </div>
                                <div class="crop-table-row body-row d-flex justify-content-between align-items-center">
                                    <div class="start-table-col number-wrapper table-col">
                                        1
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Wheat
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        200
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        August 20, 2020
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Pkr 220
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-table">
                        <div class="row-add-table">
                            <div class="table-container">
                                <div class="crop-table-row title-row d-flex justify-content-between align-items-center">
                                    <div class="start-table-col table-col">
                                        Id
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Crop Name
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Crop Area  (Acre)
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Created At
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Price
                                    </div>
                                </div>
                                <div class="crop-table-row body-row d-flex justify-content-between align-items-center">
                                    <div class="start-table-col number-wrapper table-col">
                                        2
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Rice
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        300
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        August 20, 2020
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Pkr 100
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-table">
                        <div class="row-add-table">
                            <div class="table-container">
                                <div class="crop-table-row title-row d-flex justify-content-between align-items-center">
                                    <div class="start-table-col table-col">
                                        Id
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Crop Name
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Crop Area  (Acre)
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Created At
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Price
                                    </div>
                                </div>
                                <div class="crop-table-row body-row d-flex justify-content-between align-items-center">
                                    <div class="start-table-col number-wrapper table-col">
                                       3
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Sugar Cane
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        300
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        August 20, 2020
                                    </div>
                                    <div class="content-table-col table-col w-25">
                                        Pkr 100
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="total-wrapper d-flex justify-content-end align-items-center">
                        <div class="w-25 d-flex justify-content-center align-items-center">
                            <div class="total-title box-item text-center">
                                <div class="total-amount box-item">
                                    <h3>
                                        Total
                                        <span class="ms-2">
                                        Pkr 20,00,220
                                    </span>
                                    </h3>
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
<!--- main sec End --->
<?php require('assets/element/alertPopup.html')?>
<!--- Footer  end --->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>