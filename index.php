<?php
use Dotenv\Dotenv;

// Register the Composer autoloader...
require __DIR__.'/vendor/autoload.php';

try {
    $dotenv = Dotenv::createImmutable(dirname(__FILE__));
    $dotenv->load();
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit();
}

function env($env, $default = null): mixed
{
    if (isset($_ENV[mb_strtoupper($env)]) && !empty($_ENV[mb_strtoupper($env)])) {
        if ($_ENV[mb_strtoupper($env)] == "false") {
            $_ENV[mb_strtoupper($env)] = false;
        }
        $response = trim($_ENV[mb_strtoupper($env)], '/');
    } else {
        $response = $default;
    }
    return $response;
}

function getURLActual(): string
{
    // Obtener el protocolo (http o https)
    $protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    // Obtener el nombre del host
    $host = $_SERVER['HTTP_HOST'];
    // Obtener la URI de la solicitud
    $uri = $_SERVER['REQUEST_URI'];
    // Combinar todo para obtener la URL completa
    return $protocolo . $host . $uri;
}

define('APP_URL', env('APP_URL', getURLActual()));

function asset($uri = null, $noCache = false): string
{
    $uri = trim($uri, '/');
    $version = null;
    if ($noCache) {
        $version = "?v=" . rand();
    }
    $url = trim(APP_URL, '/');
    return $url . '/' . $uri . $version;
}

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ing. Yonathan Castillo">
    <meta name="generator" content="leothan 0.1">

    <title>Alimentos del Guárico S.A.</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= asset('dist/favicons/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= asset('dist/favicons/apple-icon-60x60.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= asset('dist/favicons/apple-icon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= asset('dist/favicons/apple-icon-76x76.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= asset('dist/favicons/apple-icon-114x114.png') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= asset('dist/favicons/apple-icon-120x120.png') ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= asset('dist/favicons/apple-icon-144x144.png') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= asset('dist/favicons/apple-icon-152x152.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('dist/favicons/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= asset('dist/favicons/android-icon-192x192.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('dist/favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= asset('dist/favicons/favicon-96x96.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= asset('dist/favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= asset('dist/favicons/manifest.json') ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= asset('dist/favicons/ms-icon-144x144.png') ?>">
    <meta name="theme-color" content="#ffffff">

    <!--Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
    <link rel="stylesheet" href="<?= asset('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">

    <style>

        @media (min-width: 768px) {
            #scale {
                transform: scale(0.8); /* Reduce el tamaño al 80% */
            }
        }

        *{
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .text_title{
            color: rgba(8,23,44,1);
            font-weight: bold;
        }


        .gradient-custom-2 {
            /* fallback for old browsers */
            background: rgb(18,58,108);

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-radial-gradient(circle, rgba(18,58,108,1) 0%, rgba(8,23,44,1) 100%);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: radial-gradient(circle, rgba(18,58,108,1) 0%, rgba(8,23,44,1) 100%);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }
        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }


        .gobernacion{
            display: block;
            position: absolute;
            height: 100px;
            width: 100px;
            right: 3%;
            top: 3%;
        }

        .gobernacion_start{
            display: block;
            position: absolute;
            height: 100px;
            width: 100px;
            left: 3%;
            top: 3%;
        }


    </style>

    <style>
        /* styles.css */
        #preloader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: #fff no-repeat center center;
            z-index: 9999;
        }

        #preloader::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100px;
            height: 100px;
            background: url("<?= asset('dist/img/logo_alguarisa.png') ?>") no-repeat center center;
            background-size: contain;
            transform: translate(-50%, -50%);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: translate(-50%, -50%) scale(1);
            }
            50% {
                transform: translate(-50%, -50%) scale(1.2);
            }
            100% {
                transform: translate(-50%, -50%) scale(1);
            }
        }

    </style>

    <script type="application/javascript">
        //Script para ejecurar el preloader
        window.addEventListener('load', function() {
            document.querySelector('#preloader').style.display = 'none';
            document.querySelector('.container').style.display = 'block';
        });
    </script>
</head>
<body style="background-color: #eee;">

<div id="preloader"></div>

<div class="position-relative gradient-form" style="min-height: 100vh;">
    <div class="position-absolute top-50 start-50 translate-middle container">


        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4" id="card_body">

                                <img class="gobernacion_start d-lg-none" src="<?= asset('dist/img/logo_gobernacion.png')?>" alt="Logo Gobernación Guárico">

                                <div class="text-center mt-5 <!-- pt-5-->">
                                    <a href="<?= env('APP_URL', './')?>" onclick="verCargando()">
                                        <img class="img-fluid mt-lg-5" src="<?= asset('dist/img/logo_alguarisa.png') ?>" alt="Logo Alguarisa">
                                    </a>
                                    <h6 class="mt-1 mb-4 pb-1 text_title"><strong>Dirección de Tecnología y Sistemas.</strong></h6>
                                </div>

                                <div class="row mt-sm-5 position-relative">

                                    <div class="col-12">

                                        <div class="d-flex gap-3 mb-3 flex-column">
                                            <a href="<?= env('URL_SISTEMA_ALMACEN', '#')?>" class="btn btn-lg btn-outline-dark" onclick="verCargando()">

                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                                                    <path d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z"/>
                                                </svg>
                                                <span class="ms-2 fs-6">Sistema de Almacen</span>

                                            </a>
                                        </div>

                                        <div class="d-flex gap-3 flex-column mb-3">
                                            <a href="<?= env('URL_SISTEMA_TRANSPORTE', '#') ?>" class="btn btn-lg btn-outline-dark" onclick="verCargando()">

                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.535a3.5 3.5 0 1 0 6.93 0h3.07a3.5 3.5 0 1 0 6.93 0H21a1 1 0 0 0 1-1v-4a.999.999 0 0 0-.106-.447l-2-4A1 1 0 0 0 19 6h-5a2 2 0 0 0-2-2H4Zm14.192 11.59.016.02a1.5 1.5 0 1 1-.016-.021Zm-10 0 .016.02a1.5 1.5 0 1 1-.016-.021Zm5.806-5.572v-2.02h4.396l1 2.02h-5.396Z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="ms-2 fs-6">Sistema de Transporte</span>

                                            </a>
                                        </div>

                                        <div class="d-flex d-none gap-3 flex-column mb-3">
                                            <a href="#" class="btn btn-lg btn-outline-dark" onclick="verCargando()">

                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="ms-2 fs-6"><!--Sistema de -->Talento Humano</span>

                                            </a>
                                        </div>

                                        <div class="d-flex d-none gap-3 flex-column">
                                            <a href="#" class="btn btn-lg btn-outline-dark" onclick="verCargando()">

                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="ms-2 fs-6">Atención al Ciudadano</span>

                                            </a>
                                        </div>

                                        <div class="position-absolute top-50 start-50 translate-middle d-none verCargando">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-flex align-items-center gradient-custom-2" style="min-height: 70vh">
                            <img class="gobernacion" src="<?= asset('dist/img/logo_gobernacion_white.png') ?>" alt="Logo Gobernación Guárico">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <img class="img-fluid rounded-2 border border-light" src="<?= asset('dist/img/logo_tecnologia.png') ?>" alt="Logo Tecnología Alguarisa">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
<script src="<?= asset('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<script type="application/javascript">
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }else {
                    form.classList.add('opacity-50');
                    document.querySelector(".verCargando").classList.remove('d-none');
                }
                form.classList.add('was-validated');
            }, false);
        })
    })()

    function verCargando() {
        document.querySelector("#card_body").classList.add('opacity-50');
        document.querySelector(".verCargando").classList.remove('d-none');
    }

    console.log('Hi!')
</script>
</body>
</html>
