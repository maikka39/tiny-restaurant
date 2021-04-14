@extends('site.layouts.base')

@section('content')
    <div class="hero">
        <img src="https://tinyrestaurant.nl/assets/imgs/cover/bg.jpg" alt="Tiny Restaurant">

        <div class="container">
            <div class="content">
                <h1>Het Tiny Restaurant</h1>
                <p>Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te gaan?</p>
                <a href="#" class="button primary">Neem contact op!</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="section">
            <a href="#" class="button primary">Primaire knop</a>
            <a href="#" class="button secondary">Secundaire knop</a>
            <a href="#" class="button">Secundaire knop</a>
            <button href="#" class="button primary">Secundaire knop</button>
        </div>
    
        <div class="section">
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6>Heading 6</h6>
        </div>

        <div class="box">
            <h2>Neem contact met ons op!</h2>

            <form>
                <div class="field input">
                    <input type="text" placeholder="Naam">
                    <label>Naam</label>
                </div>

                <div class="field input">
                    <input type="email" placeholder="E-mailadres">
                    <label>E-mailadres</label>
                </div>

                <div class="field input">
                    <input type="date" placeholder="Datum">
                    <label>Datum</label>
                </div>

                <div class="field">
                    <label>Foto</label>
                    <input type="file">
                </div>

                <div class="field">
                    <label>Geslacht</label>

                    <label>
                        <input type="checkbox">Man
                    </label>

                    <label>
                        <input type="checkbox">Vrouw
                    </label>

                    <label>
                        <input type="checkbox">Anders
                    </label>
                </div>

                <div class="field">
                    <label>Kleur</label>

                    <label>
                        <input type="radio">Rood
                    </label>

                    <label>
                        <input type="radio">Groen
                    </label>

                    <label>
                        <input type="radio">Blauw
                    </label>
                </div>

                <div class="field input">
                    <textarea cols="30" rows="10" placeholder="Bericht"></textarea>
                    <label>Bericht</label>
                </div>

                <div class="field">
                    <button class="button primary" type="submit">Verzenden</button>
                </div>
            </form>
        </div>
    
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore tempore ipsam saepe doloribus minus quod asperiores eligendi? Praesentium, in mollitia!</p>
    
        <div class="box primary">
            <h2>Boer Yvonne</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto dignissimos ex ullam enim mollitia necessitatibus eum, magnam atque odio quos ea, a nesciunt repudiandae maxime dolor quo cum! Aut ullam deserunt obcaecati placeat maiores dignissimos repudiandae corporis magnam, labore, vero a! Dicta reprehenderit sunt maxime dolores fugiat illo quasi eius id debitis culpa nesciunt, facilis sequi quas beatae incidunt! Rem velit non maxime optio, iusto quis veritatis incidunt sequi illum earum sit corrupti et tempore veniam at provident. Voluptas architecto culpa beatae porro, obcaecati ullam non officiis quis eos laborum aperiam perferendis nam nulla, hic ad quod animi? Blanditiis, nesciunt.</p>
        </div>
        
        <div class="box secondary">
            <h2>Boer Yvonne</h2>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto dignissimos ex ullam enim mollitia necessitatibus eum, magnam atque odio quos ea, a nesciunt repudiandae maxime dolor quo cum! Aut ullam deserunt obcaecati placeat maiores dignissimos repudiandae corporis magnam, labore, vero a! Dicta reprehenderit sunt maxime dolores fugiat illo quasi eius id debitis culpa nesciunt, facilis sequi quas beatae incidunt! Rem velit non maxime optio, iusto quis veritatis incidunt sequi illum earum sit corrupti et tempore veniam at provident. Voluptas architecto culpa beatae porro, obcaecati ullam non officiis quis eos laborum aperiam perferendis nam nulla, hic ad quod animi? Blanditiis, nesciunt.
        </div>

        <div class="block">
            <h4>Boodschappen</h4>
            <ul>
                <li>Aardappelen</li>
                <li>Groente</li>
                <li>Vlees</li>
                <li>Vis</li>
                <li>Drinken:
                    <ul>
                        <li>Sinas</li>
                        <li>Cola</li>
                        <li>Bier
                            <ul>
                                <li>Heineken</li>
                                <li>Brand</li>
                                <li>Hertog-Jan</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            
            <ol>
                <li>Boter</li>
                <li>Kaas</li>
                <li>Eieren</li>
            </ol>
        </div>

        <div class="sidecard">
            <h4>Agenda</h4>
            <p>11/2 Proeverij Eindhoven</p>
            <p>17/2 Proeverij Laarbeek</p>
            <p>10/3 Proeverij Helmond</p>
        </div>

        <div class="sidecard">
            <h4>Agenda</h4>
            <a>https://www.groentjessoep.nl/</a>
            <a>https://www.smaakcentrum.nl/</a>
            <a>https://www.jonglereneten.nl/</a>
        </div>
    </div>

@endsection
