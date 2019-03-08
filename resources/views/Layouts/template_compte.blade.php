@extends('/Layouts/template')

@section('css_template')
  <link href="{{asset('css/template_comptes.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('header')
      @include('Layouts/Partials/Templates/header_compte')
@endsection
