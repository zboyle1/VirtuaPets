const loginurl = "/~zboyle1/ajax/loginajax.php";
const pets = "/~zboyle1/ajax/petsajax.php";
const users = "/~zboyle1/ajax/usersajax.php";

function login() {
    user = $("#user").val();
    pass = $("#pass").val();
    err = "";

    if( user != "" && pass != "") {
        $.post(loginurl,{"cmd": "login", "user": user, "pass": pass },function(data) {
            if(data == 0) {
                err = "Invalid login";
                $("#message").html(data);
            } else {
                window.location.href = "/~zboyle1/index.php";
            }
        });
        return(false);
    }
}

function logout() {
    $.post(loginurl, {"cmd": "logout"}, function(data) {
        window.location.href = "/~zboyle1/index.php";
    });
}

function signup() {
    if( user != "" && pass != "") {
        $.post(users, {"cmd": "signup", "user": user, "pass": pass, "dob": dob}, function(data) {
            if(data == 0) {
                err = "Signup failed";
                $("#message").html(err);
            } else {
                window.location.href = "/~zboyle1/index.php";
            }
        });
    }
}

function showuser() {
    
}

function buyitem() {
    
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
}
