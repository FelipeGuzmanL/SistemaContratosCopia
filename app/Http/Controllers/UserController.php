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
        $users=User::paginate(5);
        return view('users.index_referente', compact('users'),['roles'=>Rol::all()]);
    }


    public function create()
    {
        return view('users.create',['establecimientos'=>Establecimiento::all(),'roles'=>Rol::all()]);
    }

    public function store(Request $request)
    {
        User::create($request->only('name', 'rut', 'email','rol','establecimiento')
            +[
                'password' => bcrypt($request->input('password')),
            ]);
        return redirect()->action([UserController::class, 'index'])->with('success', 'Usuario creado correctamente.');
    }

    public function Show(User $user)
    {
        //$user = User::findOrFail($id);
        //dd($user);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        //$user = User::findOrFail($id);
        //dd($user);
        return view('users.edit', compact('user'),['establecimientos'=>Establecimiento::all(),'roles'=>Rol::all()]);
    }

    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $data = $request->only('name','username','email','rol','establecimientos');
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

}
