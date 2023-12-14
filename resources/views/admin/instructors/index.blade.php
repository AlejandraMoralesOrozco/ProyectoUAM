@extends('adminlte::page')

@section('title', 'Lista de Instructores')

@section('content_header')
    <h1>Lista de Instructores</h1>
@stop

@section('content')
<div class="card mt-3">
    <div class="table-responsive">
        <div class="card-body">
            <table id="instructor" class="table table-striped">
                <thead>   
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Áreas de experiencia</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Cv</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instructors as $instructor)
                        <tr>
                            <td>{{ $instructor->user->id }}</td>
                            <td>{{ $instructor->user->name }}</td>
                            <td>{{ $instructor->user->lastname }}</td>
                            <td>{{ $instructor->user->mother_lastname }}</td>
                            <td>
                                @php
                                    $areaNames = $instructor->areas->pluck('name')->implode(', ');
                                @endphp
                                {{ $areaNames }}
                            </td>
                            <td>{{ $instructor->user->email }}</td>
                            <td>{{ $instructor->user->phone }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $instructor->cv) }}" target="_blank" class="btn btn-primary">Ver CV</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

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
        new DataTable('#instructor');
    </script>
@stop