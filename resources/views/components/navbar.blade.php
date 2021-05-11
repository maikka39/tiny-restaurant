<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container mx-auto collapse navbar-collapse" id="toggler">
        <div class="navbar-flex">
            <div class="navbar-flex-wrapper">
                <div class="navbar-hidden">
                    <div class="navbar-links">
                        <a href="{{url('/')}}" class="navbar-text" aria-current="page">Tiny Restaurant</a>
                        <a href="{{url('/nieuws')}}" class="navbar-text">Nieuws</a>
                        <a href="{{url('#')}}" class="navbar-text">Agenda</a>
                        <div class="dropdown">
                            <button class="drop-button navbar-text">Gemeentes</button>
                            <div class="dropdown-content">
                                @foreach($municipalities as $municipality)
                                    <a href="{{ route('municipality.show', $municipality->title) }}">{{$municipality->title}}</a>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{url('/contact')}}" class="navbar-text">Contact</a>
                    </div>
                </div>
            </div>

            <a href="{{url('/')}}" class="sm:hidden navbar-text navbar-text-small" aria-current="page">Tiny Restaurant</a>

            <button class="navbar-toggler toggler-example sm:invisible" id="hamburgerbtn">
                <span class="dark-blue-text">
                    <i class="fas fa-bars fa-1x"></i>
                </span>
            </button>
        </div>
    </div>

    <div class="sm:hidden" id="mobile-menu">
        <div class="mobile-navbar">
            <div class="mobile-navbar-flex" id="mobileMenu">
                <a href="{{url('/')}}" class="navbar-text navbar-text-small" aria-current="page">Home</a>
                <a href="{{url('/nieuws')}}" class="navbar-text navbar-text-small">Nieuws</a>
                <a href="{{url('#')}}" class="navbar-text navbar-text-small">Agenda</a>
                <div class="dropdown flex justify-center flex-col">
                    <button class="dropdown-button navbar-text navbar-text-small w-auto">Gemeentes</button>
                    <div class="dropdown-content">
                        @foreach($municipalities as $municipality)
                            <a class="text-center" href="{{ route('municipality.show', $municipality->title) }}">{{$municipality->title}}</a>
                        @endforeach
                    </div>
                </div>
                <a href="{{url('/contact')}}" class="navbar-text navbar-text-small">Contact</a>
            </div>
        </div>
    </div>
</nav>