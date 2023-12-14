<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Period;
use App\Models\Academic_Activity;
use App\Models\Modality;
use App\Models\Category;
use App\Models\Level;
use App\Models\Program;
use App\Models\Duration;
use App\Models\Area;
use App\Models\Audience;
use App\Models\Schedule;
use App\Models\Instructor;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    public function index(){
        $courses = auth()->user()->instructor->courses;
        return view('instructor.courses.index', compact('courses'));
    }

    public function show($id){
        $course = Course::with('instructors')->find($id);
        return view('instructor.courses.show', compact('course'));
    }

    /*public function view()
    {
        return view('instructor.courses.create');
    }*/

    public function create()
    {
        $data = [
            'periods' => Period::all(),
            'activities' => Academic_Activity::all(),
            'modalities' => Modality::all(),
            'categories' => Category::all(),
            'levels' => Level::all(),
            'programs' => Program::all(),
            'durations' => Duration::all(),
            'areas' => Area::all(),
            'audiences' => Audience::all(),
            'schedules' => Schedule::all(),
        ];
    
        return view('instructor.courses.create', $data);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'period' => 'required|exists:periods,id',
            'name' => 'required|string|max:255',
            'activity' => 'required|exists:academic_activities,id',
            'modality' => 'required|exists:modalities,id',
            'category' => 'required|exists:categories,id',
            'level' => 'required|exists:levels,id',
            'program' => 'required|exists:programs,id',
            'duration' => 'required|exists:durations,id',
            'area' => 'required|array',
            'area.*' => 'exists:areas,id',
            'audience' => 'required|exists:audiences,id',
            'academic_training' => 'required|string',
            'synthesis_cv' => 'required|string',
            'essential_requirements' => 'required|string',
            'optional_requirements' => 'required|string',
            'course_objective' => 'required|string',
            'lessons' => 'required|string',
            'start_time' => 'required|array',
            'start_time.*' => 'string',
            'day' => 'required|array',
            'day.*' => 'string',
            'date' => 'required|date_format:Y-m-d',
        ]);

        $course = new Course([
            'period_id' => $request['period'],
            'name' => $request['name'],
            'academic_activity_id' => $request['activity'],
            'modality_id' => $request['modality'],
            'category_id' => $request['category'],
            'level_id' => $request['level'],
            'program_id' => $request['program'],
            'duration_id' => $request['duration'],
            'audience_id' => $request['audience'],
            'essential_requirements' => $request['essential_requirements'],
            'optional_requirements' => $request['optional_requirements'],
            'course_objective' => $request['course_objective'],
            'lessons' => $request['lessons'],
            'date' => $request['date'],
            'user_id' => auth()->user()->id,
        ]);
        $course->save();

        $instructorId = auth()->user()->instructor->id;
        $course->instructors()->attach($instructorId);
        
        $instructor = auth()->user()->instructor ?? new Instructor();
        $instructor->user_id = auth()->user()->id; // Asigna el ID de usuario

        // Actualiza los campos de formación académica y síntesis curricular
        $instructor->academic_training = $request['academic_training'];
        $instructor->synthesis_cv = $request['synthesis_cv'];
        // Guarda los cambios en la base de datos
        $instructor->save();

        // Asocia las áreas con el curso
        $areas = $request->input('area');
        $course->areas()->sync($areas);

        // Asocia días y horas con el curso
        $startTimes = $request->input('start_time');
        $days = $request->input('day');
        $scheduleIds = [];

        foreach ($days as $day) {
            foreach ($startTimes as $hour) {
                $schedule = Schedule::where('day', $day)
                    ->where('start_time', $hour)
                    ->first();

                if ($schedule) {
                    $scheduleIds[] = $schedule->id;
                }
            }
        }

        // Asocia los horarios con el curso
        $course->schedules()->sync($scheduleIds);


        Alert::success('Éxito', 'Curso creado correctamente');

        return redirect()->route('instructor.courses.index');
    }
}
