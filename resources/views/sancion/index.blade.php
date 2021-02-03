@extends('Layout')

@section('title','Table')

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

@endsection

@section('body')

<div class="card-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
            <th>#</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Duracion (días)</th>
                <th>estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanciones as $sancion)
            <tr>
                <td>{{ $sancion->id}}</td>
                <td>{{ $sancion->fechaInicio}}</td>
                <td>{{ $sancion->fechaFin}}</td>
                <td>{{ $sancion->cantidadDias}}</td>
                <td>{{ $sancion->tipo}}</td>

            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Duracion (días)</th>
                <th>estado</th>                
            </tr>
        </tfoot>
    </table>
</div>


@endsection

@section('js')

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            responsive: true,
            autoWith: false,
            language: {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - Disculpa",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "Ningun registro encontrado",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>

@endsection