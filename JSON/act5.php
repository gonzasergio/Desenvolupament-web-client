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
        $("#emails").change(function(){
            let email = $(this).children("option:selected").val();
            $('#excursionistes').empty();
            excursionistes('email', email, $("#excursionistes"));
        });
    })
</script>
<form>
    <select id="emails">
        <option>Select</option>
    </select>
    <select id="excursionistes">
        <option>Select</option>
    </select>
</form>
</body>
</html>