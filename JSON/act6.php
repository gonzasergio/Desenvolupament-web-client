<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="funcions.js"></script>
    <title>act6</title>
</head>
<body>
    <script>
        $(document).ready(function(){
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
                        let newLI = $("<li/>",{text:id + ", " + name + ", " + email + ", " + edat + ", " + nivell});
                        $("#l1").append(newLI);
                    }
                }
            };
            xhttp.open("GET", "act1B.php");
            xhttp.send();
        })
    </script>

    <ul id="l1"/>
</body>
</html>