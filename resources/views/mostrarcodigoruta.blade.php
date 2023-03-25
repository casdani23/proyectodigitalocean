<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">

    @csrf
    <div class="block mt-5" style="display: flex; justify-content: center;">
        <label for="remember_me" class="inline-flex items-center">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="font-semibold  text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 50px;">{{ $code }}</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

        </label>
        <br><br>
        <br><br>
    </div>


