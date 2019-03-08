@extends('/Layouts/template', ['title' => 'Connexion'])

@section('css')
<link href="{{asset('css/Auth/connexion.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('header')
    <header class="header_connexion">
      <div class="header_connexion-right">
        <h1 class="header_connexion-h1"> Qualité et Sécurité</h1>
      </div>
    </header>
@endsection

@section('content')

    <div class="header_relative"></div>

    <div class="div1">

      <div class="div1-1">
        <img class="div1-1-img1" src="http://www.tarbes-expos.com/Fichiers/agenda/122846logo_transalp.jpg" alt="Logo">
      </div>

      <div class="div1-2">
        <form method="POST" action="login" accept-charset="UTF-8">
          {!! csrf_field() !!}

            <div>
                <label for="email" class="div1-2-text">{{ __('Adresse Mail') }}</label>

                <input id="email" type="email" class="div1-2-input" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <p></p>

            <div>
                <label for="password" class="div1-2-text">{{ __('Mot de passe ') }}</label>

                <input id="password" type="password" class="div1-2-input" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="checkbox">
                <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label  class="remember" for="remember">
                      {{ __('Remember Me') }}
                  </label>
            </div>

            <div>
                <button type="submit" class="div1-2-button">
                    {{ __('Login') }}
                </button>
           </div>

        </form>
      </div>
    </div>
@endsection

@section('footer')
    <footer>

      <div class="footer">
        ©2019 Transalp-Renouvellement -
        <a href="http://transalp-renouvellement.fr/mentions-legales/">Mentions Légales</a>
      </div>

    </footer>
@endsection
