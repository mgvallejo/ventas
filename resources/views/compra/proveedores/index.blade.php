@extends('adminlte::page')

@section('title', 'Proveedor')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h4>Listado de Proveedores</h4>
                <a class="btn btn-success" href="{{route('proveedores.create')}}"><i class="fas fa-plus"></i> Nuevo Registro</a>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-xl-12">
                    <form action="{{route('proveedores.index')}}" method="GET">
                        <div class="form-row">
                            <div class="col-sm-6 my-1">
                                <input type="search" class="form-control" name="searchText" value="{{$searchText}}">
                            </div>
                            <div class="col-auto my-1">
                                </i><input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Tipo Doc.</th>
                            <th>Número Doc</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($personas)<=0)
                            <tr>
                                <td colspan="8">No hay resultados</td>
                            </tr>
                        @else
                        @foreach($personas as $persona)
                            <tr>
                                <td>
                                    <eliminar-proveedor
                                        proveedor-id={{$persona->idpersona}}>
                                    </eliminar-proveedor>
                                    <a href=" {{route('proveedores.edit',['persona' => $persona->idpersona])}} " class="btn btn-info btn-sm">Editar</a>
                                </td>
                                <td>{{$persona->idpersona}}</td>
                                <td>{{$persona->nombre}}</td>
                                <td>{{$persona->tipo_documento}}</td>
                                <td>{{$persona->num_documento}}</td>
                                <td>{{$persona->direccion}}</td>
                                <td>{{$persona->telefono}}</td>
                                <td>{{$persona->email}}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{$personas->links()}}
        </div>
    </div>
@stop

@section('css')
    {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}
@stop

@section('js')
    <script src="{{asset('js/app.js')}}"></script>
@stop