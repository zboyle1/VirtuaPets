const pets = "/~zboyle1/ajax/petsajax.php";
const account = "/~zboyle1/ajax/loginajax.php";
const inventory = "/~zboyle1/ajax/inventoryajax.php";


// Login functions

function login() {
    user = $("#user").val();
    pass = $("#pass").val();
    err = "";

    if( user != "" && pass != "") {
        $.post(account, {"cmd": "login", "user": user, "pass": pass },function(data) {
            if(data == '1') {
                window.location.href = "/~zboyle1/index.php";
            } else {
                err = "Invalid login";
                $("#message").html(err);
                $("#message").css("display", "block");
            }
        });
        return(false);
    }
}

function logout() {
    $.post(account, {"cmd": "logout"}, function(data) {
        if(data == '1') {
            window.location.href = "/~zboyle1/index.php";
        } else {
            console.error('something weird happened');
        }
    });
}


function signup() {
    newuser = $("#user").val();
    newpass = $("#pass").val();
    dob = $("#dob").val();
    err = "";

    if( user != "" && pass != "") {
        $.post(account, {"cmd": "signup", "newuser": newuser, "newpass": newpass, "dob": dob}, function(data) {
            if(data == '0') {
                err = "Invalid birthday input";
            } else if(data == '1') {
                err = "Username taken";
            } else if(data == '2') {
                err = "Signup failed";
            } else if(data == '3') {
                window.location.href = "/~zboyle1/index.php";
            } else {
                err = "Signup failed";
            }
            $("#message").html(err);
            $("#message").css("display", "block");
        });
        return(false);
    }
}

/* // User and item functions

function showuser() {
    
}

function buyitem() {
    
}

function showitems() {

}

function useitem() {

} */

// Pet functions

function createpet() {
    petname = $("#petname").val();
    species = $("#species").val();
    color = $("#color").val();
    gender = $('input[name=gender]:checked').val();

    err = "";

    $.post(pets, {"cmd": "create", "petname": petname, "species": species, "color": color, "gender": gender}, function(data) {
        if(data == '1') {
            window.location.href = "/~zboyle1/places/profile.php";
        } else {
            err = "Pet creation failed";
            $("#message").html(err);
            $("#message").css("display", "block");
            console.log(data);
        }
    });
    return(false);
}

/*
function feedpet() {
    petname = $("#petname").val();
    item = $("#item").val();
    $.post(pets, {"cmd": "feed", "petname": petname, "item": item}, function(data) {
        $("#message").html(data);
    });
}

function showpet() {
    $.post(pets, {"cmd": "show"}, function(data) {
        $("#mypet").html(data);
    });
} */
