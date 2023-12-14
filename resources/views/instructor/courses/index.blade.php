@extends('adminlte::page')

@section('title', 'Lista de Cursos')

@section('content_header')
    <h1>Hola, {{ auth()->user()->name }}.</h1>
@stop

@section('content')
    <p>Mi lista de Cursos</p>

     <!-- Botón para abrir el modal -->
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fichaTecnicaModal">
        Registrar Nuevo Curso
    </button>

    <!-- Modal para la ficha técnica -->
    <div class="modal fade" id="fichaTecnicaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                @include('instructor.courses.create')<!-- El contenido del modal se agregará en la segunda vista -->
            </div>
        </div>
    </div>
    
    <div class="card mt-3">
        <div class="card-body">
            <table id="course" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del curso</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td> Fecha de inicio: {{ $course->start_date }} <br>
                                Fecha fin: {{ $course->ending_date }}</td> 
                            <td>{{ $course->status }}</td> 
                            <td><a href="{{ route('instructor.courses.show', ['id' => $course->id]) }}">Ver ficha</a></td> 
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
@stop

@section('css')
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <!-- jQuery -->
    <script src=" https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#course');
    </script>
@stop