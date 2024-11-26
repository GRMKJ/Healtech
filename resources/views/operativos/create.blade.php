<x-admin-layout>
<div class="flex flex-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-1 items-center gap-4 max-w-6xl w-full">
            <div class="container dark:text-white"></div>
                <div class="container">
                    <h1 class=" dark:text-white">Crear Operativo</h1>
                    <form action="{{ route('operativos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class=" dark:text-white">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class=" dark:text-white">Apellido Paterno</label>
                            <input type="text" name="apaterno" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class=" dark:text-white">Apellido Materno</label>
                            <input type="text" name="amaterno" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class=" dark:text-white">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class=" dark:text-white">Teléfono</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class=" dark:text-white">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class=" dark:text-white">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary  dark:text-white">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
</x-admin-layout>
