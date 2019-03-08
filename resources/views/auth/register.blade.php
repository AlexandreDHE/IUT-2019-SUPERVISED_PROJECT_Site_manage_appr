@extends('/layouts/template', ['title' => 'Connexion'])

@section('css')
<link href="{{asset('css/formulaire.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('header')
    <header>
      <div class="header-right">
        <h1> Qualité et Sécurité</h1>
      </div>
    </header>
@endsection

@section('content')
    <div class="div1">

      <div class="div1-3">
        <h2><b>Etape 1 : Compte Super Utilisateur</b></h2>
      </div>

      <p></p>
      <div class="div1-2">

        <form method="POST" action="register" accept-charset="UTF-8">

          @csrf

          <!-- NOM !-->
          <div>
              <label for="nom" class="div1-2-text">{{ __('Nom') }}</label>
              <input id="nom" type="text" class="div1-2-input" name="nom" value="{{ old('nom') }}" required >

              @if ($errors->has('nom'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nom') }}</strong>
                  </span>
              @endif
          </div>

          <br>
          <!-- PRENOM !-->
          <div>
              <label for="prénom" class="div1-2-text">{{ __('Prénom') }}</label>
              <input id="prénom" type="text" class="div1-2-input" name="prénom" value="{{ old('prénom') }}" required >

              @if ($errors->has('prénom'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('prénom') }}</strong>
                  </span>
              @endif
          </div>

          <br>
          <!-- FONCTIONS !-->
          <div >
              <label for="fonction" class="div1-2-text">{{ __('Fonction') }}</label>
              @include('layouts/partials/Autres/_form_fonctions')

              @if ($errors->has('fonction'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('fonction') }}</strong>
                  </span>
              @endif
          </div>

          <br>
          <!-- EMAIL !-->
          <div>
              <label for="email" class="div1-2-text">{{ __('E-Mail') }}</label>
              <input id="email" type="email" class="div1-2-input" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>

          <br>
          <!-- TELEPHONE !-->
          <div>
              <label for="num_tel" class="div1-2-text">{{ __('Tel') }}</label>
              <input id="num_tel" type="text" class="div1-2-input" name="num_tel" value="{{ old('num_tel') }}" required>
              @if ($errors->has('num_tel'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('num_tel') }}</strong>
                  </span>
              @endif
          </div>

          <br>
          <!-- PASSWORD !-->
          <div>
              <label for="password" class="div1-2-text">{{ __('Mot de passe') }}</label>
              <input id="password" type="password" class="div1-2-input" name="password" required>

              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>

          <br>
          <!-- Confirmer PASSWORD !-->
          <div>
              <label for="password-confirm" class="div1-2-text">{{ __('Confirmer mot de passe') }}</label>
              <input id="password-confirm" type="password" class="div1-2-input" name="password_confirmation" required>
          </div>

          <br>
          <!-- SUBMIT-->
          <div>
              <button type="submit" class="div1-2-button">
                {{ __('Créer') }}
              </button>
          </div>
      </form>

@endsection
