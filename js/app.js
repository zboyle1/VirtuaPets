$(document).foundation()

function updatecolorop() {
    species = $("#species").val();
    s =  document.getElementById("color")
    arr = [];    

    if (species == "dog") {
        arr = ["Black", "Brown", "White", "Dalmation"];
    } else if (species == 'cat') {
        arr = ["Calico", "White", "Tuxedo", "Orange"];
    }  else if (species == 'ferret') {
        arr = ["Sable", "Albino", "Black", "Panda"];
    }  else if (species == 'rabbit') {
        arr = ["Black", "White", "Broken", "Cream"];
    }  else if (species == 'frog') {  
        arr = ["Green", "Blue", "Black and Yellow", "Brown"];
    } else {
        for(i = s.options.length-1; i >= 0; i--) {
            s.remove(i);
        }
    }

    for(var i = 0; i < arr.length; i++) {
        s[i] = new Option(arr[i],arr[i]);
    }
    
    updatepetphoto();
}

function updatepetphoto() {
    species = $("#species").val();
    color = $("#color").val();

    //imgdest = "/~zboyle1/assets/petimg/" + speacies + "/" + color + ".png";
    imgdest = "/~zboyle1/assets/petimg/petplaceholder.png";

    document.getElementById("newpet").src = imgdest;
}