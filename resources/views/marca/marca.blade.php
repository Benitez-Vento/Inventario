@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="alert alert-light" role="alert">
            MARCAS
        </div>

    </div>
</div>
@endsection

@section('contenido')
<div style="margin-left:30px; margin-right:30px; text-align:left">
    <table class="table table-bordered data-table">
        <a class="btn btn-info" href="javascript:void(0)" id="createNewPost"> Agregar</a>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModelexa" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="postForm" name="postForm" class="form-horizontal">

                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" id="error_nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
                        </div>
                        <div  class="text-danger" style="text-align:center" role="alert" >
                            <strong id="message_nombre"></strong>
                     </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="savedata" value="create">Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando Pagina _START_ con _TOTAL_ Registros",
                "infoEmpty": "Sin resultados encontrados en la cantidad",
                "infoFiltered": " total de _MAX_ registros",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
                }
            },
            ajax: "{{ route('marca.index') }}",
            columns: [
                {data: 'DT_RowIndex',name: 'DT_RowIndex'},
                {data: 'nombre',name: 'nombre'},
                {data: 'action',name: 'action',orderable: false,searchable: false},
            ]
        });

        $('#createNewPost').click(function() {
            $('#savedata').val("create-post");
            $('#id').val('');
            $('#postForm').trigger("reset");
            $('#modelHeading').html("Agregando Producto");
            $('#ajaxModelexa').modal('show');
        });
        $('body').on('click', '.editPost', function() {
            var id = $(this).data('id');
            $.get("{{ route('marca.index') }}" + '/' + id + '/edit', function(data) {
                $('#modelHeading').html("Edit Post");
                $('#savedata').val("edit-user");
                $('#ajaxModelexa').modal('show');
                $('#id').val(data.id);
                $('#nombre').val(data.nombre);
            })
        });
        $('#savedata').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#postForm').serialize(),
                url: "{{ route('marca.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {

                    $('#postForm').trigger("reset");
                    $('#ajaxModelexa').modal('hide');
                    table.draw();

                },
                error: function(data) {
                    console.log(data);
                    let response = JSON.parse(data.responseText);
                    let errors = response.errors;

                    // validando errrores 
                    $.each(errors,function(index, value){
                        $("#message_"+index).html(value);
                        $("#error_"+index).removeClass("invalid-feedback");
                        
                        console.log('index: ' + index + ', this value: ' + value);
                    });

                    console.log(response);
                    $('#savedata').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deletePost', function() {

            var id = $(this).data("id");
            confirm("Estas seguro de eliminar el producto?");

            $.ajax({
                type: "DELETE",
                url: "{{ route('marca.store') }}" + '/' + id,
                success: function(data) {
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

    });
</script>
@endsection
