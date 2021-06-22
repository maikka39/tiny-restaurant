<footer class="footer">
    <div>
        <div class="links is-vcentered">
            <a class="link" href="{{ route('newsItems.show') }}">Nieuws</a>
            <a class="link" href="{{ route('project.showAll') }}">Projecten</a>
            <a class="link" href="{{ url('algemene-voorwaarden') }}">Algemene voorwaarden</a>
            <div class="logo">
                <a class="image-container" href="{{ route('homepages.show') }}">
                    <figure class="image">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo van TinyRestaurant"/>
                    </figure>
                </a>
            </div>
            <a class="link" href="{{ url('privacy') }}">Privacy</a>
            <a class="link" href="{{ route('contact.show') }}">Contact</a>
            <a class="link" href="{{ route('donations.show') }}">Steun ons</a>
        </div>
        <hr role="presentation">
        <div>
            <div class="pt-3 pb-6 media-links">
                @foreach ($links as $link)
                    <a class=" pl-3 pr-3" style="display: inline-flex; align-self: center; justify-self: center;" href="{{ $link->url }}" target="#">
                        <figure class="image is-32x32">
                            <img style="filter: grayscale(100%);" alt="Logo van {{ $link->name }}" src="{{ asset('img/link_icons/' .$link->logo_url) }}" />
                        </figure>
                    </a>
                @endforeach
            </div>

            <div class="columns no-text-wrap">
                <div class="column">
                    <p class="has-text-weight-bold">Stichting MIEP</p>
                    <p>Nassaustraat, 4</p>
                    <p>5741HR Beek en Donk</p>
                </div>
                <div class="column">
                    <a class="text-link" href="mailto:info@stichtingmiep.nl"> info@stichtingmiep.nl </a>
                    <p>06 - 20 46 65 55 (Krista Werker)</p>
                    <p>06 - 24 62 96 76 (Jorick Cardon)</p>
                </div>
            </div>
            <p class="pt-4 has-text-centered">KvK: 69331359, NL97 RABO 0321670485</p>
            <p class="pt-6 has-text-centered">&copy; TinyRestaurant. 2021. We houden van onze boeren!</p>
        </div>
    </div>
</footer>
