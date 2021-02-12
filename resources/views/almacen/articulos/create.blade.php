@extends('adminlte::page')

@section('title', 'Nuevo Artículo')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Nuevo Artículo</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('articulos.store')}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Artículo</label>
                            <input type="text"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            id="nombre"
                            placeholder="Artículo"
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
                            <label for="categoria">Categoria</label>
                            <select name="idcategoria" class="form-control @error('idcategoria') is-invalid @enderror">
                                    <option value="">Seleccione una categoria</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->idcategoria}}" 
                                        {{old('idcategoria') == $categoria->idcategoria ? 'selected': ''}}>
                                        {{$categoria->nombre}}</option>
                                @endforeach
                            </select>

                            @error('idcategoria')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text"
                            name="codigo"
                            class="form-control @error('codigo') is-invalid @enderror"
                            id="codigo"
                            placeholder="Código de Barras"
                            value="{{old('codigo')}}"
                            >
                            @error('codigo')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text"
                            name="stock"
                            class="form-control @error('stock') is-invalid @enderror"
                            id="stock"
                            placeholder="Stock"
                            value="{{old('stock')}}"
                            >
                            @error('stock')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        <div class="form-group">
                            <label for="imagen">Imágen</label>
                            <input type="file" name="imagen" class="form-control">
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
                        >{{old('descripcion')}}</textarea>
                    
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar artículo">
                    <a href="{{route('articulos.index')}}" class="btn btn-success">Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop