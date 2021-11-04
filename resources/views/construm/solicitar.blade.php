@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Administradores')])
@section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Lista de Solicitud de visita a la empresa en Sistema</h5>
                            <span>Informacion registrada de las empresas</span>
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
                                @if(session()->get('user_rol')->first()==1)
                                <a href="{{route('inicio',$id=session()->get('nombre')->first())}}"><i class="ik ik-home"></i></a>
                                @else
                                @if(session()->get('user_rol')->first()!=1)
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                @endif
                                @endif
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Apps</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Lista De Empresas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card table-card">

                <div class="card">
                    <div class="card-header">
                        <h3>Lista Empresas que pediran visita</h3>
                    </div>

                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="lang-dt"
                                   class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        {{ __('#') }}
                                    </th>
                                    <th class="text-center">
                                          {{ __('Foto') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Nombre') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('NIT') }}
                                    </th>
                                    <th class="text-center">
                                        {{ __('Direccion') }}
                                      </th>
                                    <th class="text-center">
                                      {{ __('Telefono') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Ciudad') }}
                                    </th>
                                    <th class="text-center">
                                        {{ __('C.I.') }}
                                      </th>
                                      <th class="text-center">
                                        {{ __('Nombre Cli.') }}
                                      </th>
                                    <th class="text-right">
                                      {{ __('Actions') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($selec as $sel)
                                    <tr>
                                     <td class="text-center">
                                   {{ $loop->iteration }}
                                 </td>
                                 <td>
                                     @if(!empty($sel->imagen))
                                     <img src="{{Storage::url($sel->imagen)}}" class="rounded-circle img-80 align-top mr-15" width="80"/>
                                     @else
                                     <img src="{{Storage::url('image.gif')}}" class="rounded-circle img-80 align-top mr-15" width="80"/>

                                     @endif
                                   </td>
                                 <td class="text-center">
                                   {{ $sel->nomb_emp}}
                                 </td>
                                 <td class="text-center">
                                   {{ $sel->nit }}
                                 </td>
                                 <td class="text-center">
                                   {{ $sel->direccion }}
                                 </td>
                                 <td class="text-center">
                                   {{ $sel->telefon }}
                                 </td>
                                 <td class="text-center">
                                   {{ $sel->ciudad }}
                                 </td>
                                 <td class="text-center">
                                    {{ $sel->ci }}
                                  </td>
                                  <td class="text-center">
                                    {{ $sel->nombre }}
                                  </td>
                                 <td class="td-actions text-right">
                                       @if ($counts==0)
                                             @csrf
                                             @method('delete')

                                             <a href="{{route('registvisit',$sel->id_emp)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                            </form>

                                       @endif
                                     </td>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center">
                                        {{ __('#') }}
                                    </th>
                                    <th class="text-center">
                                          {{ __('Foto') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Nombre') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('NIT') }}
                                    </th>
                                    <th class="text-center">
                                        {{ __('Direccion') }}
                                      </th>
                                    <th class="text-center">
                                      {{ __('Telefono') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Ciudad') }}
                                    </th>
                                    <th class="text-center">
                                        {{ __('C.I.') }}
                                      </th>
                                      <th class="text-center">
                                        {{ __('Nombre Cli.') }}
                                      </th>
                                    <th class="text-right">
                                      {{ __('Actions') }}
                                    </th>
                             </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
 @endsection
