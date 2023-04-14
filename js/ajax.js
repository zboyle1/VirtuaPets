const pets = "/~zboyle1/ajax/petsajax.php";
const account = "/~zboyle1/ajax/loginajax.php";
const inventory = "/~zboyle1/ajax/inventoryajax.php";

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
    user = $("#user").val();
    pass = $("#pass").val();
    dob = $("#dob").val();
    err = "";

    if( user != "" && pass != "") {
        $.post(account, {"cmd": "signup", "user": user, "pass": pass, "dob": dob}, function(data) {
            if(data == '0') {
                err = "Invalid birthday input";
                $("#message").html(err);
            } else if(data == '1') {
                err = "Username taken";
                $("#message").html(err);
            } else if(data == '2') {
                err = "Signup failed";
                $("#message").html(err);
            } else if(data == 'success'){
                window.location.href = "/~zboyle1/";
            }
        });
    }
}

/* function showuser() {
    
}

function buyitem() {
    
}

function showitems() {

}

function useitem() {

}

function createpet() {
    petname = $("#petname").val();
    if( petname != "") {
        $.post(pets, {"cmd": "create", "petname": petname, "species": species, "color": color, "gender": gender}, function(data) {
            $("#message").html(data);
            window.location.href = "/~zboyle1/places/profile.php";
        });
    }
}

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
