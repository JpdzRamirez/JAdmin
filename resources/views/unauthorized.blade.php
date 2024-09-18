<x-guest-layout>
    <div class="container">
        <h1>No estás autorizado para acceder a esta página</h1>
        <p>Por favor, contacta con el administrador si crees que esto es un error.</p>
        @if ($role === '1')
            <a href="{{ route('admin.dashboard') }}">Volver al dashboard de administrador</a>
        @elseif ($role === '2')
            <a href="{{ route('casher.dashboard') }}">Volver al dashboard</a>
        @elseif ($role === '3')
            <a href="{{ route('waiter.dashboard') }}">Volver al dashboard</a>
        @elseif ($role === '4')
            <a href="{{ route('customer.dashboard') }}">Volver al dashboard</a>
        @else
            <a href="{{ url('/') }}">Volver al inicio</a>
        @endif
    </div>
</x-guest-layout>