<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonaRequest;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function __construc()
    {
        # code...
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $personas = DB::table('personas')
                ->where('nombre','LIKE','%'.$query.'%')
                ->where('tipo_persona','=','Cliente')
                ->orwhere('num_documento','LIKE','%'.$query.'%')
                ->where('tipo_persona','=','Cliente')
                ->orderBy('idpersona','desc')
                ->paginate(5);
            return view('venta.clientes.index', ["personas"=>$personas, "searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view("venta.clientes.create");
    }

    public function store(PersonaRequest $request)
    {
        $persona = new Persona;
        $persona->tipo_persona='Cliente';
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');

        $persona->save();
        return Redirect()->action('ClienteController@index');
    }

    public function show(Persona $persona)
    {
        return view('venta.clientes.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return view('venta.clientes.edit', compact('persona'));
    }

    public function update(PersonaRequest $request, Persona $persona)
    {
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');

        $persona->update();
        return Redirect()->action('ClienteController@index');
    }

    public function destroy(Persona $persona)
    {
        $persona->tipo_persona='Inactivo';
        $persona->update();
        return Redirect()->action('ClienteController@index');
    }
}