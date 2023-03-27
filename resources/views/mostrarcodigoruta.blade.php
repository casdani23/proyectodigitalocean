<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">

    @csrf
    <x-guest-layout>
    
        <div class="block mt-5" style="display: flex; justify-content: center; background:red; margin-top:20px;">
             <label for="remember_me" class="inline-flex items-center">
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <div style="background-color: red; width: 400px; height: 200px;">
             <span class="font-semibold  text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 50px; color:black;">Tu codigo para el cel es:</span>
            <span class="font-semibold  text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 50px; color:black;">{{ $code }}</span>
        </div>
        </div>

        </label>
        <br><br>
        <br><br>
    </div>
    </x-guest-layout>


