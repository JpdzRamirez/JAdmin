    {{-- Sidebar --}}
    <div class="sidebar" data-background-color="dark">
        {{-- Logo Header --}}
        <div class="sidebar-logo">
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="{{ asset('icon-192-maskable.png') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
        </div>
        {{-- End Logo Header --}}
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Secciones</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{ route('main.dashboard') }}">
                        <span class="sub-item">Home</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              @if(auth()->user()->role!=1 )
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Herramientas</h4>
              </li>
              @if(auth()->user()->role=2 || auth()->user()->role=3)
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Administración</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="components/avatars.html">
                        <span class="sub-item">Administración de Usuarios</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/buttons.html">
                        <span class="sub-item">Asignación de Pruebas</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/gridsystem.html">
                        <span class="sub-item">Resultados</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/panels.html">
                        <span class="sub-item">Administración de Pruebas</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              @endif
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#charts">
                  <i class="far fa-chart-bar"></i>
                  <p>Calendario</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="charts">
                  <ul class="nav nav-collapse">
                    @if(auth()->user()->role=2 || auth()->user()->role=3)
                    <li>
                      <a href="charts/charts.html">
                        <span class="sub-item">Administrar Citas</span>
                      </a>
                    </li>
                    @endif
                    <li>
                      <a href="charts/sparkline.html">
                        <span class="sub-item">Citas</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Pruebas Adultos</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav1">
                        <span class="sub-item">Comportamiento</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav1">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Prueba 1</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="sub-item">Prueba 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav2">
                        <span class="sub-item">Perfil Laboral</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav2">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Prueba 1</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Prueba xxx</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu2">
                  <i class="fas fa-bars"></i>
                  <p>Pruebas Infantes</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu2">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav_comportamiento">
                        <span class="sub-item">Comportamiento</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav_comportamiento">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Prueba 1</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="sub-item">Prueba 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav_tdh">
                        <span class="sub-item">TDH</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav_tdh">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Prueba 1</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Prueba Psicomotriz</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </div>