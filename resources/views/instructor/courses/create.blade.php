
    <form action="{{ route('instructor.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @php
            $periods = \App\Models\Period::all();
            $activities = \App\Models\Academic_Activity::all();
            $modalities = \App\Models\Modality::all();
            $categories = \App\Models\Category::all();
            $levels = \App\Models\Level::all();
            $programs = \App\Models\Program::all();
            $durations = \App\Models\Duration::all();
            $areas = \App\Models\Area::all();
            $audiences = \App\Models\Audience::all();
            $schedules = \App\Models\Schedule::all();     
        @endphp

        <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">FICHA TECNICA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- DATOS DE IDENTIFICACIÓN POR CURSO O TALLER -->
                
                <div class="col mb-4" style="font-size: 12px">
                    <label for="period" class="form-label">Período</label>
                    <select class="form-control" id="period" name="period" style="width: 200px; height: 40px;" required>
                        <option value=""></option>
                        @foreach ($periods as $period)
                            <option value="{{ $period->id }}">{{ $period->name }}</option>
                        @endforeach
                    </select>
                </div>
                <h5 class="text-center mb-4"  style="background-color: orange">DATOS DE IDENTIFICACIÓN POR CURSO O TALLER</h5>
                <div class="form-row">
                    <div class="col" style="font-size: 12px">
                        <label for="name" class="form-label">Nombre del curso o taller</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mt-3" style="font-size: 12px">
                        <label for="activity" class="form-label">Tipo de actividad académica</label>
                        <select class="form-control" id="activity" name="activity" required>
                            <option value=""></option>
                            @foreach ($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mt-3" style="font-size: 12px">
                        <label for="modality" class="form-label">Modalidad</label>
                        <select class="form-control" id="modality" name="modality" required>
                            <option value=""></option>
                            @foreach ($modalities as $modality)
                                <option value="{{ $modality->id }}">{{ $modality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mt-3" style="font-size: 12px">
                        <label for="category" class="form-label">Categoria</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col mt-3" style="font-size: 12px">
                        <label for="level" class="form-label">Nivel</label>
                        <select class="form-control" id="level" name="level" required>
                            <option value=""></option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mt-3" style="font-size: 12px">
                        <label for="program" class="form-label"> Programa  </label>
                        <select class="form-control" id="program" name="program" required>
                            <option value=""></option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mt-3" style="font-size: 12px">
                        <label for="duration" class="form-label">Duración (en horas)</label>
                        <select class="form-control" id="duration" name="duration" required>
                            <option value=""></option>
                            @foreach ($durations as $duration)
                                <option value="{{ $duration->id }}">{{ $duration->hours }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mt-3" style="font-size: 12px">
                        <label for="area" class="form-label">Área de conocimiento</label>
                        @foreach ($areas as $area)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="area[]" value="{{ $area->id }}" id="area_{{ $area->id }}">
                            <label class="form-check-label" for="area_{{ $area->id }}">
                                {{ $area->name }}
                            </label>
                        </div>
                    @endforeach
                    </div>
                    <div class="col mt-3" style="font-size: 12px">
                        <label for="audience" class="form-label">Dirigido a</label>
                        <select class="form-control"  id="audience" name="audience" required>
                            <option value=""></option>
                            @foreach ($audiences as $audience)
                                <option value="{{ $audience->id }}">{{ $audience->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="col mt-3" style="font-size: 12px">
                        <label class="form-label">Horario</label>
                        <div style="display: flex; justify-content: space-between;">
                            @foreach ($schedules as $schedule)
                                <div>
                                    <label><input type="checkbox" name="day[]" value="{{ $schedule->day }}">{{ $schedule->day }}</label>
                                    <label><input type="checkbox" class="hour-checkbox" name="start_time[]" value="{{ $schedule->start_time }}"> {{ $schedule->start_time }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <h5 class="text-center mt-4" style="background-color: orange">INSTRUCTOR</h5>
            <div class="mb-3" style="font-size: 12px">
                <label for="instructor" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="instructor" value="{{ auth()->user()->name }}" readonly>
            </div>

            <div class="mb-3" style="font-size: 12px">
                <label for="academic_training" class="form-label">Formación academica</label>
                <input type="text" class="form-control" id="academic_training" name="academic_training" value="{{ auth()->user()->instructor ? auth()->user()->instructor->academic_training : '' }}" required>
            </div>

            <div class="mb-3" style="font-size: 12px">
                <label for="synthesis_cv" class="form-label">Síntesis curricular</label>
                <input type="text" class="form-control" id="synthesis_cv" name="synthesis_cv" rows="3" value ="{{ auth()->user()->instructor ? auth()->user()->instructor->synthesis_cv : '' }}" required>
            </div>

            <!-- PRERREQUISITOS DEL CURSO O TALLER -->
            <h5 class="text-center mt-4 mb-3" style="background-color: orange">PRERREQUISITOS</h5>
            <div class="mb-3" style="font-size: 12px">
                <label for="essential_requirements" class="form-label">Conocimientos escenciales</label>
                <textarea class="form-control" id="essential_requirements" name="essential_requirements" rows="3" required></textarea>
            </div>

            <div class="mb-3" style="font-size: 12px">
                <label for="optional_requirements" class="form-label">Conocimientos recomendables</label>
                <textarea class="form-control" id="optional_requirements" name="optional_requirements" rows="3" required></textarea>
            </div>

            <!-- CONTENIDO DEL CURSO O TALLER -->
            <h5 class="text-center mt-4 mb-3" style="background-color: orange">CONTENIDO DEL CURSO O TALLER</h5>

            <div class="mb-3" style="font-size: 12px">
                <label for="course_objective" class="form-label">Objetivo</label>
                <textarea class="form-control" id="course_objective" name="course_objective" rows="3" required></textarea>
            </div>

            <div class="mb-3" style="font-size: 12px">
                <label for="lessons" class="form-label">Temario</label>
                <textarea class="form-control" id="lessons" name="lessons" rows="3" required></textarea>
            </div>

            <!-- FECHA DE INSCRIPCIÓN E INFORMES -->
            <h5 class="text-center mt-4 mb-3" style="background-color: orange">FECHA DE INSCRIPCIÓN E INFORMES</h5>

            <div class="mb-3" style="font-size: 12px">
                <label for="date" class="form-label">Fecha de inscripción</label>
                <input type="text" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3 mt-4" style="font-size: 12px">
                <label>INFORMES CON:</label>
                <p>Enviar un correo a: fdocente@correo.cua.uam.mx Tel. 5558146500 ext.6529</p>
            </div>

            <!-- NOTA -->
            <h5 class="text-center mt-4">NOTA</h5>

            <div class="mb-3">
                <p style="font-size: 10px;">Los docentes externos a la UAM Cuajimalpa tendrán que cubrir la cuota de recuperación a través del proyecto de Educación Continua. Por otra parte, la universidad se reserva el derecho de cancelar o aplazar el inicio del curso, en el supuesto de que no se cuente con el mínimo de participantes inscritos.</p>
            </div>

            <div class="mb-3 text-right">
                <button type="submit" class="btn btn-primary">Enviar </button>
            </div>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const date = document.getElementById("date");
        const select = document.getElementById("select");
            
        const datePicker = flatpickr(date, {
            dateFormat: "Y-m-d", 
            minDate: "2020-01-01", 
            onClose: function (selectedDates, dateStr) {
                    
            },
        });

        select.addEventListener("click", function () {
            datePicker.open();
        });
    });
</script>

@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Swal.fire({
            title: '¡Exito! Curso creado correctamente',
            text: '{{ session("success") }}',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif
