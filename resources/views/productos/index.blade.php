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
<div class="container-sm">
    <h1>Lista de Reservas - Pendientes</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Precio</th>
                <th>Huespedes</th>
                <th>Cantidad Dias</th>
                <th>Fecha Entrada</th>
                <th>Fecha Salida</th>
                <th>Fecha Registro</th>
                <th>Pago Costo</th>
                <th>Cliente</th>
                <th>Cupon</th>
                <th>Propiedad </th>
                <th>Tipo de pago</th>
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
                        <label for="name" class="col-sm-2 control-label">precio</label>
                        <div class="col-sm-12">
                            <input type="double" class="form-control" id="precio" name="precio" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Huespedes</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="huespedes" name="huespedes" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Cantidad_Dias</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="cantidad_dias" name="cantidad_dias" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Fecha_Entrada</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Fecha_Salida</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Fecha_Registro</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Pago_Costo</label>
                        <div class="col-sm-12">
                            <input type="double" class="form-control" id="pago_costo" name="pago_costo" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">User_id</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="user_id" name="user_id" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Coupon_id</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="coupon_id" name="coupon_id" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Propertie_id</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="propertie_id" name="propertie_id" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Type_Payment_id</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="type_payment_id" name="type_payment_id" placeholder="Enter Name" value="" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
