<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">nombre_producto</th>
                            <th scope="col">cantidad_producto</th>
                            <th scope="col">precio_producto</th>
                            <th scope="col">Calzado</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>{{ $producto->calzado }}</td>
                                <td>{{ $producto->marca }}</td>
                                <td >


                        <div class="btn-group" role="group" aria-label="Opciones">
                            
                        <a id="boton-modificar" href="{{ route('clientecrud.edit', $producto->id) }}" class="btn btn-info disabled"   ><i class="bi bi-pencil"></i></a>
                          <button   class="btn btn-success " ><i class="bi bi-plus"></i></button>
                          @if ($tokenValido)
    <script>
        document.querySelectorAll('.btn-info').forEach(function (element) {
            element.classList.remove('disabled');
        });
    </script>
@endif
    </div>
</td>

                            </tr>
                            @endforeach
                        </tbody>

                            <form method="POST" action="{{ route('verificar-token') }}">
                 @csrf
                 <div class="input-group input-group-sm mb-1">
                         <a href="{{ route('productos.correoToken') }}" class="btn btn-primary">Pedir Token</a>
                         <input type="text" class="form-control" id="token" name="token" placeholder="Ingrese el token" required>
                         <button type="submit" class="btn btn-secondary">Verificar token</button>
                     </div>
                         </form>


                      </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
