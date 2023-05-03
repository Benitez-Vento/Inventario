@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="alert alert-light" role="alert">
            LISTA DE PRODUCTOS
        </div>
    </div>
</div>
@endsection

@section('contenido')
<div style="margin-left:30px; margin-right:30px; text-align:center">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Precio de Venta</th>
                <th>Stock</th>
                <th>Codigo de Tarea</th>
                <th>Marca</th>
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
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Precio de Venta</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Stock</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Categoria</label>
                        <div class="col-sm-12">
                            <select class="form-select" id="categorie_id" name="categorie_id" aria-label="Default select example">
                                <option selected>Escoger</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Marca</label>
                        <div class="col-sm-12">
                            <select class="form-select" id="brand_id" name="brand_id" aria-label="Default select example">
                                    <option selected>Escoger</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                    @endforeach
                            </select>
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
            ajax: "{{ route('productos.index') }}",
            columns: [
                {data: 'DT_RowIndex',name: 'DT_RowIndex'},
                {data: 'nombre',name: 'nombre'},
                {data: 'imagen',name: 'imagen'},
                {data: 'precio_venta',name: 'precio_venta'},
                {data: 'stock',name: 'stock'},
                {data: 'categorie.nombre',name: 'categorie.nombre'},
                {data: 'brand.nombre',name: 'brand.nombre'},
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
            $.get("{{ route('productos.index') }}" + '/' + id + '/edit', function(data) {
                $('#modelHeading').html("Edit Post");
                $('#savedata').val("edit-user");
                $('#ajaxModelexa').modal('show');
                $('#id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#imagen').val(data.imagen);
                $('#precio_venta').val(data.precio_venta);
                $('#stock').val(data.stock);
                $('#categorie_id').val(data.categorie.nombre);
                $('#brand_id').val(data.brand.nombre);
            })
        });
        $('#savedata').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#postForm').serialize(),
                url: "{{ route('productos.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {

                    $('#postForm').trigger("reset");
                    $('#ajaxModelexa').modal('hide');
                    table.draw();

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#savedata').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deletePost', function() {

            var id = $(this).data("id");
            confirm("Estas seguro de eliminar el producto?");

            $.ajax({
                type: "DELETE",
                url: "{{ route('productos.store') }}" + '/' + id,
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
