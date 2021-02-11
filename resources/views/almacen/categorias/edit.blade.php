@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editar Categoria</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('categorias.update',['categoria' => $categoria->idcategoria])}}" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Categoria</label>
                    <input type="text"
                    name="nombre"
                    class="form-control @error('nombre') is-invalid @enderror"
                    id="nombre"
                    placeholder="Nombre de la categoría"
                    value="{{$categoria->nombre}}"
                    >
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea 
                        name="descripcion" 
                        id="descripcion" 
                        cols="30" rows="8" 
                        placeholder="Descripcion de la categoría" 
                        class="form-control"
                        >{{$categoria->descripcion}}</textarea>
                    
                    @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar categoría">
                    <a href="{{route('categorias.index')}}" class="btn btn-success">Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop