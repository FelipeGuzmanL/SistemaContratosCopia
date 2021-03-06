<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Establecimiento;
use App\Models\Rol;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::paginate(5);
        return view('users.index', compact('users'));
    }
    public function index_referente()
    {
        $users=User::where('rol',3)->paginate(5);
        return view('referentes.index_referente', compact('users'),['roles'=>Rol::all()]);
    }


    public function create()
    {
        return view('users.create',['establecimientos'=>Establecimiento::all(),'roles'=>Rol::all()]);
    }

    public function create_referente()
    {
        return view('referentes.create_referente',['establecimientos'=>Establecimiento::all(),'roles'=>Rol::all()]);
    }

    public function store(Request $request)
    {
        User::create($request->only('name', 'rut', 'email','rol','establecimiento','descripcion')
            +[
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect()->action([UserController::class, 'index'])->with('success', 'Usuario creado correctamente.');
    }

    public function store_referente(Request $request)
    {
        User::create($request->only('name', 'rut', 'email','rol','establecimiento','descripcion')
            +[
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect()->action([UserController::class, 'index_referente'])->with('success', 'Referente creado correctamente.');
    }

    public function Show(User $user)
    {
        //$user = User::findOrFail($id);
        //dd($user);
        return view('users.show', compact('user'));
    }

    public function show_referente(User $user)
    {
        //$user = User::findOrFail($id);
        //dd($user);
        return view('referentes.show_referente', compact('user'));
    }

    public function edit(User $user)
    {
        //$user = User::findOrFail($id);
        //dd($user);
        return view('users.edit', compact('user'),['establecimientos'=>Establecimiento::all(),'roles'=>Rol::all()]);
    }

    public function edit_referente(User $user)
    {
        //$user = User::findOrFail($id);
        //dd($user);
        return view('referentes.edit_referente', compact('user'),['establecimientos'=>Establecimiento::all(),'roles'=>Rol::all()]);
    }

    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $data = $request->only('name','username','email','rol','establecimientos','descripcion');
        if(trim($request->password)=='')
        {
            $data=$request->except('password');
        }
        else {
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->action([UserController::class, 'index'])->with('success', 'Usuario editado correctamente.');
    }

    public function update_referente(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $data = $request->only('name','username','email','rol','establecimientos','descripcion');
        if(trim($request->password)=='')
        {
            $data=$request->except('password');
        }
        else {
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->action([UserController::class, 'index_referente'])->with('success', 'Referente editado correctamente.');
    }

}
