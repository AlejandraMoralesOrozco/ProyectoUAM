@extends('adminlte::page')

@section('title', 'Bienvenida')

@section('content_header')
    <h1 class="text-center">¡Bienvenido al Programa InnovarC!</h1>
@stop

@section('content')

<div class="text-center">
    <p style="font-size: 18px; color: #333; margin-top: 20px;">
        Hola, <strong>{{ Auth::user()->name }}</strong>. ¡Te damos la bienvenida al programa de cursos <em>Innovarc</em> de la UAM Cuajimalpa!
    </p>
    <p style="font-size: 16px; color: #666; margin-top: 10px;">
        Esperamos que disfrutes y aprendas mucho durante tu participación en nuestros cursos. ¡Bienvenido!
    </p>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
