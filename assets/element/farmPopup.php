<div class="modal fade" id="addLandItem" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog w-100">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"> Add Farm</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <!------modal body----------->
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Farm Name:</label>
                                            <input type="email" class="form-control"
                                                placeholder="Farm Name / Farmer Name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Village Name:</label>
                                            <input type="email" class="form-control"
                                                placeholder="Village Name / Village Number">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Land Area (Acre) :</label>
                                            <input type="text" class="form-control" placeholder="Land Area (Acre)">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Possession Per Acre:</label>
                                            <select id="possesionValue" class="form-select">
                                                <option value="0">Select Cost</option>
                                                <option value="2">Opportunity Cost</option>
                                                <option value="3">Rental Cost</option>
                                            </select>
                                        </div>
                                        <div id="opportunityValue" class="mb-3 d-none">
                                            <label class="form-label">Opportunity Cost:</label>
                                            <input type="text" class="form-control" placeholder="Opportunity Cost">
                                        </div>
                                        <div id="rentalValue" class="mb-3 d-none">
                                            <label class="form-label">Rental Cost:</label>
                                            <input type="text" class="form-control" placeholder="Rental Cost">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label me-2">Farm Coordinates:</label>
                                            <div class="d-flex align-items-center">
                                                <input type="text" class="form-control" placeholder="31.4598648,73.1231582">
                                                <button class="btn btn-primary ms-3" style="background-color: #2B4329; border:none; font-weight: bold;">Get Coordinates</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary mb-3">Add Farm</button>
                                    </div>
                                </div>
                            </div>
                        </div>