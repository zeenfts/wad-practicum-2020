<nav class="navbar navbar-expand-md navbar-dark bg-info shadow-sm">
    <div class="container">
        {{-- <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                    <a href="{{ route('home_prod') }}" class="nav-link">HOME</a>
                </li>
                <li class="nav-item {{ (request()->is('product')) ? 'active' : '' }}">
                    <a href="{{ route('product_list') }}" class="nav-link">PRODUCT</a>
                </li>
                <li class="nav-item {{ (request()->is('order')) ? 'active' : '' }}">
                    <a href="{{ route('order_prod') }}" class="nav-link">ORDER</a>
                </li>
                <li class="nav-item {{ (request()->is('history')) ? 'active' : '' }}">
                    <a href="{{ route('history_prod') }}" class="nav-link">HISTORY</a>
                </li>
            </ul>
        </div>
    </div>
</nav>