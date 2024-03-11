<?php
require_once("config.php");

if (isset($_GET["q"])) {
    if ($_GET['q'] == "addFarm") { ?>
        <div class="modal-header">
            <h3 class="modal-title"> Add Farm</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!------modal body----------->
        <form id="addFarmForm" class="addFarmForm" method="POST" action="process.php?action=addfarm">
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
                        <input type="text" id="coordinatesInput" name="coordinates" class="form-control" placeholder="Latitude, Longitude" readonly>
                        <a id="getCoordinatesButton" class="btn btn-primary ms-3" style="background-color: #2B4329; border:none; font-weight: bold;" onClick="getCoordinates()">Get Coordinates</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary mb-3">Add Farm</button>
            </div>
        </form>                                  
<?php
    } elseif ($_GET['q'] == "deleteFarm") { ?>
        <div class="modal-body">
            <div class="d-flex align-items-center">
                <span class="material-symbols-outlined">error</span>
                <h3 class="ms-4">Do you want to Logout?</h3>
            </div>
        </div>
        <div class="modal-footer delete-buttn-wrapper justify-content-end">
            <a type="button" class="btn btn-primary mb-3 cancel-button" data-bs-dismiss="modal" aria-label="Close">Cancel </a>
            <a type="button" data-id = "<?php echo $_GET['id'] ?>" class="btn btn-primary mb-3 deleteButton">
                OK
            </a>
        </div>
    <?php
    }elseif ($_GET['q'] == "editForm") { ?>

        <div class="modal-header">
            <h3 class="modal-title">Update Farm</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateFarmForm" class="updateFarmForm" method="POST" action="process.php?action=updatefarm">
            <input type="hidden" value="<?php echo $_GET['id'] ?>" name = "id">
            <div class="modal-body">
                <?php
                if($_GET['id']) {
                    $farm_id = $_GET['id'];
                    $sql_farm = "SELECT farm_name, village_no, farm_area, possession_type_id, latitude, longitude FROM farm where id = $farm_id";
                    $sql_farm1 = "SELECT possession_cost FROM possession_cost where id = $farm_id";

                    
                    $result_farm = mysqli_query($conn, $sql_farm);
                    $result_farm1 = mysqli_query($conn, $sql_farm1);
                    if($result_farm && mysqli_num_rows($result_farm) > 0 && mysqli_num_rows($result_farm1) > 0) {
                        $row_farm = mysqli_fetch_assoc($result_farm);
                        $row_farm1 = mysqli_fetch_assoc($result_farm1);
                        // Output the fetched farm data into the form fields
                        ?>
                        <div class="mb-3">
                            <label class="form-label">Farm Name:</label>
                            <input type="text" class="form-control" name="farmName" placeholder="Farm Name / Farmer Name" value="<?= $row_farm['farm_name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Village Name:</label>
                            <input type="text" class="form-control" name="villageName" placeholder="Village Name / Village Number" value="<?= $row_farm['village_no'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Land Area (Acre) :</label>
                            <input type="number" class="form-control" name="landArea" placeholder="Land Area (Acre)" value="<?= $row_farm['farm_area'] ?>" required>
                        </div>
                        <div class="mb-3">
                        <?php
                        // Retrieve possession types from the database
                        $sql = "SELECT id, type_name FROM possession_type";
                        $result = mysqli_query($conn, $sql);?>
                        
                        <label class="form-label">Possession Per Acre:</label>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            echo '<select id="possesionEditValue" class="form-select" name="possessionType">';
                            echo '<option value="0">Select Cost</option>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Check if the current possession type matches the one in the form
                                $selected = ($row_farm['possession_type_id'] == $row['id']) ? 'selected' : '';
                                // Output the option element
                                echo '<option value="' . $row["id"] . '" ' . $selected . '>' . $row["type_name"] . '</option>';
                            }
                            
                            // End the select element
                            echo '</select>';
                        } else {
                            echo '<p>No possession types found.</p>';
                        } ?>
                        </div>
                        <?php
                        // Determine which possession cost input to display based on possession_type_id
                        if ($row_farm['possession_type_id'] == 1) {
                            // Opportunity Cost
                            ?>
                            <div id= "opportunityValue" class="mb-3">
                                <label class="form-label">Opportunity Cost:</label>
                                <input type="number" class="form-control" name="opportunityCost" placeholder="Opportunity Cost" value="<?= $row_farm1['possession_cost'] ?>">
                            </div>
                            
                            <div id= "rentalValue" class="mb-3 d-none">
                                <label class="form-label">Rental Cost:</label>
                                <input type="number" class="form-control" name="rentalCost" placeholder="Rental Cost" value="<?= $row_farm1['possession_cost'] ?>">
                            </div>
                            <?php
                        }
                        
                        if ($row_farm['possession_type_id'] == 2) {
                            // Rental Cost
                            ?>

                            <div id= "opportunityValue" class="mb-3 d-none">
                                <label class="form-label">Opportunity Cost:</label>
                                <input type="number" class="form-control" name="opportunityCost" placeholder="Opportunity Cost" value="<?= $row_farm1['possession_cost'] ?>">
                            </div>

                            <div id= "rentalValue" class="mb-3">
                                <label class="form-label">Rental Cost:</label>
                                <input type="number" class="form-control" name="rentalCost" placeholder="Rental Cost" value="<?= $row_farm1['possession_cost'] ?>">
                            </div>
                            <?php
                        }
                        
                        ?>
                        <div class="mb-3">
                            <label class="form-label me-2">Farm Coordinates:</label>
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control" id= "coordinatesInput" name="coordinates" value="<?= $row_farm['latitude'] . ',' . $row_farm['longitude'] ?>" placeholder="Latitude, Longitude" required readonly>
                                <a id="getCoordinatesButton" class="btn btn-primary ms-3" style="background-color: #2B4329; border:none; font-weight: bold;" onClick="getCoordinates()">Get Coordinates</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo 'No farm found with the provided ID.';
                    }
                } else {
                    echo 'Please provide a farm ID.';
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary mb-3">Update Farm</button>
            </div>
        </form>


    <?php
    }
}
?>
