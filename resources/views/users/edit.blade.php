@extends('layouts.main', ['activePage' => 'usuarios', 'titlePage' => 'Editar Usuario'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('users.update', $user->id)}}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-tittle">Usuario</h4>
                            <p class="card-category">Editar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger">Volver</a>
                                </div>
                            </div>
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="rut" class="col-sm-2 col-form-label">RUT</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="rut" value="{{ $user->rut }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" >
                                </div>
                            </div>
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Establecimiento</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar Establecimiento</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="establecimiento">
                                          @foreach ( $establecimientos as $establecimiento )
                                            <option value="{{ $establecimiento->id }}" {{ $user->establecimiento == $establecimiento->id ? 'selected' : '' }}>{{ $establecimiento->establecimiento }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="rol" class="col-sm-2 col-form-label">Rol</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Seleccionar Rol</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="rol">
                                        @foreach ( $roles as $rol )
                                            <option value="{{ $rol->id }}" {{ $user->rol == $rol->id ? 'selected' : '' }}>{{ $rol->roles }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contrase??a</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Ingresar contrase??a solo en caso de editar..." >
                                </div>
                            </div>
                        </div>
                        <!--footer-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                        </div>
                        <!--End footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
