<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="funcions.js"></script>
    <title>act5</title>
</head>
<body>
    <script>
        $(document).ready(function(){
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let emails = JSON.parse(this.responseText);
                    for (email in emails) {
                        let correu = emails[email].email;
                        let url = 'act1B.php?email="'+correu+'"';
                        let a = $("<a/>", {href:url , class:"dropdown-item", text:correu});
                        $("#emails").append(a);
                    }
                }
            };
            xhttp.open("GET", "act1B.php");
            xhttp.send();
        });
    </script>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Emails
        </button>
        <div id="emails" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        </div>
    </div>
</body>
</html>