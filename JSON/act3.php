<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="funcions.js"></script>
    <title>act3</title>
</head>
<body>
    <script>
        $(document).ready(function(){
            nivells($("#nivells"));
            $("#nivells").change(function(){
                let nivell = $("#nivells").children("option:selected").attr('id');
                $('#excursionistes').empty();
                excursionistes('nivell', nivell, $("#excursionistes"));
            });
        })
    </script>
    <form>
        <select id="nivells">
            <option>Select</option>
        </select>
        <select id="excursionistes">
            <option>Select</option>
        </select>
    </form>
</body>
</html>
