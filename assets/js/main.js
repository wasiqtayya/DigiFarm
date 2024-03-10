$(document).on('click', '.addFarm', function(event) {
  $('.modal.fade').addClass("show");
  $('.modal .modal-content').html('<div class="loading-wrapper fade-out-hide">Loading....</div>');

  $.ajax({
      type: "GET",
      url: "ajaxEvent.php?q=addFarm",
      success: function(msg) {
          $('.modal .modal-content').html(msg);
      }
  });
});

$(document).on('click', '.btn-close', function(event) {
  $('.modal.fade').removeClass("show");
});

$(document).on('change', '#possesionValue', function(event) {
  $("#opportunityValue, #rentalValue").addClass("d-none");

  var selectedValue = $(this).val();

  selectedValue = parseInt(selectedValue);
  console.log(selectedValue);
  // Show the corresponding div based on the selected value
  if (selectedValue === 1) {
      $("#opportunityValue").removeClass("d-none");
  } else if (selectedValue === 2) {
      $("#rentalValue").removeClass("d-none");
  }
});

$(document).on('submit', '#addFarmForm', function(event) {
  event.preventDefault();

  var possessionType = $('select[name="possessionType"]').val();
  var opportunityCost = $.trim($('input[name="opportunityCost"]').val());
  var rentalCost = $.trim($('input[name="rentalCost"]').val());
  var cordinates = $('input[name="coordinates"]').val();

  if (possessionType == 0) {
      showError("Select the possession cost!");
      return;
  }

  if (possessionType == 1) {
      if (opportunityCost == '') {
          showError("Enter opportunity cost!");
          return;
      }
  }

  if (possessionType == 2) {
      if (rentalCost == '') {
          showError("Enter rental cost!");
          return;
      }
  }

  if (cordinates == '') {
      showError("Get Coordinates of your location");
      return;
  }

  var formData = $(this).serialize();
  $.ajax({
      type: 'POST',
      url: 'process.php?action=addfarm',
      data: formData,
      dataType: 'json',
      success: function(response) {
          if (response.success) {
              handleSuccess(response, '?p=farm');
          } else {
              showError(response.message);
          }
      },
      error: handleError
  });
});

$(document).on('click', '.deleteForm', function(event) {
    var id=$(this).attr('data-id');
    $('.modal.fade').addClass("show");
  
    $.ajax({
        type: "GET",
        url: "ajaxEvent.php?q=deleteFarm&id= "+id+" ",
        success: function(msg) {
            $('.modal .modal-content').html(msg);
        }
    });
});

$(document).ready(function() {
  $('#signinForm').submit(function(event) {
      event.preventDefault();
      $.ajax({
          type: 'POST',
          url: 'process.php?action=signin',
          data: $(this).serialize(),
          success: function(response) {
              if (response.success) {
                  window.location.href = 'dashboard.php';
              } else {
                  showError(response.message);
              }
          },
          error: handleError
      });
  });
});

$(document).ready(function() {
  $('#signupForm').submit(function(event) {
      event.preventDefault();

      var password = $.trim($('input[name="password"]').val());
      var confirmPassword = $.trim($('input[name="confirm_password"]').val());

      if (password !== confirmPassword) {
          showError("Passwords do not match!");
      } else {
          var formData = $(this).serialize();
          $.ajax({
              type: 'POST',
              url: 'process.php?action=signup',
              data: formData,
              dataType: 'json',
              success: function(response) {
                  handleSuccess(response, 'index.php');
              },
              error: handleError
          });
      }
  });
});

$(document).ready(function() {
  $('.logout').click(function(event) {
      $.ajax({
          type: 'POST',
          url: 'process.php?action=logout',
          dataType: 'json',
          success: function(response) {
              window.location.href = 'index.php';
          },
          error: function(xhr, status, error) {
              console.error(error);
          }
      });
  });
});



