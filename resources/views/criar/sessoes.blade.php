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
    <title>Adicionar Sessões</title>
</head>
<body class="shop-detail-page">

    <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Cine <span class="tooplate-red">J</span><span class="tooplate-green"></span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto"> 
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="/">Home</a>
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

        
        <div id="event-create-container" class="col-md-6 offset-md-3">
            <h1 class="mt-5">Adicione Sessões: </h1>
            <form action="/sessoes" method="POST">
                @csrf
                <div>
                    <label for="data" class="mt-4" required>Data:</label>
                    <input type="date" class="form-control" id="data" name="data">
                </div>
                
                <div>
                <label class="mt-2" for="qnt_lugares">Filme: </label>
                <select class="form-control" name="filmes" id="filmes">
                    @foreach ($sessoes as $sessao)  
                    <option value=" {{ $sessao->nome }}">
                        <p> {{ $sessao->nome }}</p>
                    @endforeach
                </option>
            </select>
            </div>

            <input type="submit" value="Adicionar" class="btn btn-warning mt-3">
        </form>
    </div>
    
    
    @foreach ($sessoes as $sessao)
        <p>{{ $sessao->data }}</p>
        <p>{{ $sessao->filmes_id }}</p>
        <p>{{ $sessao->salas_id }}</p>
    @endforeach
    
    
    <footer class="site-footer section-padding mt-5">
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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>