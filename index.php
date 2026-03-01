<?php
// Evitar cache en el navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
// Register the Composer autoloader...
require __DIR__.'/vendor/autoload.php';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alimentos del Guárico S.A.</title>

    <meta name="description" content="Plataforma de organización de Alimentos del Guárico S.A.">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:title" content="ALGUARISA">
    <meta property="og:description" content="Plataforma de organización de Alimentos del Guárico S.A.">
    <meta property="og:image" content="{{ asset('favicons/favicon-128x128.png') }}">

    <!-- Favicon y PWA -->
    <link rel="manifest" href="<?= asset('manifest.json') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('dist/favicons/favicon-32x32.png') ?>">
    <link rel="apple-touch-icon" href="<?= asset('dist/favicons/favicon-128x128.png') ?>">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <!--Bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
    <link rel="stylesheet" href="<?= asset('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">

    <style>

        * {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .text_title {
            color: rgba(8, 23, 44, 1);
            font-weight: bold;
        }

        .gradient-custom-2 {
            /* fallback for old browsers */
            background: rgb(18, 58, 108);

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-radial-gradient(circle, rgba(18, 58, 108, 1) 0%, rgba(8, 23, 44, 1) 100%);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: radial-gradient(circle, rgba(18, 58, 108, 1) 0%, rgba(8, 23, 44, 1) 100%);
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

        @media (max-height: 650px){
            #scale {
                transform: scale(0.80); /* Reduce el tamaño al 95% */
            }
        }

        /*--------------------------------------------------------------
        # Preloader
        --------------------------------------------------------------*/
        #preloader {
            position: fixed;
            inset: 0;
            z-index: 999999;
            overflow: hidden;
            background: #ffffff;
            transition: all 0.6s ease-out;
        }

        #preloader:before {
            content: "";
            position: fixed;
            top: calc(50% - 30px);
            left: calc(50% - 30px);
            border: 6px solid #ffffff;
            border-color: #1977cc transparent #1977cc transparent;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: animate-preloader 1.5s linear infinite;
        }

        @keyframes animate-preloader {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /*--------------------------------------------------------------
        # Imagenes Extras
        --------------------------------------------------------------*/

        .gobernacion {
            display: block;
            position: absolute;
            height: 100px;
            width: 100px;
            right: 3%;
            top: 3%;
        }

        .gobernacion_start {
            display: block;
            position: absolute;
            height: 100px;
            width: 100px;
            left: 3%;
            top: 3%;
        }


    </style>
</head>
<body style="background-color: #eee;">

<div class="position-relative gradient-form" style="min-height: 100vh; z-index: 2">
    <div class="position-absolute top-50 start-50 translate-middle container">


        <div id="scale" class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="card-body p-md-5 mx-md-4" id="card_body">

                                <img class="gobernacion_start d-lg-none mt-2" src="<?= asset('dist/img/logo_gobernacion.png') ?>" alt="Logo Gobernación Guárico">

                                <div class="row d-sm-block d-md-none" style="min-height: 50px;">&nbsp;</div>

                                <div class="text-center">
                                    <a href="<?= env('APP_URL', './')?>">
                                        <img class="img-fluid" src="<?= asset('dist/img/logo_alguarisa.png') ?>" alt="Logo AlGUARISA" onclick="mostrarPreloader()">
                                    </a>
                                    <h6 class="mt-1 mb-4 pb-1 text_title"><strong>Dirección de Tecnología y Sistemas</strong></h6>
                                </div>

                                <!--@yield('content')-->

                                <div class="row text-center mb-5 mb-sm-auto">
                                    <div class="col">

                                        <div class="d-flex gap-3 mb-3 flex-column">
                                            <a href="<?= env('URL_SISTEMA_ALMACEN', './')?>" class="btn btn-lg btn-outline-dark" onclick="mostrarPreloader()">

                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                                                    <path d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z"/>
                                                </svg>
                                                <span class="ms-2 fs-6">Sistema de Almacen</span>

                                            </a>
                                        </div>

                                        <div class="d-flex gap-3 flex-column mb-3">
                                            <a href="<?= env('URL_SISTEMA_TRANSPORTE', './') ?>" class="btn btn-lg btn-outline-dark" onclick="mostrarPreloader()">

                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.535a3.5 3.5 0 1 0 6.93 0h3.07a3.5 3.5 0 1 0 6.93 0H21a1 1 0 0 0 1-1v-4a.999.999 0 0 0-.106-.447l-2-4A1 1 0 0 0 19 6h-5a2 2 0 0 0-2-2H4Zm14.192 11.59.016.02a1.5 1.5 0 1 1-.016-.021Zm-10 0 .016.02a1.5 1.5 0 1 1-.016-.021Zm5.806-5.572v-2.02h4.396l1 2.02h-5.396Z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="ms-2 fs-6">Sistema de Transporte</span>

                                            </a>
                                        </div>

                                        <div class="d-flex d-none gap-3 flex-column mb-3">
                                            <a href="<?= env('URL_SISTEMA_RRHH', './') ?>" class="btn btn-lg btn-outline-dark" onclick="mostrarPreloader()">

                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="ms-2 fs-6"><!--Sistema de -->Talento Humano</span>

                                            </a>
                                        </div>

                                        <div class="d-flex d-none gap-3 flex-column">
                                            <a href="#" class="btn btn-lg btn-outline-dark" onclick="mostrarPreloader()">

                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="ms-2 fs-6">Atención al Ciudadano</span>

                                            </a>
                                        </div>

                                        <div class="d-flex gap-3 flex-column">
                                            <a href="<?= env('URL_SISTEMA_TECNOLOGIA', './')?>" class="btn btn-lg btn-outline-dark" onclick="mostrarPreloader()">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path d="M5.507 4.048A3 3 0 0 1 7.785 3h8.43a3 3 0 0 1 2.278 1.048l1.722 2.008A4.533 4.533 0 0 0 19.5 6h-15c-.243 0-.482.02-.715.056l1.722-2.008Z" />
                                                    <path fill-rule="evenodd" d="M1.5 10.5a3 3 0 0 1 3-3h15a3 3 0 1 1 0 6h-15a3 3 0 0 1-3-3Zm15 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm2.25.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM4.5 15a3 3 0 1 0 0 6h15a3 3 0 1 0 0-6h-15Zm11.25 3.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM19.5 18a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="ms-2 fs-6">Tecnología y Sistemas</span>

                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-flex align-items-center gradient-custom-2"
                             style="min-height: 70vh">
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

<!-- Footer Sticky -->
<footer class="text-center py-2 bg-light border-top fixed-bottom" style="z-index: 1;">
    <small class="text-muted">Desarrollado por Ing. Yonathan Castillo</small>
</footer>

<!-- Preloader -->
<div id="preloader"></div>

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
<script src="<?= asset('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

<script type="application/javascript">

    window.addEventListener('load', function () {
        // ocultar el preloader
        document.querySelector('#preloader').classList.add('d-none');
        // mostrar manuealmente el preloader
        window.mostrarPreloader = function () {
            const preloader = document.getElementById('preloader');
            if (preloader){
                preloader.classList.remove('d-none');
                /*setTimeout(function () {
                    preloader.classList.add('d-none');
                }, 2000)*/
            }
        }
    });

    //Validar Formularios
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
                } else {
                    //mostrarPreloader();
                }
                form.classList.add('was-validated');
            }, false);
        })
    })();
</script>

<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register("<?= asset('service-worker.js') ?>")
                .then(reg => console.log('✅ Service Worker registrado en:', reg.scope))
                .catch(err => console.error('⚠️ Error al registrar el Service Worker:', err));
        });
    }
</script>
</body>
</html>
