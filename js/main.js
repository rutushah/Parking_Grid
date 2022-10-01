/**
 * Validation To check the user Role Selection On Select Role.php
 * 
 * Description : If user Role is not selected either admin or user, user should get validation message to select role
 * */ 
function selectRole(){
 $("form").submit(function () {
    var flag = true;
    $(':radio').each(function () {
        name = $(this).attr('name');
        if (flag && !$(':radio[name="' + name + '"]:checked').length) {
            alert(' Select User Role');
            flag = false;
        }
    });
    return flag;
});
}

/**
 * 
 * Method to redirect to admin's manage users page.
 * 
 */

function redirectToManageUsers(){
    window.location.href = "adminManageUsers.php"
}

/**
 * 
 * Method to redirect to admin's dashboard page.
 * 
 */

 function redirectToAdminDashboardPage(){
    window.location.href = "adminDashboard.php"
}

/**
 * 
 * Method to redirect to admin's manage booking page.
 * 
 */

 function redirectToManageBooking(){
    window.location.href = "adminManageBookings.php";
}

/**
 * 
 * Method to redirect to admin's manage location page
 * 
 */

 function redirectToManageLocation(){
    window.location.href = "adminManageLocation.php";
}
/**
 * 
  * Method to redirect to dashboard page of customer
 * 
 */
function redirectToCustomerDashboardPage(){
    window.location.href = "dashboard.php";
}

function redirectToLoginPage(){
    window.location.href = "login.php?role=customer";
}

/**
 * 
 * Method to check the blank field validation in edit profile
 * 
 */

 function validation(){
    if($("#firstName, #lastName,#cardNumber, #email, #phone").val()==""){
        $("#firstName, #lastName,#cardNumber #email, #phone").addClass('is-invalid');
        return false;
    }else{
        $("#firstName, #lastName, #cardNumber, #email, #phone").removeClass('is-invalid');
    }
     
}

$(document).ready(function(e) {
    $("#firstName").on("keyup",function(){
        if($("#firstName").val()==""){
            $("#firstName").addClass('is-invalid');
            return false;
        }else{
            $("#firstName").removeClass('is-invalid');
        }
    });
    $("#lastName").on("keyup",function(){
        if($("#lastName").val()==""){
            $("#lastName").addClass('is-invalid');
            return false;
        }else{
            $("#lastName").removeClass('is-invalid');
        }
    });
    $("#cardNumber").on("keyup",function(){
        if($("#cardNumber").val()==""){
            $("#cardNumber").addClass('is-invalid');
            return false;
        }else{
            $("#cardNumber").removeClass('is-invalid');
        }
    });
    $("#phone").on("keyup",function(){
        if($("#phone").val()==""){
            $("#phone").addClass('is-invalid');
            return false;
        }else{
            $("#phone").removeClass('is-invalid');
        }
    });
});

function emailCheck(){
    if($("#email").val()==""){
        $("#email").addClass('is-invalid');
        return false;
    }else{
        var regMail     =   /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
        if(regMail.test($("#email").val()) == false){
            $("#email").addClass('is-invalid');
            return false;
        }else{
            $("#email").removeClass('is-invalid');
            $('#next-form').collapse('show');
        }
    }
}

/**
 * 
 * JS validations for location.php
 * 
 */

function checkValidationForLocationPage(){
    
let vehicleType = document.getElementById('vehicle').value;
let ownerName = document.getElementById('ownerName').value;
let plateNumber = document.getElementById('plateNumber').value;
let v1 = document.getElementById("v1");
let v2 = document.getElementById("v2");
let v3 = document.getElementById("v3");

        if(plateNumber == ""){
             v3.innerHTML = `<p style = "color:red"> Error!!! Please select the plate number </p>`;
            // return;
           // alert("Please enter the plate number");
            return false;
        }else if(vehicleType == "Select the Vehicle Type"){
            v1.innerHTML = `<p style = "color:red"> Error!!! Please select the vehicle type </p>`;
            return false;
        }else if(ownerName == ""){
            v2.innerHTML = `<p style = "color:red"> Error!!! Owner name should not be empty. </p>`;
            return false;
        }
}

/**
 * 
 * JS blank field validations for login.php
 */

function checkBlankFieldValidationsForLogin(){
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let emailError = document.getElementById('email-error');
    let passwordError = document.getElementById('password-error');
    
      
        while(email == "" && password == "") {
             emailError.innerHTML = `<p style = "color:red"> Please enter email, email should not be blank. </p>`;
             passwordError.innerHTML = `<p style = "color:red"> Please enter password, password should not be blank. </p>`;
             return false;
        }

        if(email == ""){
            emailError.innerHTML = `<p style = "color:red"> Please enter email, email should not be blank. </p>`;
            return false
        }
        if(password == ""){
            passwordError.innerHTML = `<p style = "color:red"> Please enter password, password should not be blank. </p>`;
            return false;
        }
}

