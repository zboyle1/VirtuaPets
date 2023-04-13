const pets = "/~zboyle1/ajax/petsajax.php";
const users = "/~zboyle1/ajax/usersajax.php";
const inventory = "/~zboyle1/ajax/inventoryajax.php";

function login() {
    user = $("#user").val();
    pass = $("#pass").val();
    err = "";

    if( user != "" && pass != "") {
        $.post(users, {"cmd": "login", "user": user, "pass": pass },function(data) {
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
    $.post(users, {"cmd": "logout"}, function(data) {
        if(data == 1) {
            window.location.href = "/~zboyle1/index.php";
        } else {
            console.error('something weird happened');
        }
    });
}

function signup() {
    user = $("#user").val();
    pass = $("#pass").val();
    month = $("#month").val();
    day = $("#day").val();
    year = $("#year").val();
    if( user != "" && pass != "") {
        $.post(users, {"cmd": "signup", "user": user, "pass": pass, "month": month, "day": day, "year": year}, function(data) {
            if(data == 0) {
                err = "Invalid birthday input";
                $("#message").html(err);
            } else if(data == 1) {
                err = "Username taken";
                $("#message").html(err);
            } else if(data == 2) {
                err = "Signup failed";
                $("#message").html(err);
            } else {
                window.location.href = "/~zboyle1/createpet.php";
            }
        });
    }
}

function showuser() {
    
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
}
