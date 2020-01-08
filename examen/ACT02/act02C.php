<html lang="en">
<head>
    <title>DataTable</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

</head>
<body>
<script>
    $(document).ready( function () {
        let table = $('#example').DataTable( {
            ajax: {
                url: '../parking.json',
                dataSrc: '',
                type:"GET"
            },
            columns:  [
                {title: "Entrada", data:'timestamp_in'},
                {title: "Salida", data:'timestamp_out'},
                {title: "Matricula", data:'plate_number'},
                {title: "Precio", data:'price'},
                {title: "Minutos", data:'minutes'}
            ],
            //Podria reemplazar el responsive por un scroller en la parte inferior
            //scrollX: 200,
            responsive: true
        });

        table.on('draw', function() {
            table.rows().every(function () {
                let data = this.data();
                let row = $(this.node());
                if (data['minutes'] > 120) {
                    row.addClass('bg-danger');
                }
            });
        });

        $("#matriculas").change(function(){
            var matricula = $(this).children("option:selected").val();
            table.column(2).search(matricula).draw();
        });

        function cargaMatriculas(){
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let parkings = JSON.parse(this.responseText);
                    for (parking in parkings) {
                        let matricula = parkings[parking].plate_number;
                        let option = $("<option/>", {text:matricula});
                        $("#matriculas").append(option);
                    }
                }
            };
            xhttp.open("GET", "../parking.json");
            xhttp.send();
        }

        cargaMatriculas();
    });
</script>

<div class="container-fluid">
    <form>
        <div class="form-group">
            <select id="matriculas" class="form-control">
                <option>Selecciona</option>
            </select>
        </div>
    </form>

    <div class="row">
        <div class="col">
            <table id="example" class="table table-striped table-bordered w-100"/>
        </div>
    </div>
</div>
</body>
</html>