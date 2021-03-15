<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/township.css') }}" rel="stylesheet">
    <title>Gemeente</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1nd07N46BhYau8pzEAKTLCZ1cdV8iRsc&callback=myMap" defer></script>
</head>
<body>
    <div class="flex place-content-center">
        <div class="w-5/6 mt-4 mb-4">
            <div class="flex flex-row place-content-around">
                <div class="flex flex-col w-3/6"> 
                    <h1 class="font-bold text-gray-600 text-5xl"> {{ $township->name }} </h1>
                    <p class="text-justify"> {{ $township->body }} </p>
                </div>
                <div>
                    <?php
                    $filename = "/images/" . $township->picture;
                    ?>
                    <img class="townshipImage shadow-lg" src="<?php echo url($filename) ?>" class="rounded" alt="maps">
                </div>
            </div>
        </div>
    </div>
    <div class="nextEventDiv flex place-content-center">
        <div class="w-5/6">
            <div class="flex flex-row place-content-around">
                <div class="flex flex-col w-3/6">
                    <div id="googleMap" class="mt-3 mb-3"></div>
                </div>
                <div class="flex flex-col justify-content-center w-2/6 mt-3 mb-3">
                    <h3 class="font-bold text-white text-4xl"> Aankomende evenement: </h3>
                    <p class="text-justify text-lg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sollicitudin, neque et ultrices pulvinar, ipsum libero mattis massa, in pharetra dui lacus vitae urna. Integer vulputate laoreet lectus, in iaculis lectus finibus egestas. Phasellus quis elementum purus. Donec at auctor ex. Vestibulum vel egestas ante. Aliquam at turpis vitae lectus commodo varius sit amet et leo. Vestibulum bibendum ultricies tortor, a aliquet neque aliquam at.</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php
        $partners = $township->partners;
        if (count($partners) > 0) {
            Print"<h3 class='text-xl font-bold text-center'> Partners: </h3>
            <div class='flex flex-wrap justify-around'>";
            foreach ($partners as $partner) {
                $filename = "/images/" . $partner->picture;
                $url = url($filename);
                Print "
                <div class='card border-2 border-gray-300 mb-3 mt-3 shadow-lg'>
                    <img 
                    src='" . $url . "'
                    alt='Afbeelding Boer'>
                    <div class='p-2 h-auto'>
                        <h5 class='text-xl font-bold'>" . $partner->name . "</h5>
                        <p>" . $partner->description . "</p> 
                        <button href='#' class='m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right'> Lees meer </button>
                    </div> 
                </div>";
            }
            Print"</div>";
        }
    ?>
    <div class="container mb-4">
    </div>
    <script>
        function myMap() {
        var map = new google.maps.Map(document.getElementById("googleMap"));
        };
    </script>
</body>
</html>