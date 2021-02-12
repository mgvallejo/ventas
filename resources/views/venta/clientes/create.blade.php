@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Nuevo Cliente</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('clientes.store')}}" novalidate>
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            id="nombre"
                            placeholder="Nombres"
                            value="{{old('nombre')}}"
                            >
                            @error('nombre')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text"
                            name="direccion"
                            class="form-control @error('direccion') is-invalid @enderror"
                            id="direccion"
                            placeholder="Direccion del cliente"
                            value="{{old('direccion')}}"
                            >
                            @error('direccion')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="tipo_documento">Tipo de documento</label>

                            <select name="tipo_documento" class="form-control form-control @error('tipo_documento') is-invalid @enderror">
                                <option value="">Seleccione un tipo de documento</option>
                                <option value="DNI">DNI</option>
                                <option value="RUC">RUC</option>
                                <option value="PAS">PAS</option>
                            </select>

                            @error('tipo_documento')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="num_documento">Número de documento</label>
                            <input type="text"
                            name="num_documento"
                            class="form-control @error('num_documento') is-invalid @enderror"
                            placeholder="Número de documento del cliente"
                            value="{{old('num_documento')}}"
                            >
                            @error('num_documento')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text"
                            name="telefono"
                            class="form-control @error('telefono') is-invalid @enderror"
                            placeholder="Teléfono"
                            value="{{old('telefono')}}"
                            >
                            @error('telefono')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email"
                            value="{{old('email')}}"
                            >
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar cliente">
                    <a href="{{route('clientes.index')}}" class="btn btn-success">Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop