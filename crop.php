<div class="dashboard-wrapper">
    <div id="add-crop" class="content-wrapper show-data">
        <div class="add-data-table">
            <div class="table-header mb-4 d-flex justify-content-between align-items-center">
                <div class="title-wrapper">
                    <h2>Add Crop</h2>
                </div>
                <div class="buttons-wrapper d-flex align-items-center justify-content-end">
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
                    <a href="#" class="button-of-table d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#addCropItem">
                        Add Crop
                    </a>
                    <a href="#" class="button-of-table d-flex justify-content-center align-items-center">
                        Export
                    </a>
                </div>
            </div>
            <div class="row-add-table">
                <div class="table-container">
                    <div class="crop-table-row title-row d-flex justify-content-between align-items-center">
                        <div class="start-table-col table-col">
                            Id
                        </div>
                        <div class="content-table-col table-col">
                            Crop name
                        </div>
                        <div class="content-table-col table-col">
                            Crop area (Acre)
                        </div>
                        <div class="content-table-col table-col">
                            Farm Name
                        </div>
                        <div class="content-table-col table-col">
                            Created at
                        </div>
                        <div class="end-table-col table-col text-center">
                            Status
                        </div>
                        <div class="action-row table-col">
                            Action
                        </div>
                    </div>
                    <!-- Repeated rows start here -->
                    <?php
                    $crop_data = [
                        ["Wheat", "200", "MaxChn-ADNasim", "August 20, 2020", "Active"],
                        ["Rice", "200", "MaxChn-ADNasim", "August 20, 2020", "Archived"],
                        ["Sugar cane", "200", "MaxChn-ADNasim", "August 20, 2020", "Active"],
                        ["Wheat", "200", "MaxChn-ADNasim", "August 20, 2020", "Active"],
                        ["maize", "200", "MaxChn-ADNasim", "August 20, 2020", "Archived"],
                        ["Sugar cane", "200", "MaxChn-ADNasim", "August 20, 2020", "Active"]
                    ];

                    foreach ($crop_data as $index => $crop) {
                        echo '<div class="crop-table-row body-row d-flex justify-content-between align-items-center">
                                <div class="start-table-col number-wrapper table-col">' . ($index + 1) . '</div>
                                <div class="content-table-col table-col">' . $crop[0] . '</div>
                                <div class="content-table-col table-col">' . $crop[1] . '</div>
                                <div class="content-table-col table-col">' . $crop[2] . '</div>
                                <div class="content-table-col table-col">' . $crop[3] . '</div>
                                <div class="end-table-col table-col d-flex justify-content-center">
                                    <div class="status-wrapper ' . ($crop[4] == " Active" ? "active" : "deactive") . '">' . $crop[4] . '</div>
                                </div>
                                <div class="action-row table-col d-flex justify-content-end align-items-center">
                                    <div class="tabe-view-col iconcol">
                                        <a href="?p=croprecord" class="material-symbols-outlined">visibility</a>
                                    </div>
                                    <div class="tabe-edit-col iconcol" data-bs-toggle="modal" data-bs-target="#addCropItem">
                                        <span class="material-symbols-outlined">edit_note</span>
                                    </div>
                                    <div class="tabe-delete-col iconcol" data-bs-toggle="modal" data-bs-target="#eaddDletePopup">
                                        <span class="material-symbols-outlined">delete</span>
                                    </div>
                                </div>
                            </div>';
                    }
                    ?>
                    <!-- Repeated rows end here -->
                </div>
            </div>
        </div>

        <div class="modal fade" id="addCropItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">
                            Add Crop
                        </h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!------modal body----------->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Crop Name:</label>
                            <select class="form-select">
                                <option selected="">Wheat</option>
                                <option value="1">Rice</option>
                                <option value="2">Sugar cane</option>
                                <option value="3">Maize</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Crop Area (Acre):</label>
                            <input type="email" class="form-control" placeholder="Crop Area (Acre)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Farm:</label>
                            <select class="form-select">
                                <option selected="">Farm1</option>
                                <option value="1">Farm 2</option>
                                <option selected="">Farm 3</option>
                                <option value="1">Farm 4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status:</label>
                            <select class="form-select">
                                <option selected="">Active</option>
                                <option value="1">Archived</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mb-3">Add Crop</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
