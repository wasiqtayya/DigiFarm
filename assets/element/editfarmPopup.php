<div class="modal fade" id="editFarmItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog w-100">
        <form id="addFarmForm" class="addFarmForm" method="POST" action="process.php?action=addfarm">
        <input type="hidden" id="farmIdInput" name="farm_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"> Update Farm</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> 
                <div class="modal-body">
                    <?php
                    // Check if farm_id is set in the POST request
                    if(isset($_POST['farm_id'])) {
                        $farm_id = $_POST['farm_id'];
                        // Query to fetch farm data based on farm_id
                        $sql_farm = "SELECT f.farm_name, f.village_no, f.farm_area, f.possession_type_id, f.latitude, f.longitude, pc.possession_cost 
                                     FROM farm f
                                     LEFT JOIN possession_cost pc ON f.farm_id = pc.farm_id
                                     WHERE f.farm_id = $farm_id";
                        $result_farm = mysqli_query($conn, $sql_farm);
                        if($result_farm && mysqli_num_rows($result_farm) > 0) {
                            $row_farm = mysqli_fetch_assoc($result_farm);
                            // Output the fetched farm data into the form fields
                            echo '
                            <div class="mb-3">
                                <label class="form-label">Farm Name:</label>
                                <input type="text" class="form-control" name="farmName" value="' . $row_farm['farm_name'] . '" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Village Name:</label>
                                <input type="text" class="form-control" name="villageName" value="' . $row_farm['village_no'] . '" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Land Area (Acre) :</label>
                                <input type="number" class="form-control" name="landArea" value="' . $row_farm['farm_area'] . '" required>
                            </div>';

                            // Output Possession Per Acre and corresponding cost field based on possession_type_id
                            if($row_farm['possession_type_id'] == 1) {
                                // Opportunity Cost
                                echo '
                                <div class="mb-3">
                                    <label class="form-label">Possession Per Acre:</label>
                                    <select class="form-select" name="possessionType">
                                        <option value="opportunity">Opportunity Cost</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Opportunity Cost:</label>
                                    <input type="number" class="form-control" name="opportunityCost" value="' . $row_farm['possession_cost'] . '" required>
                                </div>';
                            } else {
                                // Rental Cost
                                echo '
                                <div class="mb-3">
                                    <label class="form-label">Possession Per Acre:</label>
                                    <select class="form-select" name="possessionType">
                                        <option value="rental">Rental Cost</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Rental Cost:</label>
                                    <input type="number" class="form-control" name="rentalCost" value="' . $row_farm['possession_cost'] . '" required>
                                </div>';
                            }

                            // Output latitude and longitude
                            echo '
                            <div class="mb-3">
                                <label class="form-label">Farm Coordinates:</label>
                                <input type="text" class="form-control" name="farmCoordinates" value="' . $row_farm['latitude'] . ',' . $row_farm['longitude'] . '" placeholder="Latitude, Longitude" required readonly>
                            </div>';
                        } else {
                            echo 'No farm found with the provided ID.';
                        }
                    } else {
                        echo 'Please provide a farm ID.';
                    }
                    ?>
                </div>
                <!-- Add your remaining form fields and submit button here -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary mb-3">Update Farm</button>
                </div>
            </div>
        </form>
    </div>
</div>

