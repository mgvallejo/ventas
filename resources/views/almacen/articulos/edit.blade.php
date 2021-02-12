@extends('adminlte::page')

@section('title', 'Actualizar Artículo')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Actualizar Artículo</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('articulos.update',['articulo' => $articulo->idarticulo])}}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Artículo</label>
                            <input type="text"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{$articulo->nombre}}"
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
                            <label for="idcategoria">Categoria</label>
                            <select name="idcategoria" class="form-control @error('idcategoria') is-invalid @enderror">
                                @foreach($categorias as $categoria)
                                    @if($categoria->idcategoria == $articulo->idcategoria)
                                        <option value="{{$categoria->idcategoria}}" selected>{{$categoria->nombre}}</option>
                                    @else
                                        <option value="{{$categoria->idcategoria}}">{{$categoria->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('idcategoria')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text"
                            name="codigo"
                            class="form-control @error('codigo') is-invalid @enderror"
                            id="codigo"
                            placeholder="Código de Barras"
                            value="{{$articulo->codigo}}"
                            >
                            @error('codigo')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text"
                            name="stock"
                            class="form-control @error('stock') is-invalid @enderror"
                            id="stock"
                            placeholder="Stock"
                            value="{{$articulo->stock}}"
                            >
                            @error('stock')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea 
                        name="descripcion" 
                        id="descripcion" 
                        cols="30" rows="8" 
                        placeholder="Descripcion del artículo" 
                        class="form-control"
                        >{{$articulo->descripcion}}</textarea>
                    
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imágen</label>
                        <input type="file" name="imagen" class="form-control">
                        @if(($articulo->imagen)!="")
                        <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" class="img-fluid img-thumbnail" width="300px" height="300px">
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar artículo">
                    <a href="{{route('articulos.index')}}" class="btn btn-success">Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop