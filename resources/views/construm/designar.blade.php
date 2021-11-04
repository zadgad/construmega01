@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Añadir Ciudad ')])

@section('content')
<div class="main-content">
   <div class="container-fluid">
       <div class="page-header">
           <div class="row align-items-end">
               <div class="col-lg-8">
                   <div class="page-header-title">
                       <i class="ik ik-calendar bg-blue"></i>
                       <div class="d-inline">
                           <h5>Designar Empleado para Visitar Empresa</h5>
                           <span>El sistema designa al empleado para visitar</span>
                           <br>
                           <br>
                           <h6> </h6>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4">
                   <nav class="breadcrumb-container" aria-label="breadcrumb">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item">
                               <a href="../index.html"><i class="ik ik-home"></i></a>
                           </li>
                           <li class="breadcrumb-item">
                               <a href="#">Apps</a>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Designar Visitador</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
       <div  class="row">
           <div class="col-md-8">
               <div class="card">
               <div class="card-header"><h3>Formulario Para designar Empleado para visitar Empresa</h3></div>
               <div class="col-md-8 text-right">
                   </div>

               <div class="card-block">

                       <div class="form">
                           <form method="post" action="{{route('insertdesig')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                           enctype="multipart/form-data"
                           >
                             @csrf
                             @method('post')
                             <div class="form-group row">
                                 <div class="col-md-12 text-right">
                                 </div>
                               </div>
                               <div id="unidad" class="form-group row" >
                                <label class="col-sm-3 col-form-label">{{ __('Nombre de Empresa') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="subp" id="input-name" type="text" placeholder="{{ __('Nombre de Empresa') }}" value="{{ old('subp') }}" required="true" aria-required="true" list="unid"/>
                                      <datalist id="unid" >
                                          @foreach($selec as $sel)
                                          <option value="{{$sel->nit}}" > {{$sel->nomb_emp}} </option>
                                          @endforeach
                                    </datalist>
                                    </div>
                                  </div>
                              </div>
                               <div id="unidad" class="form-group row" >
                                <label class="col-sm-3 col-form-label">{{ __('Nombre de Empleado') }}</label>
                                <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="codigo" id="input-name" type="text" placeholder="{{ __('Nombres de Empleados') }}" value="{{ old('codigo') }}" required="true" aria-required="true" list="select"/>
                                      <datalist id="select" >
                                          @foreach($empl as $emp)
                                          <option value="{{$emp->ci_per}}" > {{$emp->nombre}} </option>
                                          @endforeach
                                    </datalist>
                                    </div>
                                  </div>
                              </div>

                             <div class="form-group">
                               <div class="col-lg-offset-2 col-lg-10">
                                 <button class="btn btn-theme" type="submit">Registrar </button>
                               </div>
                             </div>
                           </form>
                         </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
 </div>
 @endsection
  <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}/js/select/ciud.js"></script>

 {{-- @section('scripts')
 <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}./js/select/avenidas.js"></script>

@endsection --}}
