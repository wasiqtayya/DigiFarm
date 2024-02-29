<div class="modal fade" id="addLandItem" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog w-100">
                            <form id="addFarmForm" class="addFarmForm" method="POST" action="process.php?action=addfarm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title"> Add Farm</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!------modal body----------->
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Farm Name:</label>
                                            <input type="text" class="form-control" name="farmName" placeholder="Farm Name / Farmer Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Village Name:</label>
                                            <input type="text" class="form-control" name="villageName" placeholder="Village Name / Village Number" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Land Area (Acre) :</label>
                                            <input type="number" class="form-control" name="landArea" placeholder="Land Area (Acre)" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Possession Per Acre:</label>
                                            <?php
                                                $sql = "SELECT id, type_name FROM possession_type";
                                            
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    echo '<select id="possesionValue" class="form-select" name="possessionType">';
                                                    echo '<option value="0">Select Cost</option>';
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' . $row["id"] . '">' . $row["type_name"] . '</option>';
                                                    }
                                                    echo '</select>';
                                                } else {
                                                    echo '<p>No possession types found.</p>';
                                                }
                                            ?>
                                        </div>
                                        <div id="opportunityValue" class="mb-3 d-none">
                                            <label class="form-label">Opportunity Cost:</label>
                                            <input type="number" class="form-control" name="opportunityCost" placeholder="Opportunity Cost">
                                        </div>
                                        <div id="rentalValue" class="mb-3 d-none">
                                            <label class="form-label">Rental Cost:</label>
                                            <input type="number" class="form-control" name="rentalCost" placeholder="Rental Cost">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label me-2">Farm Coordinates:</label>
                                            <div class="d-flex align-items-center">
                                                <input type="text" id="coordinatesInput" name ="coordinates" class="form-control" name="farmCoordinates" placeholder="Latitude, Longitude" readonly>
                                                <a id="getCoordinatesButton" class="btn btn-primary ms-3" style="background-color: #2B4329; border:none; font-weight: bold;" onClick="getCoordinates()">Get Coordinates</a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-primary mb-3">Add Farm</button>
                                    </div>
                                </div>
                            </form>

                            </div>
                        </div>