 <header class="navbar d-flex justify-content-between py-5">
            <ul class="d-flex justify-content-start align-items-center flex-row gap-3" style="list-style-type: none; color:white;font-weight:bolder;">
                <li>
                    <a href="{{url('/')}}" style="text-decoration:none; color:white;">
                        Página Inicial
                    </a>
                </li>
                <li>
                    Promoções
                </li>
                <li>
                    Categorias
                </li>
            </ul>
     <div class="d-flex flex-row align-items- gap-3">
         <div class="d-flex align-items-center gap-3 justify-content-end">
             <h6 class="text-white"> @if (Auth::user()) {{Auth::user()->name}} @else {{'Usuario não está logado'}} @endif</h6>
             @if (Auth::user())
                <a class="btn btn-primary" href="{{route('usuario.deslogar')}}">Sair</a>
             @else
                 <a class="btn btn-primary" href="{{route('usuario.logar')}}">Entrar</a>
             @endif
         </div>
         <div class="pe-2">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-bag-fill me-2" viewBox="0 0 16 16">
                 <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
             </svg>
             <input type="text" placeholder="PESQUISAR" class="rounded border-white">
             <a href="{{url('pesquisa')}}}">
                 <button class="btn btn-primary rounded" >PESQUISAR</button>
             </a>
         </div>
            </div>
 </header>

