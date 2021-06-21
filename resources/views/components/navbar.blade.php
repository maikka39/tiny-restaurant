<nav class="navbar" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('homepages.show') }}" aria-label="Terug naar hoofdpagina">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="frontend-navbar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="frontend-navbar" class="navbar-menu">
        <div class="navbar-end">
            <ul class="navbar-start">
                <li class="navbar-item"><a href="{{ route('newsItems.show') }}">Nieuws</a></li>
                <li class="navbar-item"><a href="{{ route('project.showAll') }}">Projecten</a></li>
                <li class="navbar-item has-dropdown is-hoverable" data-target="dropdown-link" aria-haspopup="true" aria-expanded="false">
                    <a class="navbar-link" tabindex="0">Gemeentes</a>
                    <ul class="navbar-dropdown">
                        @foreach($municipalities as $municipality)
                            <li>
                                <a class="navbar-item" id="dropdown-link" href="{{ route('municipality.show', $municipality->title) }}">
                                    {{ $municipality->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="navbar-item">
                    <div class="field is-grouped">
                        <p class="control">
                            <a class="button" href="{{ url('doneer') }}">
                                <span class="icon" aria-hidden="true">
                                    <i class="fas fa-hand-holding-heart"></i>
                                </span>
                                <span>
                                    Doneer
                                </span>
                            </a>
                        </p>
                        <p class="control">
                            <a class="button is-primary" href="{{ route('contact.show') }}">
                                <span class="has-text-weight-semibold">Contact</span>
                            </a>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