let rowCount = jQuery('.row-count').length;
let zzzzzTTT = 2 + rowCount++;
jQuery(document).ready(() => {
    // Function to add a new row
    function addRow() {
        // Increment the count by 1
        zzzzzTTT++;
        // Clone the last row
        const newRow = jQuery(
            `<div class="crop-table-row body-row d-flex justify-content-between align-items-center">
                <div class="start-table-col number-wrapper table-col">${zzzzzTTT}</div>
                <div class="content-table-col table-col">
                    <input type="text" class="form-control" placeholder="Add Farm Description">
                </div>
                <div class="content-table-col table-col price-col">
                    <select class="form-select">
                        <option selected>Select</option>
                        <option value="1">Land Preparation</option>
                        <option value="2">Irrigation</option>
                        <option value="4">Seed cost</option>
                        <option value="5">Fertilizer / Pesticides</option>
                        <option value="6">Harvesting</option>
                        <option value="7">Others ( Carriage Cost, Labour Cost, Fuel, Diesel and more)</option>
                    </select>
                </div>
                <div class="content-table-col table-col price-col">
                    <input type="text" class="form-control" placeholder="Price">
                </div>
                <div class="end-table-col table-col d-flex justify-content-center">
                    <div class="status-wrapper deactive">Unsaved</div>
                </div>
                <div class="action-row table-col d-flex justify-content-end align-items-center">
                    <div class="tabe-edit-col iconcol sendButton">
                        <span class="material-symbols-outlined">save</span>
                    </div>
                    <div class="tabe-delete-col iconcol" data-bs-toggle="modal" data-bs-target="#eaddDletePopup">
                        <span class="material-symbols-outlined">delete</span>
                    </div>
                </div>
            </div>`
        );

        // Append the new row to the container
        jQuery('#input-wrappers').append(newRow);
    }

    // Attach the click event to the button
    jQuery('#add-crop-item').on('click', addRow);
    // Show passwordclick event to the button
    jQuery('#show-password').on('click', function () {
        var passwordInput = jQuery('#password');
        // Toggle the input type between 'password' and 'text'
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            jQuery('#show-password svg').toggleClass("d-none");
        } else {
            passwordInput.attr('type', 'password');
            jQuery('#show-password svg').toggleClass("d-none");
        }
    });
    // Show passwordclick event to the button
    jQuery('#show-password-confirm').on('click', function () {
        var passwordInput = jQuery('#password-confirm');
        // Toggle the input type between 'password' and 'text'
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            jQuery('#show-password-confirm svg').toggleClass("d-none");
        } else {
            passwordInput.attr('type', 'password');
            jQuery('#show-password-confirm svg').toggleClass("d-none");
        }
    });
    // side-bar click event to the button----------
    jQuery('#side-menu').click(function () {
        jQuery(".sidebar").toggleClass("expanded");
    });
    jQuery(document).click(function (e) {
        var target = e.target;
        if (!jQuery(target).is('.side-bar-content-wrapper') && !jQuery(target).parents().is('.sidebar') && !jQuery(target).parents().is('#side-menu')) {
            jQuery(".sidebar").removeClass("expanded");
        }
    });
    // Dropdowon Function  the button----------
    jQuery('#drop-down-toggler').click(function () {
        jQuery(".profile-info-wrapper").toggleClass("expanded-header");
        jQuery(".sidebar-links-wrapper").toggleClass("expanded-header");
        jQuery(".main-content").toggleClass("expanded-header");
    });
});
// alert Function  the button----------
jQuery(".sendButton").click(function () {
    jQuery(".alert.cpsave").show('medium');
    setTimeout(function () {
        jQuery(".alert.cpsave").hide('medium');
    }, 5000);
});
jQuery(".sendButton .close").click(function () {
    jQuery(".alert.cpsave").hide('medium');
});



var mapStyles = [
    [{
            "featureType": "administrative",
            "elementType": "geometry",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "poi",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "road",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "road",
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "transit",
            "stylers": [{
                "visibility": "off"
            }]
        }
    ]

];

//functions
function isValidEmail(email) {
  return /\S+@\S+\.\S+/.test(email);
}

function showError(message) {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: message,
  });
}

function handleSuccess(response, redirectUrl) {
  if (response.success) {
    Swal.fire({
      icon: 'success',
      title: 'Operation success!',
      text: response.message
    }).then(() => {
      window.location.href = redirectUrl; 
    });
  } else {
    showError(response.message);
  }
}

function handleError(xhr, status, error) {
  console.error(error);
}

function getCoordinates() {
  console.log("Button clicked");
  if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(function(position) {
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;

          document.getElementById("coordinatesInput").value = latitude + ", " + longitude;
      }, function(error) {
        showError("An error occurred while fetching the location.")
      });
  } else {
      showError("Geolocation is not supported by this browser.")
  }
}