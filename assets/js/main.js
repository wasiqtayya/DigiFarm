$(document).ready(function() {
  $('#signinForm').submit(function(event) {
    event.preventDefault();

    var email = $.trim($('input[name="email"]').val());
    var password = $.trim($('input[name="password"]').val());
    if (email === '') {
      showError("Email field is required!");
    } else if (!isValidEmail(email)) {
      showError("Invalid email format!");
    } else {
      var formData = $(this).serialize();
      $.ajax({
        type: 'POST',
        url: 'process.php?action=signin',
        data: formData,
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            window.location.href = 'dashboard.php';
          } else {
            showError(response.message)
          }
        },
        error: handleError
      });
    }
  });
});

$(document).ready(function() {
  $('#signupForm').submit(function(event) {
    event.preventDefault();

    var name = $.trim($('input[name="name"]').val());
    var email = $.trim($('input[name="email"]').val());
    var password = $.trim($('input[name="password"]').val());
    var confirmPassword = $.trim($('input[name="confirm_password"]').val());

    if (name === '' || email === '' || password === '') {
      showError("All fields are required!");
    } else if (!isValidEmail(email)) {
      showError("Invalid email format!");
    } else if (password !== confirmPassword) {
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
  $('#confirmLogout').click(function(event) {
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
jQuery("#possesionValue").change(function () {
    // Hide all divs initially
    jQuery("#opportunityValue, #rentalValue").addClass("d-none");

    // Get the selected value
    var selectedValue = jQuery(this).val();

    // Convert selectedValue to a number using parseInt
    selectedValue = parseInt(selectedValue);

    // Show the corresponding div based on the selected value
    if (selectedValue === 2) {
        jQuery("#opportunityValue").removeClass("d-none");
    } else if (selectedValue === 3) {
        jQuery("#rentalValue").removeClass("d-none");
    }
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



function initMap() {
    var myLatLng = {
        lat: 31.4277655,
        lng: 73.0709271
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 5.5,
        styles: [
            {
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#242f3e"
                }
              ]
            },
            {
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#746855"
                }
              ]
            },
            {
              "elementType": "labels.text.stroke",
              "stylers": [
                {
                  "color": "#242f3e"
                }
              ]
            },
            {
              "featureType": "administrative.locality",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#d59563"
                }
              ]
            },
            {
              "featureType": "poi",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#d59563"
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#263c3f"
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#6b9a76"
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#38414e"
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "geometry.stroke",
              "stylers": [
                {
                  "color": "#212a37"
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#9ca5b3"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#746855"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "geometry.stroke",
              "stylers": [
                {
                  "color": "#1f2835"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#f3d19c"
                }
              ]
            },
            {
              "featureType": "transit",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#2f3948"
                }
              ]
            },
            {
              "featureType": "transit.station",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#d59563"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#17263c"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#515c6d"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "labels.text.stroke",
              "stylers": [
                {
                  "color": "#17263c"
                }
              ]
            }
          ],
        mapTypeControl: false,
        streetViewControl: false,
        zoomControl: false,
        fullscreenControl: false,
        gestureHandling: 'none',

    });

    var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    // icon: {
    //     url: 'path/to/your/custom-icon.png', // replace with the path to your custom icon
    //     scaledSize: new google.maps.Size(40, 40), // adjust the size as needed
    // },
    label: {
        text: '1', // label text
        color: 'white', // label text color
        fontWeight: 'bold', // label text weight
    },
});

    
    var infowindow = new google.maps.InfoWindow({
        content: 'Your Marker Information', 
    });

    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });

  //   // First Marker
  //   var marker1 = new google.maps.Marker({
  //     position: { lat: 31.4277655, lng: 73.0709271 },
  //     map: map,
  //     label: {
  //         text: '1',
  //         color: 'white',
  //         fontWeight: 'bold',
  //     },
  // });

  // var infowindow1 = new google.maps.InfoWindow({
  //     content: 'Marker 1 Information',
  // });

  // marker1.addListener('click', function() {
  //     infowindow1.open(map, marker1);
  // });

  // Second Marker
  var marker2 = new google.maps.Marker({
      position: { lat: 30.2275574, lng: 72.7197111 },
      map: map,
      label: {
          text: '2',
          color: 'white',
          fontWeight: 'bold',
      },
  });

  var infowindow2 = new google.maps.InfoWindow({
      content: 'Marker 2 Information',
  });

  marker2.addListener('click', function() {
      infowindow2.open(map, marker2);
  });

  // Second Marker
  var marker2 = new google.maps.Marker({
    position: { lat: 30.8510591, lng: 73.5304344 },
    map: map,
    label: {
        text: '3',
        color: 'white',
        fontWeight: 'bold',
    },
});

var infowindow2 = new google.maps.InfoWindow({
    content: 'Marker 3 Information',
});

marker2.addListener('click', function() {
    infowindow2.open(map, marker2);
});
}

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
