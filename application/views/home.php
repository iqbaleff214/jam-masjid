<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">

    <style>
        .utama {
            min-height: 100vh;
            /* background-color: yellowgreen; */
        }
    </style>

    <title>Hello, world!</title>
</head>

<body>

    <div class="utama">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">Navbar w/ text</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Navbar text with an inline element
                </span>
            </div>
        </nav>
        <div id="slideUtama" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active bg-warning utama" data-interval="2000">
                    <div class="container">Halo</div>
                </div>
                <div class="carousel-item bg-info utama" data-interval="2000">
                </div>
            </div>
            <a class="carousel-control-prev" href="#slideUtama" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slideUtama" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row fixed-bottom">
            <div class="col-2 bg-primary text-light">
                <div class="m-2 center">
                    <h1>Shubuh</h1>
                </div>
            </div>
            <div class="col-2 bg-info text-light">
                <div class="m-2 center">
                    <h1>Syuruq</h1>
                </div>
            </div>
            <div class="col-2 bg-warning">
                <div class="m-2 center">
                    <h1>Zhuhur</h1>
                </div>
            </div>
            <div class="col-2 bg-success text-light">
                <div class="m-2 center">
                    <h1>Ashar</h1>
                </div>
            </div>
            <div class="col-2 bg-danger text-light">
                <div class="m-2 center">
                    <h1>Maghrib</h1>
                </div>
            </div>
            <div class="col-2 bg-dark text-light">
                <div class="m-2 center">
                    <h1>Isya</h1>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/'); ?>js/core/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/core/popper.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
</body>

</html>