@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Informacion De Usuario ')])
@section('content')
<div class="main-content">
   <div class="container-fluid">
       <div class="page-header">
           <div class="row align-items-end">
               <div class="col-lg-8">
                   <div class="page-header-title">
                       <i class="ik ik-tablet bg-blue"></i>
                       <div class="d-inline">
                           <h5>Informacion de la Empresa Alcual esta registrado El Cliente</h5>
                           <span>La informacion debe ser tratada con cuidado por seguridad del sistema</span>
                           <br>
                           <br>
                           <h6></h6>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4">
                   <nav class="breadcrumb-container" aria-label="breadcrumb">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item">
                               @if(session()->get('user_rol')->first()==1)
                               <a href="{{route('inicio',$id=session()->get('nombre')->first())}}"><i class="ik ik-home"></i></a>
                               @else
                               @if(session()->get('user_rol')->first()!=1)
                               <a href="../index.html"><i class="ik ik-home"></i></a>
                               @endif
                               @endif
                           </li>
                           <li class="breadcrumb-item">
                               <a href="#">Funcion</a>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Empresa</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
          <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    @if(!empty($datos->imagen))
                                    <img src="{{Storage::url($datos->imagen)}}" class="rounded-circle img-150 align-top mr-15" width="150"/>
                                    @else
                                    <img src="{{Storage::url('contru.jpg')}}" class="rounded-circle img-150 align-top mr-15" width="150"/>

                                    @endif
                                    <h4 class="card-title mt-10">{{$datos->nomb_emp}} </h4>
                                    <p class="card-subtitle">{{$datos->nit}}</p>

                                </div>
                            </div>
                            <hr class="mb-0">
                            <div class="card-body">
                                <small class="text-muted d-block pt-10">Tel o Celular</small>
                                <h6>{{$datos->telefon}}</h6>
                                <small class="text-muted d-block pt-10">Ciudad.</small>
                                <h6>{{$datos->ciudad}}</h6>
                                <br/>
                                <h6>{{$datos->direccion}}</h6>
                                <br/>
                            </div class="map-box">
                            <a href="{{ $datos->cordenada }}" class="btn btn-sm btn-primary">{{ __('Ubicacion') }}</a>
                            <div >

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Editar Informacion</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('edit_emp',$id=$datos->id_emp) }}" autocomplete="off" class="form-horizontal"  enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Cambiar Imagen') }}</label>
                                                   <div class="col-sm-7">
                                                      <div class="form-group">
                                                          <input type="file" name="Foto" id="Foto" class="default" value=""/>

                                                      </div>
                                                   </div>
                                                </div>

                                            <div class="row">
                                                    <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                                       <div class="col-sm-7">
                                                         <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                           <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name', $datos->nomb_emp) }}" required="true" aria-required="true"/>
                                                           @if ($errors->has('name'))
                                                             <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                           @endif
                                                         </div>
                                                       </div>
                                                    </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('NIT') }}</label>
                                    <div class="col-sm-7">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="lastN" id="input-name" type="text" placeholder="{{ __('N° NIT') }}" value="{{ old('lastN', $datos->nit) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Telefono') }}</label>
                                        <div class="col-sm-7">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="lastM" id="input-name" type="text" placeholder="{{ __('Telefono') }}" value="{{ old('lastM', $datos->telefon) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Direccion') }}</label>
                                        <div class="col-sm-7">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="login" id="input-name" type="text" placeholder="{{ __('Direccion') }}" value="{{ old('login', $datos->direccion) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">{{ __('Ciudad') }}</label>
                                    <div class="col-sm-9">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
    {{--                                             <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="clasi" id="input-name" type="text" placeholder="{{ __('Clasificacion') }}" value="{{ old('clasi') }}" required="true" aria-required="true" list="list_vial"/>
    --}}                                          <select id="provi" class="form-control" name="provin"  >
                                          <option value="{{ $datos->ciudad }}">Seleccionar Provincia</option>
                                          <option value="Cercado">Cercado</option>
                                          <option value="Quillacollo">Quillacollo</option>
                                          <option value="Chapare">Chapare</option>
                                          <option value="Tapacari">Tapacari</option>
                                          <option value="Bolivar">Bolivar</option>
                                          <option value="Arque">Arque</option>
                                          <option value="Capinota">Capinota</option>
                                          <option value="Misque">Misque</option>
                                          <option value="Capero">Campero</option>
                                          <option value="Ayopaya">Ayopaya</option>
                                          <option value="Carrasco">Carrasco</option>
                                          <option value="Punata">Punata</option>
                                          <option value="Arani">Arani</option>
                                          <option value="Esteban Arze">Esteban Arze</option>
                                          <option value="Jerman Jordan">Jerman Jordan</option>
                                          <option value="Tiraque">Tiraque</option>
                                      </select>
                                        @if ($errors->has('name'))
                                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Cordenadas') }}</label>
                                    <div class="col-sm-7">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cordenada" id="input-name" type="text" placeholder="{{ __('Cordenada de la Empresa') }}" value="{{ old('lastM', $datos->cordenada) }}" required="true" aria-required="true"/>
                                        @if ($errors->has('name'))
                                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                      </div>
                                    </div>
                            </div>
                                <div class="card-footer ml-auto mr-auto">
                                  <button type="submit" class="btn btn-primary">{{ __('Editar') }}</button>
                               </div>
                              </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>
</div>
@endsection

