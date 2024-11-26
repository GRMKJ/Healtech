<x-admin-layout>
<div class="container">
    <h1>Detalles del Operativo</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $operativo->operativoID }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $operativo->nombre }} {{ $operativo->apaterno }} {{ $operativo->amaterno }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $operativo->user->email }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $operativo->user->phone }}</li>
    </ul>
    <a href="{{ route('operativos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
</x-admin-layout>
