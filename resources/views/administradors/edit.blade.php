<x-admin-layout>
<div class="container">
    <h1>Editar Administrador</h1>
    <form action="{{ route('administradores.update', $administrador->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $administrador->nombre }}" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apaterno" class="form-control" value="{{ $administrador->apaterno }}" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="amaterno" class="form-control" value="{{ $administrador->amaterno }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $administrador->user->email }}" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ $administrador->user->phone }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
</x-admin-layout>
