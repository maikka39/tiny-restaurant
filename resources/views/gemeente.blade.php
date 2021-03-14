<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gemeente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1nd07N46BhYau8pzEAKTLCZ1cdV8iRsc&callback=myMap" defer></script>

    
</head>
<body style="background-color: FCFAFA;">
    <div class="text-center container mt-4 mb-4">
        <div class="row">
        <div class="col"> 
            <h1> {{ $gemeente->name }} </h1>
            <p> {{ $gemeente->body }} </p>
        </div>
        <div>
            <img class="shadow-lg" style="height: 250px;" src="https://media-exp1.licdn.com/dms/image/C561BAQG60zqtu7EsOA/company-background_10000/0?e=2159024400&v=beta&t=gl_IsvE39MBK8vOFmopCMLB8HjMRorE0PIcIyiplqj4" class="rounded" alt="maps">
        </div>
        </div>
    </div>
    <div  style="background-color: #2191FB;">
        <div class="container">

        <div class="row">
            <div class="col">
                <div id="googleMap" class="mt-2 mb-2" style="width:100%; height:300px;"></div>
            </div>
            <div class="col d-flex flex-column justify-content-center">
                <h3> Aankomende evenement: </h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sollicitudin, neque et ultrices pulvinar, ipsum libero mattis massa, in pharetra dui lacus vitae urna. Integer vulputate laoreet lectus, in iaculis lectus finibus egestas. Phasellus quis elementum purus. Donec at auctor ex. Vestibulum vel egestas ante. Aliquam at turpis vitae lectus commodo varius sit amet et leo. Vestibulum bibendum ultricies tortor, a aliquet neque aliquam at.</p>
            </div>
        </div>
        </div>
    </div>
    <br>
    <?php
        $partners = $gemeente->partners;
        if (count($partners) > 0) {
            Print"<h3 class='text-center'> Partners: </h3>
            <div class='d-flex flex-wrap justify-content-around'>";
            foreach ($partners as $partner) {
                Print "
                <div class='card mt-3 shadow-lg' style='width: 18rem;'>
                    <img class='card-img-top' 
                    src='https://downtoearthmagazine.nl/wp-content/uploads/2020/08/20200615-Down-to-Earth-Magazine-Boer_Burger-JPG-WEB_IMG_9520.jpg'
                    alt='Afbeelding Boer'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $partner->name . "</h5>
                        <p>" . $partner->description . "</p> 
                        <a href='#' class='btn btn-primary float-right'> Lees meer </a>
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