@extends('/Layouts/template_compte')

@section('css_unique')
<link href="{{asset('css/Comptes/Directions_Conducteurs_Home/Paramètres/panelconfig.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div class="div1-2-modif">

  <div class="panel-head">
    <h3 class="titre" >Modification d'un utilisateur</h3>
  </div>

  <div class="grid">

    <div class="gauche">

      <div class="panel panel-primary">
        <div class="panel-body_modif">

            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
            <p class="div1-2-text">Nom:</p>
            <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!} div1-2-input">
              {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => '{{$user->nom}}']) !!}
              {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
            </div>
            <p class="div1-2-text">Prénom:</p>
            <div class="div1-2-input">
              {!! Form::text('prénom', null, ['class' => 'form-control', 'placeholder' => '{{$user->prénom}}']) !!}
            </div>

            <p class="div1-2-text">Email:</p>
            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!} div1-2-input">
              {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => '{{$user->email}}']) !!}
              {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
            </div>

            <p class="div1-2-text">Tel:</p>
            <div class="form-group {!! $errors->has('num_tel') ? 'has-error' : '' !!} div1-2-input">
              {!! Form::text('num_tel', null, ['class' => 'form-control', 'placeholder' => '{{$user->num_tel}}']) !!}
              {!! $errors->first('num_tel', '<small class="help-block">:message</small>') !!}
            </div>

          </div>
        </div>

      </div>

      <div class="droite">

          {!! Form::submit('Envoyer', ['class' => 'btn btn-primary-modif pull-right']) !!}
          {!! Form::close() !!}

            <a href="javascript:history.back()" class="btn btn-primary-modif-2">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour</a>


      </div>

    </div>

</div>
@endsection
