function login() {
    user = $("#user").val();
    pass = $("#pass").val();
    err = "";

    if( user != "" && pass != "") {
        $.post("/~zboyle1/ajax/loginajax.php",{"cmd": "login", "user": user, "pass": pass },function(data) {
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
    $.post("login.php", {"cmd":"logout"}, function(data) {
        window.location.href = "/~zboyle1/index.php";
    });
}