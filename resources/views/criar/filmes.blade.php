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
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        

    <title>Adicionar Filme</title>

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

                    @auth
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="/dashboard">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a class="nav-link click-scroll" href="/logout" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            Sair
                        </a>
                        </form>
                    </li>
                    @endauth

                    @guest
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="/login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="/register">Cadastrar-se</a>
                    </li>
                    @endguest

                    
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="abrir">
            
              <div class="modal fade ajax-modal" id="exempleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="ajaxForm">
                    {{-- @csrf --}}
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-title">Modal title</h5>
                      <button id="botaoFechar" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="filme_id" id="filme_id">
                      <div class="form-group mb-3">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control">
                        <span id="nameError" class="text-danger"></span>
                      </div>
                      <div class="form-group mb-1">
                          <label for="descricao">Sobre o filme:</label>
                          <textarea type="text" name="descricao" id="descricao" class="form-control"></textarea>
                          <span id="descricaoError" class="text-danger"></span>
                        </div>
                        <div class="form-group mb-1">
                            <label for="classificacao">Classificação de idade: </label>
                            <input type="number" name="classificacao" id="classificacao" class="form-control" >
                            <span id="classificacaoError" class="text-danger"></span>
                        </div>
                        <div class="form-group mb-1">
                          <label for="image" class="mt-4">Imagem do filme:</label>
                          <input type="file" class="form-control-file" id="image" name="image">
                          <span id="imageError" class="text-danger"></span>
                        </div>
            
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="saveBtn"></button>
                    </div>
                  </div>
                </div>
                </form>
              </div>
        </div>

          @auth
        <div>
            <div class="col-md-6 offset-3 d-flex justify-content-center">
                <a  class="btn btn-info mt-5"  data-toggle="modal" data-target="#exempleModal">Adicionar filme</a>    
            </div>
        </div>
        @endauth

        @auth
        <div class="row">
            <div class="col-md-6 offset-3" style="margin-top: 100px">
                <table id="filmeTable" class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Filme</th>
                        <th scope="col">Ações</th> 
                      </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  </table>
            </div>
        </div>
        @endauth
        
    
    <div id="filmes-container" class="col-md-12 mt-5 row flex-wrap  ">
        <h2 style="text-align: center; font-weight: 300; font-size: 5em">Filmes</h2>
        @if($filmes->isEmpty())
            <p class="d-flex justify-content-center mt-5">Não há nenhum filme cadastrado.</p>
        @else
            @foreach($filmes as $filme)
                <div class="card col-md-3 mt-5 ">
                    <img src="/img/filmes/{{ $filme->image }}" alt="{{ $filme->nome }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $filme->nome }}</h5>
                        <a href="" class="btn btn-danger"><b>{{ $filme->classificacao }}</b></a>
                        <p class="card-descricao">{{ $filme->descricao }}</p>
                        <a href="#" class="btn btn-primary">Saber mais</a>
                        <a href="#" class="btn btn-success">Reservar Ingresso</a>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    </div> 

    
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
    <script src="js/jquery.min.js"></script>
    <script src="{{ asset("/js/jquery-3.7.1.min.js") }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>


    <script src="js/bootstrap.min.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

    <script src="/js/script.js"></script>   

</body>
</html>