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

    <script src="Stuk-jszip-3109282/dist/jszip.js"></script>
    <script src="Stuk-jszip-3109282/vendor/FileSaver.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
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
                    url: 'excursionistas.php',
                    dataSrc: '',
                    type:"GET"
                },
                columns:  [
                    {title: "ID", data:'id'},
                    {title: "Nombre complet", data:'nom'},
                    {title: "Email", data:'email'},
                    {title: "Edat", data:'edat'},
                    {title: "Nivell", data:'nivell'}
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                select: true,
                deferRender: true,
                scrollY: 200,
                scrollCollapse: true,
                scroller: true,
                //Podria reemplazar el responsive por un scroller en la parte inferior
                /*
                scrollX: 200,
                */
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: 3 },
                    { responsivePriority: 3, targets: 1 },
                    { responsivePriority: 4, targets: 2 }
                ],
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
            $("#b9").click(function() {
                table.column(3).search( '19' ).draw();
            });
            $("#bu10").click(function() {
                $("#idc").val('');
                $("#nomc").val('');
                $("#email").val('');
                $("#edat").val('');
                $("#nivell").val('');
                $("#modalEdita").modal();
            });
            $("#bu11").click(function() {
                let seleccio = table.rows( { selected: true } );
                let posicio = table.row(seleccio).index();
                let id = table.cell(posicio,0).data();
                loadExcursionista(id);
            });
            $("#bu12").click(function() {
                let seleccio = table.rows( { selected: true } );
                let posicio = table.row(seleccio).index();
                let id = table.cell(posicio,0).data();
                window.location.href = 'elimina.php?id=' + id;
            });
            $('#bu13').click(function () {
                var zip = new JSZip();
                var img = zip.folder("images");
                img.file("jasito.jpg", "R0lGODdhBQAFAIACAAAAAP/eACwAAAAABQAFAAACCIwPkWerClIBADs=", {base64: true});
                zip.generateAsync({type:"blob"})
                    .then(function(content) {
                        // see FileSaver.js
                        saveAs(content, "example.zip");
                    });
            })
            $("#bu14").click(function() {
                var docDefinition = {
                    content: [{text: "hello world"}],
                    styles: {
                        header: {
                            fontSize: 12,
                            bold: true
                        }
                    }
                }
                pdfMake.createPdf(docDefinition).download();
            });

            function loadExcursionista(idExcursionista) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var item = JSON.parse(this.responseText)[0];
                        $("#idc").val(item.id);
                        $("#nomc").val(item.nom);
                        $("#email").val(item.email);
                        $("#edat").val(item.edat);
                        $("#nivell").val(item.nivell);
                        $("#modalEdita").modal();
                    }
                };
                xhttp.open("GET", "excursionistas.php?id="+idExcursionista, true);
                xhttp.send();
            }

            table.on('draw', function() {
                table.rows().every( function () {
                    let data = this.data();
                    let row = $(this.node());
                    if (data['nivell'] == 1) {
                        row.find('td:eq(4)').addClass('text-danger font-weight-bold');
                    }
                    if (data['nivell'] == 2) {
                        row.find('td:eq(4)').addClass('text-warning font-weight-bold');
                    }
                    if (data['nivell'] == 3) {
                        row.find('td:eq(4)').addClass('text-secondary font-weight-bold');
                    }
                    if (data['nivell'] == 4) {
                        row.find('td:eq(4)').addClass('text-info font-weight-bold');
                    }
                    if (data['nivell'] == 5) {
                        row.find('td:eq(4)').addClass('text-success font-weight-bold');
                    }
                });
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
        <button id="b9" class="btn btn-primary">AGE: 19</button>
        <button id="bu10" class="btn btn-primary">INSERTAR</button>
        <button id="bu11" class="btn btn-primary">EDITAR</button>
        <button id="bu12" class="btn btn-primary">ELIMINAR</button>
        <button id="bu13" class="btn btn-primary">ZIP</button>
        <button id="bu14" class="btn btn-primary">PDF</button>
        <hr>
        <div class="row">
            <div class="col">
                <table id="example" class="table table-striped table-bordered w-100"/>
            </div>
        </div>
    </div>

    <div id="modalEdita" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!-- header modal -->

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edita Excursionista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- body modal -->

                <div class="modal-body">
                    <form role="form" name="formEdita" action="edita.php" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Id:</label>
                                <input id="idc" type="text" class="form-control" placeholder="Id Excursionista" name="id">
                            </div>
                            <div class="col-md-6">
                                <label>Nom:</label>
                                <input id="nomc" type="text"class="form-control" placeholder="Nom Excursionista" name="nom">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Email:</label>
                                <input id="email" type="text"class="form-control" placeholder="Email Excursionista" name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Edat:</label>
                                <input id="edat" type="text"class="form-control" placeholder="Edat Excursionista" name="edat">
                            </div>
                            <div class="col-md-6">
                                <label>Nivell:</label>
                                <input id="nivell" type="text"class="form-control" placeholder="Nivell Excursionista" name="nivell">
                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
                            <input id="bSubmit" type="submit" class="btn btn-primary" value="Guardar"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>