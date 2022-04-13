@extends('layouts.main',['activePage' => 'referentes', 'titlePage' =>'Detalles del Referente'])
@section('content')
<div class="content">
    <div class="conteiner-fuid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Insertar Rol Referente</div>
                        <p class="card-category">Vista detallada del referente {{ $user->name}}</p>
                       </div>
                       <!--Body-->
                       <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('referentes.index_referente') }}" class="btn btn-sm btn-danger">Volver</a>
                            </div>
                        </div>
                           <div class="row">
                               <div class="col-md-4">
                                   <div class="card card-user">
                                       <div class="card-body">
                                           <p class="card-text">
                                               <div class="autor">
                                                   <a href="#">
                                                       <img src="{{ asset('/img/faces/default-avatar.png')}}" alt="image" class="avatar col-sm-4">
                                                       <h5 class="title" mt-3">{{ $user->name}}</h5>
                                                   </a>
                                                   <p class="description">
                                                   {{ $user->rut}}  <br>
                                                   {{ $user->email}}  <br>
                                                   {{ $user->created_at}}  <br>
                                                   </p>
                                               </div>
                                        </p>
                                         <div class="card-description">
                                            {{ $user->descripcion }}
                                        </div>
                                       </div>
                                       <div class="card-footer">
                                           <div class="button-container">
                                           <a href="{{ route('referentes.edit_referente', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                               <!-- < button class="bnt btn-sm btn-primary">Editar</button> -->
                                           </div>
                                       </div>
                                   </div>
                               </div><!-- end card user -->
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
