<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">

    @csrf
    <div class="block mt-5" style="display: flex; justify-content: center;">
        <label for="remember_me" class="inline-flex items-center">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" >
                <span class="font-semibold  text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 50px;">{{ $code }}</span>

                </a>
            @endif

         
        </div>
  </button>
</div>

        </label>
        <br><br>
        <br><br>
    </div>


