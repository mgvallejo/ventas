@extends('adminlte::page')

@section('title', 'Articulos')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h4>Listado de Articulos</h4>
                <a class="btn btn-success" href="{{route('articulos.create')}}"><i class="fas fa-plus"></i> Nuevo Registro</a>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-xl-12">
                    <form action="{{route('articulos.index')}}" method="GET">
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
                            <th>Artículo</th>
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Imágen</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($articulos)<=0)
                            <tr>
                                <td colspan="6">No hay resultados</td>
                            </tr>
                        @else
                        @foreach($articulos as $articulo)
                            <tr>
                                <td>
                                    <eliminar-articulo
                                        articulo-id={{$articulo->idarticulo}}>
                                        
                                    </eliminar-articulo>

                                    <a href=" {{route('articulos.edit',['articulo' => $articulo->idarticulo])}} " class="btn btn-info btn-sm">Editar</a>
                                </td>

                                <td>{{$articulo->idarticulo}}</td>
                                <td>{{$articulo->nombre}}</td>
                                <td>{{$articulo->codigo}}</td>
                                <td>{{$articulo->categoria}}</td>
                                <td>{{$articulo->stock}}</td>
                                
                                <td>
                                    <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" alt="{{$articulo->nombre}}" height="80px" width="80px" class="img-thumbnail">
                                </td>
                                <td>{{$articulo->estado}}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{$articulos->links()}}
        </div>
    </div>
@stop

@section('css')
    {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}
@stop

@section('js')
    <script src="{{asset('js/app.js')}}"></script>
@stop