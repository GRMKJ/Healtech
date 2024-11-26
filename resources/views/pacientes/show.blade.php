<x-admin-layout>
<div class="container">
    <h1>Detalles del Paciente</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $paciente->pacienteID }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $paciente->nombre }} {{ $paciente->apaterno }} {{ $paciente->amaterno }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $paciente->user->email }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $paciente->user->phone }}</li>
    </ul>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
</x-admin-layout>
