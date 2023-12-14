<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>InnovarC</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </head>
    <body>
        <!-- Responsive navbar-->
        @include('include.header')
         <!--Content-->
    <div id="app">
        <main class="py-4">
     <!-- Page Content-->
            <div class="container px-4 px-lg-5">
                <!-- Heading Row-->
                <div class="row gx-4 gx-lg-5 align-items-center my-5">
                    <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="img/ImagenPreparate.png" alt="PrepáraT Herramienta de la UAM Cuajimalpa" /></div>
                    <div class="col-lg-5">
                        <h1 class="font-weight-light">InnovarC</h1>
                        <p>InnovarC es un abanico de oportunidades para capacitarse, adquirir y fortalecer habilidades tanto en lo personal como en lo profesional. </p>
                        <p class="text-end">
                    <!--    <a class="btn btn-outline-dark" href="#!">Regístrate</a>  -->
                        </p>
                    </div>
                </div>
                <!-- Call to Action-->
                <div class="card text-white bg-secondary my-5 py-4 text-center">
                    <div class="card-body">
                        <p class="text-white m-0"> 
                            CURSOS  
                        </p>
                    </div>
                </div>

               
                <div class="card text-white bg-secondary my-5 py-4 text-center">
                    <div class="card-body">
                        <p class="text-white m-0"> 
                            COLABORACIONES  
                        </p>
                    </div>
                </div>
                <!-- Content Row-->
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <div class="card-body">
                                <h2 class="card-title text-center">Postúlate como instructor</h2>
                                <img src="./img/portada/seleccion.jpeg" class="img-thumbnail"/>
                                <p class="card-text">Tú puedes formar parte de este proyecto de Educación Continua en la UAM Cuajimalpa. ¿Te animas a participar? Postúlate como instructor(a)*.</p>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#postulationModal">
                                Postúlate
                                </button>
                            </div>
                        </div>
                    </div>
                <!-- Modal para el formulario de postulación -->
                <div class="modal fade" id="postulationModal" tabindex="-1" aria-labelledby="postulationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="postulationModalLabel">Postulación como instructor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @include('prospect.form')
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <div class="card-body">
                                <h2 class="card-title text-center">Colaboración entre las Divisiones y Educación Continua</h2>
                                <img src="./img/portada/oferta-academica.jpeg" class="img-thumbnail"/>
                                <p class="card-text">Tu División y Educación Continua, conjuntamente, pueden colaborar en cursos o talleres a fin de enriquecer la formación continua</p>
                            </div>
                            <div class="card-footer text-end"><a class="btn btn-outline-dark btn-sm" href="https://www.cua.uam.mx/estudiar-en-la-uam-unidad-cuajimalpa">Ir al sitio</a></div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <div class="card-body">
                                <h2 class="card-title text-center">Programación extracurricular</h2>
                                <img src="./img/portada/blog_guía.jpg" class="img-thumbnail"/>
                                <p class="card-text">Desarrollo
                                </p>
                            </div>
                            <div class="card-footer text-end"><a class="btn btn-outline-dark btn-sm" href="https://www.admision.uam.mx/adm_guias.html">Ir al sitio</a></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Footer-->
        @include('include.footer')
        
    </body>
</html>