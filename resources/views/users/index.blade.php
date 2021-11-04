@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user bg-blue"></i>
                        <div class="d-inline">
                            <h5>Pagina Inicio del {{$i=session()->get('rol')->first()}}</h5>
                            <span>Informacion de las actividades de los usuarios registrados en sistema</span>
                            <br>
                            <br>
                            <h6>Bienvenido al Sistema {{$id=session()->get('nombre')->first()}} </h6>
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
                            <li class="breadcrumb-item active" aria-current="page">{{$i=session()->get('rol')->first()}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5 class="mb-4">CONSTRUMEGA</h5>
                <p>Bien venido al sistema, ayudanos a crecer juntos podremos cambiar y llegar a nuestro objetivo</p>
                <div class="row mb-4">

                </div>

                <h5 class="mb-4">Nosotros Podemos Crecer Con Tu Ayuda</h5>
                <p> El Sistema esta a su disposicion, sea cuidadoso con las actividades con nuestro sistema</p>


            </div>
        </div>
  </div>

 @endsection
