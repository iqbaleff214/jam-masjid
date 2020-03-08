<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">

    <style>
        html {
            overflow-y: hidden;
        }

        body {
            background-image: url('assets/img/bg/bg-login.jpg');
            background-color: yellowgreen;
            background-size: cover;
            box-shadow: inset 0 0 1000px 1000px rgba(0, 0, 0, .5);
        }

        .utama {
            min-height: 100vh;
        }

        .flex-item {
            position: fixed;
            top: 50%;
            right: 50%;
            transform: translate(50%, -50%);
        }
    </style>

    <title><?php echo $basic['nama']; ?></title>
</head>

<body>

    <div class="utama">
        <!-- <div class="card m-3 mt-3" style="max-width: 540px;">
            <div class="card-header">Header</div>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="https://image.freepik.com/free-vector/way-concept-illustration_114360-1191.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div> -->
        <nav class="navbar navbar-dark bg-<?php echo warna(); ?> fixed-top">
            <span class="navbar-brand mb-0 h1"><?php echo $basic['nama']; ?></span>
            <div class="float-right text-white">
                <?php echo date('d') . ' ' . bulan(time()) . ' ' . date('Y'); ?>, pekan ke-<?php echo pekan(time()); ?>
            </div>
        </nav>