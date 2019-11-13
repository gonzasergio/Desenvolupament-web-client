function imprimirExcursionistas(selector) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let excursionistes = JSON.parse(this.responseText);
            for (excursionista in excursionistes) {
                let id = excursionistes[excursionista].id;
                let name = excursionistes[excursionista].nom;
                let email = excursionistes[excursionista].email;
                let edat  = excursionistes[excursionista].edat;
                let nivell = excursionistes[excursionista].nivell;
                let newTB = $("<tbody/>");
                let newTR = $("<tr/>");
                let newTD = $("<td/>",{text:id});
                newTR.append(newTD);
                newTD = $("<td/>",{text:name});
                newTR.append(newTD);
                newTD = $("<td/>",{text:email});
                newTR.append(newTD);
                newTD = $("<td/>",{text:edat});
                newTR.append(newTD);
                newTD = $("<td/>",{text:nivell});
                newTR.append(newTD);
                newTB.append(newTR);
                selector.append(newTB);
            };
        };
    };
    xhttp.open("GET", "act1B.php");
    xhttp.send();
}

function nivells(selector) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let nivells = JSON.parse(this.responseText);
            for (nivell in nivells) {
                let id = nivells[nivell].id;
                let name = nivells[nivell].nom;
                let option = $("<option/>", {id:id, text:name});
                selector.append(option);
            }
        }
    };
    xhttp.open("GET", "act1A.php");
    xhttp.send();
}

function excursionistes(comparador, experiencia, selector) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let excursionistes = JSON.parse(this.responseText);
            for (excursionista in excursionistes) {
                let id = excursionistes[excursionista].id;
                let name = excursionistes[excursionista].nom;
                let option = $("<option/>", {id:id, text:name});
                selector.append(option);
            }
        }
    };
    xhttp.open('GET', 'act1B.php?'+comparador+'="'+experiencia+'"');
    xhttp.send();
}