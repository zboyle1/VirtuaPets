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

    imgdest = "/~zboyle1/assets/petimg/" + species + "/" + color + ".png";

    document.getElementById("newpet").src = imgdest;
}

function useanitem(id, itemname) {
    id = parseInt(id);

    $.confirm({
        title: 'Use item',
        content: 'Are you sure you want to use ' + itemname + '?',
        buttons: {
            confirm: function () {
                useitem(id);
            },
            cancel: function () {
                $.alert('You wont use' + itemname);
            }
        }
    });
}

function buyconfirm(id, itemname, price, gold) {
    price = parseInt(price);
    gold = parseInt(gold);
    id = parseInt(id);

    if (gold < price) {
        need = price - gold;
        
        $.alert({
            title: 'Buy item',
            content: 'You need ' + need + ' more gold for this purchase',
        });
    } else {
        $.confirm({
            title: 'Buy item',
            content: 'Are you sure you want to buy ' + itemname + ' for ' + price + ' gold?',
            buttons: {
                confirm: function () {
                    buyitem(id, price, gold);
                },
                cancel: function () {
                    $.alert('Purchase canceled!');
                }
            }
        });
    }
}