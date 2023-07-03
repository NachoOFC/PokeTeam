@extends('Layouts.app')

@section('scripts')
    <script>
        $(document).ready(function() {


            $("#form-login").submit(function() {
                event.preventDefault();

                const formData = $(this).serialize();

                $.ajax({
                    url: 'http://infst2.test/api/login',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // La autenticación fue exitosa
                        alert('Inicio de sesión correcto');
                        // Redirigir a la página deseada
                    },
                    error: function(response) {
                        // Error en la autenticación
                        alert(
                            'Las credenciales proporcionadas no coinciden con nuestros registros.');
                    }
                });



            });

        });
    </script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 my-4">
            <h1>Formulario login</h1>
            <form id="form-login">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Ingrese su contraseña">
                </div>
                <button type="submit" id="bt-guardar" class="btn btn-success btn-block my-2">Iniciar sesion</button>
            </form>
        </div>
    </div>
@endsection