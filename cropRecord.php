<div class="dashboard-wrapper">
    <div id="add-land" class="content-wrapper show-data">
        <div class="add-data-table">
            <div class="table-header mb-4 d-flex justify-content-between align-items-center">
                <div class="title-wrapper">
                    <h2>
                        Crop Name
                    </h2>
                </div>
                <div class="buttons-wrapper d-flex justify-content-end">
                    <div id="add-crop-item">
                        <button  class="button-of-table d-flex justify-content-center align-items-center">
                                        <span class="material-symbols-outlined me-2">data_saver_on</span>
                                        Add New Record
                                    </button>
                    </div>
                </div>
            </div>
            <div class="row-add-table">
                <div class="table-container">
                    <div class="crop-table-row title-row d-flex justify-content-between align-items-center">
                        <div class="start-table-col table-col">
                            Id
                        </div>
                        <div class="content-table-col table-col">
                            Description
                        </div>
                        <div class="content-table-col table-col w-25">
                            Type
                        </div>
                        <div class="content-table-col table-col w-25">
                            Price
                        </div>
                        <div class="end-table-col table-col text-center">
                            Status
                        </div>
                        <div class="action-row table-col">
                            Action
                        </div>
                    </div>
                    <div id="input-wrappers">
                        <div class="crop-table-row body-row d-flex justify-content-between align-items-center">
                            <div class="start-table-col number-wrapper table-col">
                                1
                            </div>
                            <div class="content-table-col table-col">
                                <input type="text" class="form-control" placeholder="Add Farm Description">
                            </div>
                            <div class="content-table-col table-col price-col">
                                <select class="form-select">
                                                <option selected="">Select</option>
                                                <option value="7">Land Preparation</option>
                                                <option value="1">Irrigation</option>
                                                <option value="3">Seed cost</option>
                                                <option value="4">Fertilizer / Pesticides</option>
                                                <option value="5">Harvesting</option>
                                                <option value="6">Others ( Carriage Cost, Labour Cost, Fuel, Diesel and more)</option>
                                            </select>
                            </div>
                            <div class="content-table-col table-col price-col">
                                <input type="text" class="form-control" placeholder="Price">
                            </div>
                            <div class="end-table-col table-col d-flex justify-content-center">
                                <div class="status-wrapper active">
                                    Saved
                                </div>
                            </div>
                            <div class="action-row table-col d-flex justify-content-end align-items-center">
                                <div class="tabe-edit-col iconcol sendButton">
                                    <span class="material-symbols-outlined">save</span>
                                </div>
                                <div class="tabe-delete-col iconcol" data-bs-toggle="modal"
                                    data-bs-target="#eaddDletePopup">
                                    <span class="material-symbols-outlined">delete</span>
                                </div>
                            </div>
                        </div>
                        <div class="crop-table-row body-row d-flex justify-content-between align-items-center">
                            <div class="start-table-col number-wrapper table-col">
                                2
                            </div>
                            <div class="content-table-col table-col">
                                <input type="text" class="form-control" placeholder="Add Farm Description">
                            </div>
                            <div class="content-table-col table-col price-col">
                                <select class="form-select">
                                                <option selected="">Select</option>
                                                <option value="7">Land Preparation</option>
                                                <option value="1">Irrigation</option>
                                                <option value="3">Seed cost</option>
                                                <option value="4">Fertilizer / Pesticides</option>
                                                <option value="5">Harvesting</option>
                                                <option value="6">Others ( Carriage Cost, Labour Cost, Fuel, Diesel and more)</option>
                                            </select>
                            </div>
                            <div class="content-table-col table-col price-col">
                                <input type="text" class="form-control" placeholder="Price">
                            </div>
                            <div class="end-table-col table-col d-flex justify-content-center">
                                <div class="status-wrapper deactive">
                                    Unsaved
                                </div>
                            </div>
                            <div class="action-row table-col d-flex justify-content-end align-items-center">
                                <div class="tabe-edit-col iconcol sendButton">
                                    <span class="material-symbols-outlined">save</span>
                                </div>
                                <div class="tabe-delete-col iconcol" data-bs-toggle="modal"
                                    data-bs-target="#eaddDletePopup">
                                    <span class="material-symbols-outlined">delete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>