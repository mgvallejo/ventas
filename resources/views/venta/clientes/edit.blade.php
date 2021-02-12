@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editar Cliente</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('clientes.update',['persona' => $persona->idpersona])}}" novalidate>
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{$persona->nombre}}"
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
                            value="{{$persona->direccion}}"
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
                                @if($persona->tipo_documento='DNI')
                                    <option value="DNI" selected>DNI</option>
                                    <option value="RUC">RUC</option>
                                    <option value="PAS">PAS</option>
                                @elseif($persona->tipo_documento='RUC')
                                    <option value="DNI">DNI</option>
                                    <option value="RUC" selected>RUC</option>
                                    <option value="PAS">PAS</option>
                                @else
                                    <option value="DNI">DNI</option>
                                    <option value="RUC">RUC</option>
                                    <option value="PAS" selected>PAS</option>
                                @endif
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
                            value="{{$persona->num_documento}}"
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
                            value="{{$persona->telefono}}"
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
                            value="{{$persona->email}}"
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
                    <input type="submit" class="btn btn-primary" value="Actualizar cliente">
                    <a href="{{route('clientes.index')}}" class="btn btn-success">Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop