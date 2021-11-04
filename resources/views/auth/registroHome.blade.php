@extends('layouts.app', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/bg16.jpg",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-5 ml-auto">
          <div class="info-area info-horizontal mt-5">
            <div class="icon icon-primary">
              <i class="now-ui-icons media-2_sound-wave"></i>
            </div>
            <div class="description">
              <h5 class="info-title">{{ __('Quienes Somos') }}</h5>
              <p class="description">
                {{ __("Encuentra: Tuberia de gas, agua y desagüe. Calefacción por el piso, membranas acústicas e impermeables. Inodoros, lavamanos, duchas, griferia, hidromasajes, termotanques, anafes, calefón, calderas, hornos, estufas.") }}
              </p>
            </div>
          </div>
          <div class="info-area info-horizontal">
            <div class="icon icon-primary">
              <i class="now-ui-icons media-1_button-pause"></i>
            </div>
            <div class="description">
              <h5 class="info-title">{{ __('Información') }}</h5>
              <p class="description">
                {{ __("Materiales de construcción · Tienda de materiales para la construcción · Servicios de plomería") }}
              </p>
            </div>
          </div>
          <div class="info-area info-horizontal">
            <div class="icon icon-info">
              <i class="now-ui-icons users_single-02"></i>
            </div>
            <div class="description">
              <h5 class="info-title">{{ __('Direccion') }}</h5>
              <p class="description">
                {{ __('Barrio San Gerónimo Av. Alto de la Alianza #2329 +591 71861628 Tarija, Bolivia') }}
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mr-auto">
          <div class="card card-signup text-center">
            <div class="card-header ">
              <h4 class="card-title">{{ __('Registro en Sistema') }}</h4>
              <div class="social">
                <button class="btn btn-icon btn-round btn-twitter">
                  <i class="fab fa-twitter"></i>
                </button>
                <button class="btn btn-icon btn-round btn-dribbble">
                  <i class="fab fa-dribbble"></i>
                </button>
                <button class="btn btn-icon btn-round btn-facebook">
                  <i class="fab fa-facebook-f"></i>
                </button>
              </div>
            </div>
            <div class="card-body ">
                <form class="form" method="POST" action="{{ route('registrar') }}">
                    {{csrf_field()}}
                    <div class="card card-login card-hidden mb-3">
                      <div class="card-header card-header-primary text-center">
                        <div class="social-line">
                          {{--  <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                            <i class="fa fa-facebook-square"></i>
                          </a>
                          <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                            <i class="fa fa-twitter"></i>
                          </a>
                          <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                            <i class="fa fa-google-plus"></i>
                          </a>--}}
                        </div>
                        <p class="card-description text-center">{{ __('Formulario Clasico') }}</p>
                        <p class="card-description text-center">{{ __('Todos los campos son obligatorio llenarlos ') }}</p>
                      </div>
                      <div class="card-body ">
                        {{--  <p class="card-description text-center">{{ __('') }}</p>  --}}
                        <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                  {{-- <i class="material-icons">face</i> --}}
                              </span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Nombre...') }}" value="{{ old('name') }}" maxlength="20" minlength="4" required>
                          </div>
                          @if ($errors->has('name'))
                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                              <strong>{{ $errors->first('name') }}</strong>
                            </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                  {{-- <i class="material-icons">face</i> --}}
                              </span>
                            </div>
                            <input type="text" name="last_name" class="form-control" placeholder="{{ __('Apellido Paterno...') }}" value="{{ old('last_name') }}" maxlength="20" minlength="4" required>
                          </div>
                          @if ($errors->has('name'))
                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                              <strong>{{ $errors->first('name') }}</strong>
                            </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                  {{-- <i class="material-icons">face</i> --}}
                              </span>
                            </div>
                            <input type="text" name="last_ape" class="form-control" placeholder="{{ __('Apellido Materno...') }}" value="{{ old('last_ape') }}" maxlength="20" minlength="4" required>
                          </div>
                          @if ($errors->has('name'))
                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                              <strong>{{ $errors->first('name') }}</strong>
                            </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                  {{-- <i class="material-icons">face</i> --}}
                              </span>
                            </div>
                            <input type="text" name="ci" class="form-control" placeholder="{{ __('CI...') }}" value="{{ old('ci') }}" maxlength="15" minlength="7" required pattern="[A-Za-z-0-9]{7,10}"
                            title="codigo con 7 a 15 digitos">
                          </div>
                          @if ($errors->has('name'))
                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                              <strong>{{ $errors->first('name') }}</strong>
                            </div>
                          @endif
                        </div>

                        <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                {{-- <i class="material-icons">email</i> --}}
                              </span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                          </div>
                          @if ($errors->has('email'))
                            <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                              <strong>{{ $errors->first('email') }}</strong>
                            </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                {{-- <i class="material-icons">lock_outline</i> --}}
                              </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Contraseña...') }}" required>
                          </div>
                          @if ($errors->has('password'))
                            <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                              <strong>{{ $errors->first('password') }}</strong>
                            </div>
                          @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                {{-- <i class="material-icons">lock_outline</i> --}}
                              </span>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirmar contraseña...') }}" required>
                          </div>
                          @if ($errors->has('password_confirmation'))
                            <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                          @endif
                        </div>
                        <div class="form-check mr-auto ml-3 mt-3">
                          {{--  <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                            {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
                          </label>  --}}
                        </div>
                      </div>
                      <div class="card-footer justify-content-center">
                        <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Registrar Usuario') }}</button>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
