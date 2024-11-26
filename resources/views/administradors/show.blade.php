<x-admin-layout>
<div class="container">
    <h1>Detalles del Administrador</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $administrador->id }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $administrador->nombre }} {{ $administrador->apaterno }} {{ $administrador->amaterno }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $administrador->user->email }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $administrador->user->phone }}</li>
    </ul>
    <a href="{{ route('administradores.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
</x-admin-layout>
