<html lang="en">
<head>
    <title>DataTable</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

</head>
<body>
    <script>
        $(document).ready( function () {
            let table = $('#example').DataTable( {
                ajax: {
                    url: 'excursionistas.php',
                    dataSrc: '',
                    type:"GET"
                },
                columns:  [
                    {title: "Nombre complet", data:'nom'},
                    {title: "Email", data:'email'},
                    {title: "Edat", data:'edat'},
                    {title: "Nivell", data:'nivell'}
                ],
                select: true,
                responsive: true,
                language: {
                <?php if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "ca") : ?>
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
                    <?php elseif (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "es") : ?>
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    <?php else : ?>
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                    <?php endif ?>
                }
            });
            $("#b1").click(function() {
                table.select.style('os');
            });
            $("#b2").click(function() {
                table.select.style('single');
            });
            $("#b3").click(function() {
                table.select.style('multi');
            });
            $("#b4").click(function() {
                table.select.items('row');
            });
            $("#b5").click(function() {
                table.select.items('column');
            });
            $("#b6").click(function() {
                table.select.items('cell');
            });
            $("#b7").click(function() {
                table.rows().select();
            });
            $("#b8").click(function() {
                table.rows('.selected').deselect();
                table.columns('.selected').deselect();
                table.cells('.selected').deselect();
            });
        });
    </script>

    <div class="container-fluid">
        <button id="b1" class="btn btn-primary">OS</button>
        <button id="b2" class="btn btn-primary">SINGLE</button>
        <button id="b3" class="btn btn-primary">MULTI</button>
        <button id="b4" class="btn btn-primary">ROWS</button>
        <button id="b5" class="btn btn-primary">COLS</button>
        <button id="b6" class="btn btn-primary">CELLS</button>
        <button id="b7" class="btn btn-primary">SELECT ALL</button>
        <button id="b8" class="btn btn-primary">DESELECT ALL</button>
        <hr>
        <div class="row">
            <div class="col">
                <table id="example" class="table table-striped table-bordered" width="100%"/>
            </div>
        </div>
    </div>
</body>
</html>