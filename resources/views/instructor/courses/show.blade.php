@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1 class="card-title mb-0" style="font-size: 2.5rem;">{{ $course->name }}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header">Detalles Generales</div>
                            <div class="card-body">
                                <p><strong>Objetivo:</strong> {{ $course->course_objective }}</p>
                                <p><strong>Período:</strong> {{ $course->period->name }}</p>
                                <p><strong>Modalidad:</strong> {{ $course->modality->name }}</p>
                                <p><strong>Programa:</strong> {{ $course->program->name }}</p>
                                <p><strong>Duración:</strong> {{ $course->duration->hours }} horas</p>
                                <p><strong>Área de Conocimiento:</strong>
                                    @foreach ($course->areas as $area)
                                        {{ $area->name }}@if (!$loop->last), @endif
                                    @endforeach
                                </p>
                                <p><strong>Dirigido a:</strong> {{ $course->audience->name }}</p>
                                <p><strong>Horario:</strong><br>
                                    @foreach ($course->schedules as $schedule)
                                        {{ $schedule->day }} - {{ $schedule->start_time }}<br>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Contenidos</div>
                            <div class="card-body">
                                <p><strong>Conocimientos Esenciales:</strong><br>{{ $course->essential_requirements }}</p>
                                <p><strong>Conocimientos Opcionales:</strong><br>{{ $course->optional_requirements }}</p>
                                <p><strong>Temario:</strong><br>{{ $course->lessons }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('instructor.courses.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
@endsection
