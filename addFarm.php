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
    <title>Farm • DigiFarm</title>
    <?php require('assets/element/meta.html')?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="dashbord-page position-relative">
    <!--- main sec Start--->
    <section class="container-fluid h-100 g-0">
        <div class="main position-relative d-flex justify-content-between">
        <?php require('assets/element/topBar.php')?>
            <!-- dashboard content -->
            <div class="sidebar position-relative">
                <div class="side-bar-content-wrapper d-flex flex-column h-100">
                    <div class="links-content d-flex flex-column justify-content-between h-100">
                        <div class="sidebar-links-wrapper">
                            <a href="dashboard.php" class="side-bar-item d-flex align-items-center">
                                <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M10 13H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1m-1 6H5v-4h4ZM20 3h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1m-1 6h-4V5h4Zm1 7h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1M9 9H5V5h4Z" />
                                </svg>
                                <span class="side-bar-text">
                                    Dashboard
                                </span>
                            </a>
                            <a href="addFarm.php" class="side-bar-item d-flex align-items-center active-link">
                                <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2">
                                        <path d="m12 8l6-3l-6-3v10" />
                                        <path
                                            d="m8 11.99l-5.5 3.14a1 1 0 0 0 0 1.74l8.5 4.86a2 2 0 0 0 2 0l8.5-4.86a1 1 0 0 0 0-1.74L16 12m-9.51.85l11.02 6.3m0-6.3L6.5 19.15" />
                                    </g>
                                </svg>
                                <span class="side-bar-text">Farm</span>
                            </a>
                            <a href="crop.php" class="side-bar-item d-flex align-items-center">
                                <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 28 28">
                                    <path fill="currentColor"
                                        d="m9.309 3.25l.002.002l.003.004l.012.013a6.234 6.234 0 0 1 .187.22c.125.152.302.373.516.658a25.6 25.6 0 0 1 1.619 2.443A25.522 25.522 0 0 1 14 11.896a25.522 25.522 0 0 1 2.352-5.306a25.586 25.586 0 0 1 1.619-2.443a18.396 18.396 0 0 1 .703-.878l.012-.013l.003-.004l.001-.001l.001-.001a.75.75 0 0 1 1.309.5v9.364a14.886 14.886 0 0 1 1.617-2.78a10.783 10.783 0 0 1 1.534-1.684a6.853 6.853 0 0 1 .645-.5l.044-.029l.015-.009l.005-.003l.002-.001h.001A.751.751 0 0 1 25 8.75v12.5A3.75 3.75 0 0 1 21.25 25H6.75A3.75 3.75 0 0 1 3 21.25V8.75a.75.75 0 0 1 1.136-.643l.002.001l.002.001l.005.003l.015.01a2.587 2.587 0 0 1 .192.13c.123.09.293.22.497.398c.408.357.953.903 1.534 1.683c.536.72 1.101 1.637 1.617 2.781V3.75a.75.75 0 0 1 1.309-.5M4.5 10.406V21.25a2.25 2.25 0 0 0 2.25 2.25h14.5a2.25 2.25 0 0 0 2.25-2.25V10.406c-.211.23-.44.502-.68.823c-1.023 1.374-2.226 3.64-2.83 7.148a.75.75 0 0 1-1.49-.127V5.99c-.265.394-.555.848-.852 1.357c-1.157 1.978-2.424 4.761-2.906 8.013a.75.75 0 0 1-1.484 0c-.482-3.252-1.75-6.035-2.905-8.013A25.677 25.677 0 0 0 9.5 5.99v12.26a.75.75 0 0 1-1.49.127c-.604-3.509-1.807-5.774-2.83-7.148c-.24-.32-.469-.594-.68-.823" />
                                </svg>
                                <span class="side-bar-text">
                                    Crop
                                </span>
                            </a>
                            <a href="costEstimation.php" class="side-bar-item d-flex align-items-center">
                                <svg class="side-bar-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M11 8c0 2.21-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4m0 6.72V20H0v-2c0-2.21 3.13-4 7-4c1.5 0 2.87.27 4 .72M24 20H13V3h11zm-8-8.5a2.5 2.5 0 0 1 5 0a2.5 2.5 0 0 1-5 0M22 7a2 2 0 0 1-2-2h-3c0 1.11-.89 2-2 2v9a2 2 0 0 1 2 2h3c0-1.1.9-2 2-2z" />
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
                    <div id="add-land" class="content-wrapper show-data">
                        <div class="add-data-table">
                            <div class="table-header mb-4 d-flex justify-content-between align-items-center">
                                <div class="title-wrapper">
                                    <h2>Add Farm </h2>
                                </div>
                                <div class="buttons-wrapper d-flex justify-content-end">
                                    <div class="input-searchbox w-50">
                                        <div
                                            class="position-relative input-search-wrapper d-flex align-items-center justify-content-end">
                                            <div class="dropdown-links-wrapper position-absolute">
                                                <a href="#dash-boord-content"
                                                    class="drop-down-item d-flex align-items-center">
                                                    <span class="drop-down-icon material-symbols-outlined">search</span>
                                                </a>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                    </div>
                                    <a href="#" class="button-of-table d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#addLandItem">
                                        Add Farm
                                    </a>
                                    <a href="#"
                                        class="button-of-table d-flex justify-content-center align-items-center">
                                        Export
                                    </a>
                                </div>
                            </div>
                            <div class="row-add-table">
    <div class="table-container">
        <div class="crop-table-row title-row d-flex justify-content-between align-items-center">
            <div class="start-table-col table-col">Id</div>
            <div class="content-table-col table-col">Farm name</div>
            <div class="content-table-col table-col">Village Name</div>
            <div class="content-table-col table-col">Land Area (Acre)</div>
            <div class="content-table-col table-col">Possession Per Acre</div>
            <div class="content-table-col table-col">Created at</div>
            <div class="action-row table-col">Action</div>
        </div>
        <!-- Repeated rows start here -->
        <?php
        // Assuming $conn is the database connection
        $query = "SELECT id, farm_name, village_no, farm_area, possession_type_id, created_at FROM farm";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $possession_type = ($row['possession_type_id'] == 1) ? 'Own' : 'Rental';
                $created_at = date('F d, Y', strtotime($row['created_at']));
                echo '<div class="crop-table-row body-row d-flex justify-content-between align-items-center">
                        <div class="start-table-col number-wrapper table-col">' . $row['id'] . '</div>
                        <div class="content-table-col table-col">' . $row['farm_name'] . '</div>
                        <div class="content-table-col table-col">' . $row['village_no'] . '</div>
                        <div class="content-table-col table-col">' . $row['farm_area'] . '</div>
                        <div class="content-table-col table-col">' . $possession_type . '</div>
                        <div class="content-table-col table-col">' . $created_at . '</div>
                        <div class="action-row table-col d-flex justify-content-end align-items-center">
                            <div class="tabe-edit-col iconcol" data-bs-toggle="modal" data-bs-target="#addLandItem">
                                <span class="material-symbols-outlined">edit_note</span>
                            </div>
                            <div class="tabe-delete-col iconcol" data-bs-toggle="modal" data-bs-target="#eaddDletePopup">
                                <span class="material-symbols-outlined">delete</span>
                            </div>
                        </div>
                    </div>';
            }
        } else {
            echo '<div class="crop-table-row body-row d-flex justify-content-center align-items-center" style="height: 200px;">No data available</div>
            ';
        }
        ?>
        <!-- Repeated rows end here -->
    </div>
</div>

                        <div class="modal fade alertPopup " id="eaddDletePopup" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog w-100">
                                <div class="modal-content">
                                    <!------modal body----------->
                                    <div class="modal-body">
                                        <div class="d-flex align-items-center ">
                                            <span class="material-symbols-outlined">error</span>
                                            <h3 class="ms-4"> Do you want to delete this record? </h3>
                                        </div>
                                    </div>
                                    <div class="modal-footer delete-buttn-wrapper justify-content-end">
                                        <button type="submit" class="btn btn-primary mb-3 cancel-button"
                                            data-bs-dismiss="modal" aria-label="Close">Cancel
                                        </button>
                                        <button type="button" class="btn btn-primary mb-3" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            OK
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php require('assets/element/farmPopup.php')?>
                    </div>
                </div>
                <?php require('assets/element/footer.html')?>
            </div>
        </div>
        <!--   Modal-wrapper thenme -->

    </section>
    <?php require('assets/element/alertPopup.html')?>
    <!--- main sec End --->
    <!--- Footer  end --->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/main.js?token=<?php echo time(); ?>"></script>

</body>

</html>