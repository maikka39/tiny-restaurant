<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('homepages.show') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Tiny Restaurant Logo">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="frontend-navbar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="frontend-navbar" class="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-start">
                <a class="navbar-item" href="{{ route('newsItems.show') }}">Nieuws</a>
                <a class="navbar-item" href="{{ route('project.showAll') }}">Projecten</a>
                <div class="navbar-item has-dropdown is-hoverable" data-target="dropdown-link">
                    <div class="navbar-link">Gemeentes</div>
                    <div class="navbar-dropdown">
                        @foreach($municipalities as $municipality)
                            <a class="navbar-item" id="dropdown-link" href="{{ route('municipality.show', $municipality->title) }}">
                                {{ $municipality->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="navbar-item">
                    <div class="field is-grouped">
                        <p class="control">
                            <a class="button" href="{{ url('doneer') }}">
                                <span class="icon">
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
                </div>
            </div>
        </div>
    </div>
</nav>
