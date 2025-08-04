// Payment
function calculatePayment() {
    var department = document.getElementById("department").value;
    var venue = document.getElementById("venue").value;
    var paymentInput = document.getElementById("payment");

    if (department === "Guest") {
        switch (venue) {
            case "Bishop Dewit Hall":
                paymentInput.value = 400;
                break;
            case "Bishop Martinez Hall":
                paymentInput.value = 300;
                break;
            case "Audio Visual Room":
                paymentInput.value = 300;
                break;
            case "Rooms":
                var roomType = document.querySelector('input[name="roomType"]:checked').value;
                if (roomType === "academic") {
                    paymentInput.value = 1800;
                } else if (roomType === "nonAcademic") {
                    paymentInput.value = 600;
                } else {
                    paymentInput.value = "";
                }
                break;
            case "SAC Playground":
                paymentInput.value = 0;
                break;
            default:
                paymentInput.value = "";
        }
    } else {
        paymentInput.value = "";
    }
}

function toggleRoomType() {
    var venue = document.getElementById("venue").value;
    var roomTypeDiv = document.getElementById("roomType");

    if (venue === "Rooms") {
        roomTypeDiv.style.display = "block";
    } else {
        roomTypeDiv.style.display = "none";
    }
}

// Reservation Form Alert Message
function showAlert() {
    alert('Reservation Sent. Wait for more details');
    document.getElementById('myForm').style.display = 'none';
    return true;
}

// Checkbox Function
window.onload = function() {
    var checkboxes = document.querySelectorAll("input[type=checkbox]");
    var quantityInputs = document.querySelectorAll("input[type=number]");

    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', function() {
            if (this.checked) {
                quantityInputs[i].disabled = false;
            } else {
                quantityInputs[i].disabled = true;
                quantityInputs[i].value = '';
            }
        });
    }
}

// Show/Hide Password
function togglePasswordVisibility() {
    var passwordInput = document.getElementById('adminPassword');
    var passwordIcon = document.getElementById('showpass');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordIcon.classList.remove('fa-eye-slash');
        passwordIcon.classList.add('fa-eye');
    } else {
        passwordInput.type = "password";
        passwordIcon.classList.remove('fa-eye');
        passwordIcon.classList.add('fa-eye-slash');
    }
}