<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">

    @csrf
    <x-guest-layout>
    
        <div class="block mt-8" style="display: flex; justify-content: center; margin-top:20px;">
             <label for="remember_me" class="inline-flex items-center">
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <div style="width: 400px; height: 200px;">
             <span class="font-semibold  text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 30px; color:black;">Tu token para modificar cliente es:</span><br> <br>
            <span class="font-semibold  text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 20px; color:black;">{{ $codigoTokenModificarCliente }}</span>
        </div>
        </div>

        </label>
       
    </div>
    </x-guest-layout>


