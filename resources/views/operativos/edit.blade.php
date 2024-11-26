<x-admin-layout>
<div class="container">
    <h1>Editar Operativo</h1>
    <form action="{{ route('operativos.update', $operativo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $operativo->nombre }}" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apaterno" class="form-control" value="{{ $operativo->apaterno }}" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="amaterno" class="form-control" value="{{ $operativo->amaterno }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $operativo->user->email }}" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ $operativo->user->phone }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
</x-admin-layout>
