  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: white" ;>
      <div class="container px-4 px-lg-5">
          <a class="navbar-brand" href="#!">SERUM LIFE</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <!--<li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Inicio</a></li>-->
                  <li class="nav-item"><a class="nav-link active" href="/about">Nosotros</a></li>
                  <li class="nav-item"><a class="nav-link active" href="{{ route('catalogo')}}">Productos</a></li>
                  @auth
                  <li class="nav-item dropdown active">
                      <a class="nav-link dropdown-toggle" id="navbarDropdownMicuenta" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cuenta</a>
                      <ul class="dropdown-menu navbar-light bg-dark" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="/miCuenta">Mi Cuenta </a></li>
                          <li><a class="dropdown-item" href="{{ route('carList') }}">Carrito de Compras </a></li>
                          <li><a class="dropdown-item" href="{{ route('listaPedidos') }}">Historial de Pedidos </a></li>
                         
                      </ul>
                  </li>
                  @endauth
                  <!-- Links admin Navigation-->

                  <li class="nav-item dropdown active ">
                      @if (auth()->check())
                      @if (auth()->user()->isAdmin())
                      <!-- hace referencia a la funcion en User-->
                      <a class="nav-link dropdown-toggle " id="navbarAdmin" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administracion</a>
                      <ul class="dropdown-menu navbar-light bg-dark" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{ route('listaUsuarios')}}">Usuarios</a></li>
                          <li>
                              <hr class="dropdown-divider" />
                          </li>
                          <li><a class="dropdown-item" href="{{ route('adminProducto')}}">Productos</a></li>
                          <li>
                              <hr class="dropdown-divider" />
                          </li>
                          <li><a class="dropdown-item" href="{{ route('admintipos') }}">Categorias</a></li>
                          <li>
                              <hr class="dropdown-divider" />
                          </li>
                          <li><a class="dropdown-item" href="{{ route('listaOrdenes') }}">Ordenes</a></li>
                      </ul>
                      @endif
                      @endif
                  </li>
              </ul>              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                      <!-- Link cerrar sesion-->
                      @auth
                      <li class="btn btn-outline-light " href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                          Logout
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </li>
                      @endauth
                      <div>
                          @guest
                          <a class="btn btn-outline-light  " href="{{ route('login') }}" role="button">Login</a>
                          <a class="btn btn-outline-light" href="{{ route('register') }}" role="button">Registrarse </a>
                          @endguest
                      </div>
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('carList') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="badge badge-pill badge-dark">
                                  <i class="bi bi-cart"></i> 
                                        @if (count(Cart::getContent()))
                                                {{count(Cart::getContent())}}   
                                        @endif
                              </span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                              <ul class="list-group" style="margin: 20px;">
                              @include('partials.cart-drop')
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </nav>