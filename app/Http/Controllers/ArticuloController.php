<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Categoria;
use App\Http\Requests\ArticuloRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    public function __construc()
    {
        # code...
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $articulos = DB::table('articulos as a')
                ->join('categorias as c', 'a.idcategoria','=','c.idcategoria')
                ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
                ->where('a.nombre','LIKE','%'.$query.'%')
                ->orwhere('a.codigo','LIKE','%'.$query.'%')
                ->orderBy('idarticulo','desc')
                ->paginate(5);
            return view('almacen.articulos.index', ["articulos"=>$articulos, "searchText"=>$query]);
        }
    }
    
    public function create()
    {
        $categorias = DB::table('categorias')
                    ->where('condicion','=','1')
                    ->get();
        return view("almacen.articulos.create")->with('categorias',$categorias);
    }

    public function store(ArticuloRequest $request)
    {
        $articulo = new Articulo();
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }

        $articulo->save();
        return Redirect()->action('ArticuloController@index');
    }

    public function show(Articulo $articulo)
    {
        return view('almacen.articulos.show', compact('articulo'));
    }

    public function edit(Articulo $articulo)
    {
        $categorias = DB::table('categorias')
                    ->where('condicion','=','1')
                    ->get();
        return view('almacen.articulos.edit', compact('categorias','articulo'));
    }

    public function update(ArticuloRequest $request, Articulo $articulo)
    {
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->update();
        return Redirect()->action('ArticuloController@index');
    }

    public function destroy(Articulo $articulo)
    {
        $articulo->estado='Inactivo';
        $articulo->update();
        return Redirect()->action('ArticuloController@index');
    }
}
