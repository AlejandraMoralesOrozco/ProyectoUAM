<div class="container mx-auto">
    <form action="{{ route('prospect.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                Nombre(s):
            </label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" required>
        </div>
        <div class="mb-4">
            <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">
                Apellido Paterno:
            </label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="lastname" name="lastname" required>
        </div>
        <div class="mb-3">
            <label for="mother_lastname" class="block text-gray-700 text-sm font-bold mb-2">
                Apellido Materno:
            </label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mother_lastname" name="mother_lastname">
        </div>
        <div class="mb-3">
            <label class="form-label">Áreas de experiencia:</label>
            @php
                $areas = \App\Models\Area::all();
            @endphp
            @if($areas->isNotEmpty())
                @foreach ($areas as $area)
                    <div class="flex items-center mb-2">
                        <input class="mr-2 leading-tight" type="checkbox" id="area_{{ $area->id }}" name="areas[]" value="{{ $area->id }} ">
                        <label class="text-sm" for="area_{{ $area->id }}">
                            {{ $area->name }}
                        </label>
                    </div>
                @endforeach
            @else
                <p class="text-sm text-gray-600">No hay áreas disponibles.</p>
            @endif
        </div>
        <div class="mb-3">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                Correo electrónico:</label>
            <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">
                Teléfono:</label>
            <input type="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="cv" class="block text-gray-700 text-sm font-bold mb-2"">
                CV (PDF)</label>
            <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cv" name="cv" accept=".pdf" required>
        </div>
        <button type="submit" class="btn btn-primary">
            Enviar postulación
        </button>
    </form>
</div>

@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Swal.fire({
            title: '¡Postulación exitosa!',
            text: '{{ session("success") }}',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif