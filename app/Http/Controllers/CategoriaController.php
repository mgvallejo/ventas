<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function __construc()
    {
        # code...
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $categorias = DB::table('categorias')
                ->where('nombre','LIKE','%'.$query.'%')
                ->where('condicion','=','1')
                ->orderBy('idcategoria','desc')
                ->paginate(7);
            return view('almacen.categorias.index', ["categorias"=>$categorias, "searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view("almacen.categorias.create");
    }

    public function store(CategoriaRequest $request)
    {
        $categoria = new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        $categoria->save();
        //return redirect('almacen/categorias');
        return Redirect()->action('CategoriaController@index');
    }

    public function show($id)
    {
        return view("almacen.categorias.show",["categorias"=>Categoria::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen.categorias.edit",["categorias"=>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        //return redirect('almacen/categorias');
        return Redirect()->action('CategoriaController@index');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return Redirect()->action('CategoriaController@index');
    }
}
