<nav class="bg-gray-200 navbar navbar-expand-lg navbar-light bg-light">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 collapse navbar-collapse" id="toggler">
        <div class="relative flex items-center h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{url('/')}}" class="navbar-text" aria-current="page">Tiny Restaurant</a>
                        <a href="{{url('/nieuws')}}" class="navbar-text">Nieuws</a>
                        <a href="{{url('#')}}" class="navbar-text">Agenda</a>
                        <div class="dropdown">
                            <button class="dropbtn navbar-text">Gemeentes</button>
                            <div class="dropdown-content">
                                @foreach($municipalities as $municipality)
                                <a href="{{'/gemeente/' . $municipality->title}}">{{$municipality->title}}</a>
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
        <div class="px-2 pt-2 pb-3 space-y-1">
            <div class="hidden md:flex md:flex-row" id="mobileMenu">
                <div><a href="{{url('/')}}" class="navbar-text navbar-text-small" aria-current="page">Home</a></div>
                <div><a href="{{url('/nieuws')}}" class="navbar-text navbar-text-small">Nieuws</a></div>
                <div><a href="{{url('#')}}" class="navbar-text navbar-text-small">Agenda</a></div>
                <div class="dropdown">
                    <button class="dropbtn navbar-text navbar-text-small w-auto">Gemeentes</button>
                    <div class="dropdown-content">
                        @foreach($municipalities as $municipality)
                            <a href="{{'/gemeente/' . $municipality->title}}">{{$municipality->title}}</a>
                        @endforeach
                    </div>
                </div>
                <div><a href="{{url('/contact')}}" class="navbar-text navbar-text-small">Contact</a></div>
            </div>
        </div>
    </div>
</nav>

<style>
    .active{
        display: block;
    }
</style>
<script src="../../js/navbar.js"></script>