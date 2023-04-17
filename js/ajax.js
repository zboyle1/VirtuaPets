const pets = "/~zboyle1/ajax/petsajax.php";
const account = "/~zboyle1/ajax/loginajax.php";
const items = "/~zboyle1/ajax/itemsajax.php";

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

// User and item functions

function showuser(user) {
    $.post(account, {"cmd": "show", "user": user}, function(data) {
        if(data == '0') {
            err = "Could not find profile";

            $("#message").html(err);
            $("#message").css("display", "block");
        } else {
            $("#userinfo").html(data);
        }
    });
    return(false);
}

function showitems() {
    $.post(items, {"cmd": "show"}, function(data) {
        if(data == '0') {
            err = "Trouble loading items";
            
            $("#message").css("display", "block");
        } else {
            $("#content").append(data);
        }
    });
    return(false);
}

function buyitem(id, price, gold) {
    $.post(items, {"cmd": "buy", "id": id, "price": price, "gold": gold}, function(data){
        if(data == 0) {
            err = "Purchase failed. Please try again.";

            $("#message").html(err);
            $("#message").css("display", "block");
        } else if(data == 1) {
            location.reload();
        }
    });
}

/*
function showuserinv(){

}

function useitem() {

}
*/

// Pet functions

function createpet(user,id) {
    petname = $("#petname").val();
    species = $("#species").val();
    color = $("#color").val();
    gender = $('input[name=gender]:checked').val();

    dest = "/~zboyle1/places/profile.php?user=" + user;

    $.post(pets, {"cmd": "create", "id": id, "petname": petname, "species": species, "color": color, "gender": gender}, function(data) {
        if(data == '1') {
            window.location.href = dest;
        } else {
            err = "Pet creation failed";
            $("#message").html(err);
            $("#message").css("display", "block");
        }
    });
    return(false);
}

function showpet(user) {
    $.post(pets, {"cmd": "show", "user": user}, function(data) {
        $("#content").append(data);
    });
    return (false);
}

/*
function feedpet() {
    petname = $("#petname").val();
    item = $("#item").val();
    $.post(pets, {"cmd": "feed", "petname": petname, "item": item}, function(data) {
        $("#message").html(data);
    });
}
*/
