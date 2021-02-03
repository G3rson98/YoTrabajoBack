@extends('Layout')

@section('title','Table')

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

<!-- datepicker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection

@section('body')
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))

    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    @endforeach
</div>

<div class="card-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>CI</th>
                <th>Nombre</th>
                <th>A Paterno</th>
                <th>A Materno</th>
                <th>Teleno</th>
                <th>Fecha Reg</th>
                <th>Calificacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ ($loop->index)+1}}</td>
                <td>{{ $empleado->ci}}</td>
                <td>{{ $empleado->nombre}}</td>
                <td>{{ $empleado->apellidoP}}</td>
                <td>{{ $empleado->apellidoM}}</td>
                <td>{{ $empleado->telefono}}</td>
                <td>{{ $empleado->fechaRegistro}}</td>
                <td>
                    @if ($empleado->sancion ==='activo')
                        <span class="right badge badge-danger">Sancionado</span>
                    @else
                        <span class="right badge badge-success">Disponible</span>
                    @endif
                    @if ($empleado->estado ==='activo')
                        <span class="right badge badge-success">activo</span>
                    @else
                        <span class="right badge badge-danger">inactivo</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('empleado.destroy',$empleado->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar registro">
                        <i class="fas fa-trash"></i>
                    </a>
                    <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar registro">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver registro">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$empleado->id}}" 
                        data-name="{{$empleado->nombre.' '.$empleado->apellidoP.' '.$empleado->apellidoM}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Banear empleado">
                        <i class="fas fa-ban"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>CI</th>
                <th>Nombre</th>
                <th>A Paterno</th>
                <th>A Materno</th>
                <th>Teleno</th>
                <th>Fecha Reg</th>
                <th>Calificacion</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>

@include('persona.empleado.modal')


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
        $('a').tooltip();

    });
</script>

<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({

            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var nombre = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title ').text('Sancionar a: ' + nombre)
        modal.find('.modal-body #persona-id').val(recipient)
    })
</script>

@endsection