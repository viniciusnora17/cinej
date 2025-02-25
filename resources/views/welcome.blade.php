<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/tooplate-moso-interior.css">
   
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <title>Cine J</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg ">
        <div class="container">
            <a class="navbar-brand" href="/">Cine <span class="tooplate-red">J</span><span class="tooplate-green"></span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto "> 
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="/criar/filmes">
                        Filmes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="/criar/salas">
                        Salas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Cadastrar-se</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main>

    
        <section class="hero-section hero-slide d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 text-center mx-auto">
                        <div class="hero-section-text">

                            <h1 class="hero-title text-white mt-2 mb-4">Procure filmes no cartaz</h1>

                            <form class="custom-form hero-form" action="#" method="get" role="form">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 col-12">
                                        <div class="input-group align-items-center">
                                            <label for="product-name">Filmes</label>

                                            <input type="text" name="search" id="input-filmes" class="form-control" placeholder="Procurar filmes..." required="">
                                        </div>
                                    </div>

                                

                                    <div class="col-lg-2 col-md-6 col-12">
                                        <button type="submit" class="form-control">Buscar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>




        <section class="contact-section" id="section_5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f9f9f9" fill-opacity="1" d="M0,96L40,117.3C80,139,160,181,240,186.7C320,192,400,160,480,149.3C560,139,640,149,720,176C800,203,880,245,960,250.7C1040,256,1120,224,1200,229.3C1280,235,1360,277,1400,298.7L1440,320L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <small class="section-small-title">Faça alguma pergunta.</small>

                        <h2 class="mb-4">Entre em contato</h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <form class="custom-form contact-form" action="#" method="post" role="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group align-items-center">
                                        <label for="first-name">Primeiro Nome</label>

                                        <input type="text" name="first-name" id="first-name" class="form-control" placeholder="Julia" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group align-items-center">
                                        <label for="last-name">Último Nome</label>

                                        <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Padilha" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="input-group align-items-center">
                                <label for="email">E-mail</label>

                                 <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="jupadilha@gmail.com" required="">
                            </div>

                            <div class="input-group textarea-group">
                                <label for="message">Mensagem</label>

                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Como podemos te ajudar?"></textarea>
                            </div>

                            <div class="col-lg-3 col-md-4 col-6">
                                <button type="submit" class="form-control">Enviar</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                        <div class="custom-block">

                            <h3 class="text-white mb-2">Localização</h3>

                            <p class="text-white mb-2">
                                

                                Av. Dona Gertrudes, 202, São João da Boa Vista, Brasil
                            </p>

                            <h3 class="text-white mt-3 mb-2">Contato</h3>

                            <div class="d-flex flex-wrap">
                                <p class="text-white mb-2 me-4">
                                    

                                    <a href="tel: 090-080-0760" class="text-white">
                                        19 9999-9999    
                                    </a>
                                </p>

                                <p class="text-white">
                                    

                                    <a href="mailto:info@company.com" class="text-white">
                                        cinej@contato.com
                                    </a>
                                </p>
                            </div>

                        
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#36363e" fill-opacity="1" d="M0,96L40,117.3C80,139,160,181,240,186.7C320,192,400,160,480,149.3C560,139,640,149,720,176C800,203,880,245,960,250.7C1040,256,1120,224,1200,229.3C1280,235,1360,277,1400,298.7L1440,320L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>            
    </main>

    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-5 col-12 mb-3">
                    <h3><a href="index.html" class="custom-link mb-1">CineJ</a></h3>

                    <p class="text-white">Desde 1986, Melhor conforto para assistir filmes exclusivos!</p>
                    
                    <p class="text-white"><a href="https://www.tooplate.com" target="_parent">Web Design: Vinicius Nora</a></p>
                </div>

                <div class="col-lg-3 col-md-3 col-12 ms-lg-auto mb-3">
                    <h3 class="text-white mb-3">Localização</h3>

                    <p class="text-white mt-2">
                        
                        São João da Boa Vista, Brasil
                    </p>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mb-3">
                    <h3 class="text-white mb-3">Contato</h3>

                        <p class="text-white mb-1">
                            

                            <a href="tel: 090-080-0760" class="text-white">
                                19 9999-9999
                            </a>
                        </p>

                        <p class="text-white mb-0">
                            

                            <a href="mailto:info@company.com" class="text-white">
                                cinej@contato.com
                            </a>
                        </p>
                </div>

                <div class="col-lg-6 col-md-7 copyright-text-wrap col-12 d-flex flex-wrap align-items-center mt-4 ms-auto">
                    <p class="copyright-text mb-0 me-4">Copyright © CineJ</p>

                    
                </div>

            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>


</body>
</html>