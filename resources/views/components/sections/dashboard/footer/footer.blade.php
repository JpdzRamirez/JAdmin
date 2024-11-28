{{-- Footer--}}
    <div class="container-fluid d-flex justify-content-between">
      <nav class="pull-left">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="https://wa.me/573177163494"> {{ __('general.help') }} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="https://wa.me/573177163494"> {{ __('general.license') }} </a>
          </li>
        </ul>
      </nav>
      {{-- Copyright Section--}}
      <div class="copyright">
        <div class="py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; {{ __('general.owner') }} 2024</small></div>
        </div>
      </div>
      <div>
        {{ __('general.gratefulness') }}
        <a target="_blank" href="https://github.com/JpdzRamirez">JPDZSoftware.com</a>.
      </div>
    </div>

