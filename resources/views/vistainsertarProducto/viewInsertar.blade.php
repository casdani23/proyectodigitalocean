<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('productos.update', $producto->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Nombre del producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}">
                        </div>

                        <div class="form-group">
                            <label for="cantidad">Cantidad del producto</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}">
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio del producto</label>
                            <input type="number" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}">
                        </div>

                        <div class="form-group">
                            <label for="calzado">Calzado del producto</label>
                            <input type="text" class="form-control" id="calzado" name="calzado" value="{{ $producto->calzado }}">
                        </div>

                        <div class="form-group">
                            <label for="marca">Marca del producto</label>
                            <input type="text" class="form-control" id="marca" name="marca" value="{{ $producto->marca }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
