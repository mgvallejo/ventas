@extends('adminlte::page')

@section('title', 'Categorias')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h4>Listado de Categorías</h4>
                <a class="btn btn-success" href="{{route('categorias.create')}}"><i class="fas fa-plus"></i> Nuevo Registro</a>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-xl-12">
                    <form action="{{route('categorias.index')}}" method="GET">
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
                            <th>Categoria</th>
                            <th>Descripción</th>
                            <th>Condición</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($categorias)<=0)
                            <tr>
                                <td colspan="5">No hay resultados</td>
                            </tr>
                        @else
                        @foreach($categorias as $categoria)
                            <tr>
                                <td>
                                    <eliminar-categoria
                                        categoria-id={{$categoria->idcategoria}}>
                                    </eliminar-categoria>

                                    <a href=" {{route('categorias.edit',['categoria' => $categoria->idcategoria])}} " class="btn btn-info btn-sm">Editar</a>
                                </td>
                                <td>{{$categoria->idcategoria}}</td>
                                <td>{{$categoria->nombre}}</td>
                                <td>{{$categoria->descripcion}}</td>
                                <td>{{$categoria->condicion}}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{$categorias->links()}}
        </div>
    </div>
@stop

@section('css')
    {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}
@stop

@section('js')
    <script src="{{asset('js/app.js')}}"></script>
@stop