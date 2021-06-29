<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href= "{{ asset('css/style-register-login.css') }}" />
    <link href="{{ asset('css/tailwind.output.css') }}" rel="stylesheet">
    <title>Inicio de sesion</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          @include('partials.form-errors')
          <form method="POST" action="{{ route('login') }}" class="sign-in-form">
            @csrf
            <h2 class="title">Inicia sesion</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" id="email" name="email" :value="old('email')"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" name="password" id="password"/>
            </div>
            <button class="btn solid focus:outline-none">
              {{ __('Log in') }}
            </button>
            <p class="social-text">O inicia sesion por medio de estas redes sociales</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <div style="margin:0.5rem;">
                <a style="color:#7E3AF2;" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
                </a>
            </div>
          </form>

        

          <form method="POST" action="{{ route('register') }}" class="sign-up-form">
            @csrf
            <!-- @include('partials.form-errors') -->

            <h2 class="title">Registrate</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Usuario" name="name" id="name" :value="old('name')"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" id="email" name="email" :value="old('email')"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" name="password" id="password"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirmar Contraseña" name="password_confirmation" id="password_confirmation"/>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" required id="flexCheckDefault">
                <span style="margin: left 0.5rem;">
                    Acepto los 
                    <span style="text-decoration:underline;color:blue;">Terminos y condiciones</span>
                </span>
            </div>

            <!-- <input type="submit" class="btn" value="Registrarse" /> -->

            <button class="btn focus:outline-none">
                {{ __('Register') }}
            </button>

            <p class="social-text">O registrate por medio de estas redes sociales</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Eres nuevo aqui ?</h3>
            <p>
              No esperes mas! Crea una cuenta hoy en Memflix y 
              disfruta de todo su amplio catalogo !
            </p>
            <button class="btn transparent focus:outline-none" id="sign-up-btn">
              Registrarse
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Ya tienes cuenta ?</h3>
            <p>
              Inicia sesion para seguir disfrutando de todo el
              contenido que Mexflix tiene ya para ti !
            </p>
            <button class="btn transparent focus:outline-none" id="sign-in-btn">
              Iniciar Sesion
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{{ asset('js/app-register-login.js') }}"></script>
  </body>
</html>