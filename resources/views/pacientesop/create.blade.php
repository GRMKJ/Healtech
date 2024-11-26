<x-opera-layout>

<div class="container">
    <h1>Registrar Paciente</h1>

    <form action="{{ route('pacientesop.store') }}" method="POST">
        @csrf
        {{-- Datos del Usuario --}}
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        {{-- Datos del Paciente --}}
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="apaterno" class="form-label">Apellido Paterno</label>
            <input type="text" name="apaterno" id="apaterno" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="amaterno" class="form-label">Apellido Materno</label>
            <input type="text" name="amaterno" id="amaterno" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>
</x-opera-layout>
