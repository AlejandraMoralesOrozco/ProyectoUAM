@extends('adminlte::page')

@section('title', 'Lista de Prospectos')

@section('content_header')
    <h1>Lista de Prospectos</h1>
@stop

@section('content')
<div class="card mt-3">
    <div class="table-responsive">
        <div class="card-body">
            <table id="prospect" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>A. Paterno</th>
                        <th>A. Materno</th>
                        <th>Áreas de experiencia</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Cv</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prospects as $prospect)
                        <tr>
                            <td>{{ $prospect->id }}</td>
                            <td>{{ $prospect->name }}</td>
                            <td>{{ $prospect->lastname }}</td>
                            <td>{{ $prospect->mother_lastname }}</td>
                            <td>
                                @php
                                    $areaNames = $prospect->areas->pluck('name')->implode(', ');
                                @endphp
                                {{ $areaNames }}
                            </td>
                            <td>{{ $prospect->email }}</td>
                            <td>{{ $prospect->phone }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $prospect->cv) }}" target="_blank" class="btn btn-primary">Ver CV</a>
                            </td>
                            <td>
                                <form id="action-form-{{ $prospect->id }}" action="{{ route('prospect.process', ['id' => $prospect->id]) }}" method="post">
                                    @csrf
                                    <select name="action" class="form-control" onchange="submitForm({{ $prospect->id }})">
                                        <option value="" selected disabled>Seleccionar acción</option>
                                        <option value="accept">Aceptado</option>
                                        <option value="reject">No Aceptado</option>
                                    </select> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif

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
        new DataTable('#prospect');
    </script>
    <script>
    function submitForm(prospectId) {
    const formElement = document.getElementById(`action-form-${prospectId}`);
    formElement.submit();
    }
    </script>
@stop
