<?php include 'BBDD.php'?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="funcions.js"></script>
    <title>act5</title>
</head>
<body>
    <script>
        $(document).ready(function(){
            emails($("#emails"));
            imprimirExcursionistas($("#t1"));
            $("#emails").change(function(){
                $('#t1 tbody').remove();
                let email = $("#emails").children("option:selected").val();
                imprimirExcursionistasXEmail($("#t1"), email);
            });
        });
    </script>

    <form>
        <select id="emails">
            <option>Select</option>
        </select>
    </form>

    <table id="t1">
        <thead>
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>EMAIL</th>
            <th>EDAT</th>
            <th>NIVELL</th>
        </tr>
        </thead>
    </table>
</body>
</html>