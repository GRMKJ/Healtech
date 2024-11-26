<x-admin-layout>

<div class="container">
    <h1>Crear Operativo</h1>
    <form action="{{ route('operativos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apaterno" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="amaterno" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
</x-admin-layout>
