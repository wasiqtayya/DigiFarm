<div class="dashboard-wrapper">
    <div id="add-land" class="content-wrapper show-data">
        <div class="add-data-table">
            <div class="table-header mb-4 d-flex justify-content-between align-items-center">
                <div class="title-wrapper">
                    <h2>Add Farm</h2>
                </div>
                <div class="buttons-wrapper d-flex justify-content-end">
                    <div class="input-searchbox w-50">
                        <div class="position-relative input-search-wrapper d-flex align-items-center justify-content-end">
                            <div class="dropdown-links-wrapper position-absolute">
                                <a href="#dash-boord-content" class="drop-down-item d-flex align-items-center">
                                    <span class="drop-down-icon material-symbols-outlined">search</span>
                                </a>
                            </div>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <a href="#" class="button-of-table d-flex justify-content-center align-items-center addFarm">
                        Add Farm
                    </a>
                    <a href="#" class="button-of-table d-flex justify-content-center align-items-center">
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
                    <?php
                    $query = "SELECT id, farm_name, village_no, farm_area, possession_type_id, created_at, enabled FROM farm";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Check if the farm is enabled
                            if ($row['enabled'] == 0) {
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
                                        <div class="tabe-edit-col iconcol editForm" data-id="' . $row['id'] . '">
                                            <span class="material-symbols-outlined">edit_note</span>
                                        </div>
                                        <div class="tabe-delete-col iconcol deleteForm" data-id="'. $row['id'] .'">
                                            <span class="material-symbols-outlined">delete</span>
                                        </div>
                                    </div>
                                </div>';
                            }
                        }
                    } else {
                        echo '<div class="crop-table-row body-row d-flex justify-content-center align-items-center" style="height: 200px;">No data available</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
