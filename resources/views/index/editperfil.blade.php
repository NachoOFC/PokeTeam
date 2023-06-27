

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
                $("#form-registro").submit(function() {
                    event.preventDefault();
                        $("#password_invalida_caracteres").hide();
                        $("#password_invalida_numeros").hide();
                        $("#password_invalida_letras").hide();

                        var password = $('#password').val();
                        var password_confirmation = $('#password_confirmation').val();

                    if (password.length < 8){
                    $("#password_invalida_caracteres").show();
                    } else if(!/\d/.test(password)){
                    $("#password_invalida_numeros").show();
                     } else if(!/[a-zA-Z]/.test(password)){
                    $("#password_invalida_letras").show();
                    } else if (password != password_confirmation) {
                    alert("las contraseñas deben ser iguales")
                    } else {

                    $.post("http://infst2.test/api/register",
                        $("#form-registro").serialize())
                        .done(function(data) {
                        alert("Se ha guardado correctamente");
                    });
                    }
                });
    </script>


<header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse d-flex navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto text-center">
            <li class="nav-item">
              <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Acerca de</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacto</a>
            </li>
          </ul>
        </div>
      </nav>
</header>

<div class="row justify-content-center">
        <div class="col-lg-6 my-4">
          <h1>Editar Usuario</h1>
          <method="POST" enctype="multipart/form-data">
          @if (Auth::check() && Auth::user()->avatar)
                <img src="{{ asset('avatars/' . Auth::user()->avatar) }}" alt="Avatar" width="100">
            @else
                <img src="{{ asset('avatars/default-avatar.jpg') }}" alt="Default Avatar" width="100">
            @endif
            @csrf
            <input type="file" name="avatar">
        
        </form>
          <div class="mb-3">
            <label for="informacion" class="form-label">Cambiar Información</label>
            <textarea class="form-control" id="informacion" rows="3"></textarea>
          </div>

          <form action="{{ route('user.update') }}"method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                    <label for="current_password" class="form-label">Contraseña Actual</label>
                    <input type="password" id="current_password" name="current_password">
                </div>
                <div class="mb-3"> <label for="new_password" class="form-label">Nueva Contraseña</label>
                    <input type="password" id="new_password" name="new_password">
                </div>
                <div class="mb-3"> <label for="new_password_confirmation" class="form-label">Confirmar Nueva Contraseña</label >
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation">
                </div>    
            <button type="submit" id="bt-guardar" class="btn btn-success btn-block my-2">Guardar Cambios</button>
          </div>
        </div>
</div>


