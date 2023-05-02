@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="alert alert-light" role="alert">
                ENTRADA DE PRODUCTO
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <div class="card border-dark border  mb-3" style="margin-left: 350px; margin-right: 350px">
        <div class="card-body text-success">
            <h5 class="card-title text-center">Ingresando productos a la venta</h5><br>
            <form>
                <fieldset>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                        <select class="form-select" id="inputGroupSelect01">
                            <option selected>Selecciona</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>


                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Producto</label>
                        <select class="form-select" id="inputGroupSelect01">
                            <option selected>Selecciona</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>



                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Precio Compra</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword">
                        </div>
                    </div>

                    <div class="col text-center">
                        <button type="submit" class="btn btn-success center-block">Guardar</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>


@endsection
