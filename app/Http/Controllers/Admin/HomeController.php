<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prospect;
use App\Models\User;
use App\Models\Instructor;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AcceptedProspectMail;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function Profile(){
        $user = auth()->user(); 
        return view('admin.index', compact('user'));
    }

    public function showProspects()
    {
        $prospects = Prospect::with('areas')->get();
        return view('admin.prospects.index', compact('prospects'));
    }

    public function process(Request $request, $id)      
    {
        $prospect = Prospect::find($id);

        $action = $request->input('action');
        if ($action === 'accept') {
        // Lógica para enviar correo de aceptación
            $user = new User();
            $user->name = $prospect->name;
            $user->lastname = $prospect->lastname;
            $user->mother_lastname = $prospect->mother_lastname;
            $user->email = $prospect->email;
            $user->phone = $prospect->phone;
            $password = Str::random(8); // Genera una contraseña aleatoria
            $user->password = Hash::make($password);
            $user->save();

            $this->createInstructor($prospect, $user);

            Mail::to($prospect->email)->send(new AcceptedProspectMail($user, $password));

            // Después de realizar todas las operaciones, puedes eliminar el prospecto
            $prospect->delete();

        } elseif ($action === 'reject') {
            $prospect->accepted = false;
            $prospect->save();
            Alert::error('Rechazado', 'Prospecto rechazado.')->persistent(true)->autoClose(3000);
            return redirect()->route('prospects');
        }

        Alert::success('Éxito', 'Prospecto aceptado y notificado')->persistent(true)->autoClose(3000);
        return redirect()->route('prospects');

    }

    private function createInstructor($prospect, $user) {
        $instructor = new Instructor();
        $instructor->user_id = $user->id;
        $instructor->save();
    
        // Asignar el CV si está disponible
        if ($prospect->cv) {
            $document = new Document();
            $document->name = 'CV'; 
            $document->url = $prospect->cv;
            $document->save();

            $today = now(); // Obtener la fecha actual

            // Asignar una fecha predeterminada si $document->date es null
            $date = $document->date ?: $today;
    
            $instructor->documents()->attach($document->id, [
                'url' => $document->url,
                'date' => $date
            ]);
        }
           
    
        // Asignar las áreas al instructor
        $instructor->areas()->sync($prospect->areas()->select('areas.id')->pluck('id'));
    }
}
