<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aviators - byaviators.com">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="assets/libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="assets/libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="assets/libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/realia-red.css" type="text/css" id="color-variant-default">
    <link rel="stylesheet" href="#" type="text/css" id="color-variant">

    <title>Imóveis e Serviços</title>
</head>
<body>
<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
            <!-- BREADCRUMB -->
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <ul class="breadcrumb pull-left">
                                <li><a href="index.php">Inicio</a></li>
                            </ul><!-- /.breadcrumb -->

                            <div class="account pull-right">
                                <ul class="nav nav-pills">
                                    <li><a href="login.php">Entrar</a></li>
                                    <li><a href="registration.php">Registrar</a></li>
                                </ul>
                            </div>
                        </div><!-- /.span12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.breadcrumb-wrapper -->

            <!-- HEADER -->
            <div id="header-wrapper">
                <div id="header">
                    <div id="header-inner">
                        <div class="container">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="row">
                                        <div class="logo-wrapper span4">
                                            <a href="#nav" class="hidden-desktop" id="btn-nav">Menu de navegação</a>

                                            <div class="logo">
                                                <a href="#" title="Home">
                                                    <img src="assets/img/logo.png" alt="Home">
                                                </a>
                                            </div><!-- /.logo -->

                                            <div class="site-name">
                                                <a href="#" title="Home" class="brand"></a>
                                            </div><!-- /.site-name -->


                                        </div><!-- /.logo-wrapper -->

                                        <div class="info">
                                            <div class="site-email">
                                                <a href="mailto:contato@imoveiseservicos.com.br">contato@imoveiseservicos.com.br</a>
                                            </div><!-- /.site-email -->

                                            <div class="site-phone">
                                                <span>(41) 3282-9955 / 3556-3004</span>
                                            </div><!-- /.site-phone -->
                                        </div><!-- /.info -->

                                       
                                    </div><!-- /.row -->
                                </div><!-- /.navbar-inner -->
                            </div><!-- /.navbar -->
                        </div><!-- /.container -->
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->
            </div><!-- /#header-wrapper -->

            <!-- NAVIGATION -->
            <div id="navigation">
                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="navigation clearfix-normal">

                            <ul class="nav">
                                <li><a href="index.php">Principal</a></li>
                                
                                <li><a href="#">Imóveis</a></li>
                                
                                <li class="menuparent">
                                    <span class="menuparent nolink">Serviços</span>
                                    <ul>
                                        <li class="menuparent">
                                            <span class="menuparent nolink">Categoria</span>
                                            <ul>
                                                <li><a href="#">Serviço 1</a></li>
                                                <li><a href="#">Serviço 2</a></li>
                                                <li><a href="#">Serviço 3</a></li>
                                            </ul>
                                        </li> 
                                        <li class="menuparent">
                                            <span class="menuparent nolink">Categoria</span>
                                            <ul>
                                                <li><a href="#">Serviço 4</a></li>
                                                <li><a href="#">Serviço 5</a></li>
                                                <li><a href="#">Serviço 6</a></li>
                                            </ul>
                                        </li> 
                                        <li class="menuparent">
                                            <span class="menuparent nolink">Categoria</span>
                                            <ul>
                                                <li><a href="#">Serviço 7</a></li>
                                                <li><a href="#">Serviço 8</a></li>
                                                <li><a href="#">Serviço 9</a></li>
                                            </ul>
                                        </li> 
                                                                              
                                    </ul>
                                </li>
                                
                                <li><a href="#">Imobiliárias</a></li>
                                
                                <li><a href="#">Fornecedores</a></li>
                                
                                <li><a href="#">Anúncie</a></li>                               
                                
                                <li><a href="#">Contato</a></li>
                            </ul><!-- /.nav -->


                            <form method="get" class="site-search" action="http://html.realia.byaviators.com/index.html?">
                                <div class="input-append">
                                    <input title="Coloque o que deseja procurar." class="search-query span2 form-text" placeholder="Procurar" type="text" name="">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div><!-- /.input-append -->
                            </form><!-- /.site-search -->
                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->

            <!-- CONTENT -->
            <div id="content"><div class="map-wrapper">
    <div class="map">
        <div id="map" class="map-inner"></div><!-- /.map-inner -->

        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="property-filter pull-right">
                        <div class="content">
                            <form method="get" action="#">
                                <div class="location control-group">
                                    <label class="control-label" for="inputLocation">
                                        Cidade
                                    </label>
                                    <div class="controls">
                                        <select name="inputLocation">
                                        <option id="#">Abatia</option>
                                        <option id="#">Adrianopolis</option>
                                        <option id="#">Agudos do Sul</option>
                                        <option id="#">Almirante Tamandare</option>
                                        <option id="#">Altamira do Parana</option>
                                        <option id="#">Altania</option>
                                        <option id="#">Alto Parana</option>
                                        <option id="#">Alto Piquiri</option>
                                        <option id="#">Alvorada do Sul</option>
                                        <option id="#">Amapora</option>
                                        <option id="#">Ampere</option>
                                        <option id="#">Anahy</option>
                                        <option id="#">Andira</option>
                                        <option id="#">Angulo</option>
                                        <option id="#">Antonina</option>
                                        <option id="#">Antonio Olinto</option>
                                        <option id="#">Apucarana</option>
                                        <option id="#">Arapongas</option>
                                        <option id="#">Arapoti</option>
                                        <option id="#">Arapua</option>
                                        <option id="#">Araruna</option>
                                        <option id="#">Araucaria</option>
                                        <option id="#">Ariranha do Ivai</option>
                                        <option id="#">Assai</option>
                                        <option id="#">Assis Chateaubriand</option>
                                        <option id="#">Astorga</option>
                                        <option id="#">Atalaia</option>
                                        <option id="#">Balsa Nova</option>
                                        <option id="#">Bandeirantes</option>
                                        <option id="#">Barbosa Ferraz</option>
                                        <option id="#">Barra do Jacare</option>
                                        <option id="#">Barracao</option>
                                        <option id="#">Bela Vista da Caroba</option>
                                        <option id="#">Bela Vista do Paraiso</option>
                                        <option id="#">Bituruna</option>
                                        <option id="#">Boa Esperanca do Iguacu</option>
                                        <option id="#">Boa Esperanca</option>
                                        <option id="#">Boa Ventura de Sao Roque</option>
                                        <option id="#">Boa Vista da Aparecida</option>
                                        <option id="#">Bocaiuva do Sul</option>
                                        <option id="#">Bom Jesus do Sul</option>
                                        <option id="#">Bom Sucesso do Sul</option>
                                        <option id="#">Bom Sucesso</option>
                                        <option id="#">Borrazopolis</option>
                                        <option id="#">Braganey</option>
                                        <option id="#">Brasilandia do Sul</option>
                                        <option id="#">Cafeara</option>
                                        <option id="#">Cafelandia</option>
                                        <option id="#">Cafezal do Sul</option>
                                        <option id="#">California</option>
                                        <option id="#">Cambara</option>
                                        <option id="#">Cambe</option>
                                        <option id="#">Cambira</option>
                                        <option id="#">Campina Grande do Sul</option>
                                        <option id="#">Campina da Lagoa</option>
                                        <option id="#">Campina do Simao</option>
                                        <option id="#">Campo Bonito</option>
                                        <option id="#">Campo Largo</option>
                                        <option id="#">Campo Magro</option>
                                        <option id="#">Campo Mourao</option>
                                        <option id="#">Campo do Tenente</option>
                                        <option id="#">Candido de Abreu</option>
                                        <option id="#">Candoi</option>
                                        <option id="#">Cantagalo</option>
                                        <option id="#">Capanema</option>
                                        <option id="#">apitao Leonidas Marques</option>
                                        <option id="#">Carambei</option>
                                        <option id="#">Carlopolis</option>
                                        <option id="#">Cascavel</option>
                                        <option id="#">Castro</option>
                                        <option id="#">Catanduvas</option>
                                        <option id="#">Centenario do Sul</option>
                                        <option id="#">Cerro Azul</option>
                                        <option id="#">Ceu Azul</option>
                                        <option id="#">Chopinzinho</option>
                                        <option id="#">Cianorte</option>
                                        <option id="#">Cidade Gaucha</option>
                                        <option id="#">Clevelandia</option>
                                        <option id="#">Colombo</option>
                                        <option id="#">Colorado</option>
                                        <option id="#">Congonhinhas</option>
                                        <option id="#">Conselheiro Mairinck</option>
                                        <option id="#">Contenda</option>
                                        <option id="#">Corbelia</option>
                                        <option id="#">Cornelio Procopio</option>
                                        <option id="#">Coronel Domingos Soares</option>
                                        <option id="#">Coronel Vivida</option>
                                        <option id="#">Corumbatai do Sul</option>
                                        <option id="#">Cruz Machado</option>
                                        <option id="#">Cruzeiro do Iguacu</option>
                                        <option id="#">Cruzeiro do Oeste</option>
                                        <option id="#">Cruzeiro do Sul</option>
                                        <option id="#">Cruzmaltina</option>
                                        <option id="#">Curitiba</option>
                                        <option id="#">Curiuva</option>
                                        <option id="#">Diamante d'Oeste</option>
                                        <option id="#">Diamante do Norte</option>
                                        <option id="#">Diamante do Sul</option>
                                        <option id="#">Dois Vizinhos</option>
                                        <option id="#">Douradina</option>
                                        <option id="#">Doutor Camargo</option>
                                        <option id="#">Doutor Ulysses</option>
                                        <option id="#">Eneas Marques</option>
                                        <option id="#">Engenheiro Beltrao</option>
                                        <option id="#">Entre Rios do Oeste</option>
                                        <option id="#">Esperanca Nova</option>
                                        <option id="#">Espigao Alto do Iguacu</option>
                                        <option id="#">Farol</option>
                                        <option id="#">Faxinal</option>
                                        <option id="#">Fazenda Rio Grande</option>
                                        <option id="#">Fenix</option>
                                        <option id="#">Fernandes Pinheiro</option>
                                        <option id="#">Figueira</option>
                                        <option id="#">Flor da Serra do Sul</option>
                                        <option id="#">Florai</option>
                                        <option id="#">Floresta</option>
                                        <option id="#">Florestopolis</option>
                                        <option id="#">Florida</option>
                                        <option id="#">Formosa do Oeste</option>
                                        <option id="#">Foz do Iguacu</option>
                                        <option id="#">Foz do Jordao</option>
                                        <option id="#">Francisco Alves</option>
                                        <option id="#">Francisco Beltrao</option>
                                        <option id="#">General Carneiro</option>
                                        <option id="#">Godoy Moreira</option>
                                        <option id="#">Goioere</option>
                                        <option id="#">Goioxim</option>
                                        <option id="#">Grandes Rios</option>
                                        <option id="#">Guaira</option>
                                        <option id="#">Guairaca</option>
                                        <option id="#">Guamiranga</option>
                                        <option id="#">Guapirama</option>
                                        <option id="#">Guaporema</option>
                                        <option id="#">Guaraci</option>
                                        <option id="#">Guaraniacu</option>
                                        <option id="#">Guarapuava</option>
                                        <option id="#">Guaraquecaba</option>
                                        <option id="#">Guaratuba</option>
                                        <option id="#">Honorio Serpa</option>
                                        <option id="#">Ibaiti</option>
                                        <option id="#">Ibema</option>
                                        <option id="#">Ibipora</option>
                                        <option id="#">Icaraima</option>
                                        <option id="#">Iguaracu</option>
                                        <option id="#">Iguatu</option>
                                        <option id="#">Imbau</option>
                                        <option id="#">Imbituva</option>
                                        <option id="#">Inacio Martins</option>
                                        <option id="#">Inaja</option>
                                        <option id="#">Indianopolis</option>
                                        <option id="#">Ipiranga</option>
                                        <option id="#">Ipora</option>
                                        <option id="#">Iracema do Oeste</option>
                                        <option id="#">Irati</option>
                                        <option id="#">Iretama</option>
                                        <option id="#">Itaguaje</option>
                                        <option id="#">Itaipulandia</option>
                                        <option id="#">Itambaraca</option>
                                        <option id="#">Itambe</option>
                                        <option id="#">Itapejara d'Oeste</option>
                                        <option id="#">Itaperucu</option>
                                        <option id="#">Itauna do Sul</option>
                                        <option id="#">Ivai</option>
                                        <option id="#">Ivaipora</option>
                                        <option id="#">Ivate</option>
                                        <option id="#">Ivatuba</option>
                                        <option id="#">Jaboti</option>
                                        <option id="#">Jacarezinho</option>
                                        <option id="#">Jaguapita</option>
                                        <option id="#">Jaguariaiva</option>
                                        <option id="#">Jandaia do Sul</option>
                                        <option id="#">Janiopolis</option>
                                        <option id="#">Japira</option>
                                        <option id="#">Japura</option>
                                        <option id="#">Jardim Alegre</option>
                                        <option id="#">Jardim Olinda</option>
                                        <option id="#">Jataizinho</option>
                                        <option id="#">Jesuitas</option>
                                        <option id="#">Joaquim Tavora</option>
                                        <option id="#">Jundiai do Sul</option>
                                        <option id="#">Juranda</option>
                                        <option id="#">Jussara</option>
                                        <option id="#">Kalore</option>
                                        <option id="#">Lapa</option>
                                        <option id="#">Laranjal</option>
                                        <option id="#">Laranjeiras do Sul</option>
                                        <option id="#">Leopolis</option>
                                        <option id="#">Lidianopolis</option>
                                        <option id="#">Lindoeste</option>
                                        <option id="#">Loanda</option>
                                        <option id="#">Lobato</option>
                                        <option id="#">Londrina</option>
                                        <option id="#">Luiziana</option>
                                        <option id="#">Lunardelli</option>
                                        <option id="#">Lupionopolis</option>
                                        <option id="#">Mallet</option>
                                        <option id="#">Mambore</option>
                                        <option id="#">Mandaguacu</option>
                                        <option id="#">Mandaguari</option>
                                        <option id="#">Mandirituba</option>
                                        <option id="#">Manfrinopolis</option>
                                        <option id="#">Mangueirinha</option>
                                        <option id="#">Manoel Ribas</option>
                                        <option id="#">Marechal Candido Rondon</option>
                                        <option id="#">Maria Helena</option>
                                        <option id="#">Marialva</option>
                                        <option id="#">Marilandia do Sul</option>
                                        <option id="#">Marilena</option>
                                        <option id="#">Mariluz</option>
                                        <option id="#">Maringa</option>
                                        <option id="#">Mariopolis</option>
                                        <option id="#">Maripa</option>
                                        <option id="#">Marmeleiro</option>
                                        <option id="#">Marquinho</option>
                                        <option id="#">Marumbi</option>
                                        <option id="#">Matelandia</option>
                                        <option id="#">Matinhos</option>
                                        <option id="#">Mato Rico</option>
                                        <option id="#">Maua da Serra</option>
                                        <option id="#">Medianeira</option>
                                        <option id="#">Mercedes</option>
                                        <option id="#">Mirador</option>
                                        <option id="#">Miraselva</option>
                                        <option id="#">Missal</option>
                                        <option id="#">Moreira Sales</option>
                                        <option id="#">Morretes</option>
                                        <option id="#">Munhoz de Melo</option>
                                        <option id="#">Nossa Senhora das Gracas</option>
                                        <option id="#">Nova Alianca do Ivai</option>
                                        <option id="#">Nova America da Colina</option>
                                        <option id="#">Nova Aurora</option>
                                        <option id="#">Nova Cantu</option>
                                        <option id="#">Nova Esperanca do Sudoeste</option>
                                        <option id="#">Nova Esperanca</option>
                                        <option id="#">Nova Fatima</option>
                                        <option id="#">Nova Laranjeiras</option>
                                        <option id="#">Nova Londrina</option>
                                        <option id="#">Nova Olimpia</option>
                                        <option id="#">Nova Prata do Iguacu</option>
                                        <option id="#">Nova Santa Barbara</option>
                                        <option id="#">Nova Santa Rosa</option>
                                        <option id="#">Nova Tebas</option>
                                        <option id="#">Novo Itacolomi</option>
                                        <option id="#">Ortigueira</option>
                                        <option id="#">Ourizona</option>
                                        <option id="#">Ouro Verde do Oeste</option>
                                        <option id="#">Paicandu</option>
                                        <option id="#">Palmas</option>
                                        <option id="#">Palmeira</option>
                                        <option id="#">Palmital</option>
                                        <option id="#">Palotina</option>
                                        <option id="#">Paraiso do Norte</option>
                                        <option id="#">Paranacity</option>
                                        <option id="#">Paranagua</option>
                                        <option id="#">Paranapoema</option>
                                        <option id="#">Paranavai</option>
                                        <option id="#">Pato Bragado</option>
                                        <option id="#">Pato Branco</option>
                                        <option id="#">Paula Freitas</option>
                                        <option id="#">Paulo Frontin</option>
                                        <option id="#">Peabiru</option>
                                        <option id="#">Perobal</option>
                                        <option id="#">Perola d'Oeste</option>
                                        <option id="#">Perola</option>
                                        <option id="#">Pien</option>
                                        <option id="#">Pinhais</option>
                                        <option id="#">Pinhal de Sao Bento</option>
                                        <option id="#">Pinhalao</option>
                                        <option id="#">Pinhao</option>
                                        <option id="#">Pirai do Sul</option>
                                        <option id="#">Piraquara</option>
                                        <option id="#">Pitanga</option>
                                        <option id="#">Pitangueiras</option>
                                        <option id="#">Planaltina do Parana</option>
                                        <option id="#">Planalto</option>
                                        <option id="#">Ponta Grossa</option>
                                        <option id="#">Pontal do Parana</option>
                                        <option id="#">Porecatu</option>
                                        <option id="#">Porto Amazonas</option>
                                        <option id="#">Porto Barreiro</option>
                                        <option id="#">Porto Rico</option>
                                        <option id="#">Porto Vitoria</option>
                                        <option id="#">Prado Ferreira</option>
                                        <option id="#">Pranchita</option>
                                        <option id="#">Presidente Castelo Branco</option>
                                        <option id="#">Primeiro de Maio</option>
                                        <option id="#">Prudentopolis</option>
                                        <option id="#">Quarto Centenario</option>
                                        <option id="#">Quatigua</option>
                                        <option id="#">Quatro Barras</option>
                                        <option id="#">Quatro Pontes</option>
                                        <option id="#">Quedas do Iguacu</option>
                                        <option id="#">Querencia do Norte</option>
                                        <option id="#">Quinta do Sol</option>
                                        <option id="#">Quitandinha</option>
                                        <option id="#">Ramilandia</option>
                                        <option id="#">Rancho Alegre d'Oeste</option>
                                        <option id="#">Rancho Alegre</option>
                                        <option id="#">Realeza</option>
                                        <option id="#">Reboucas</option>
                                        <option id="#">Renascenca</option>
                                        <option id="#">Reserva do Iguacu</option>
                                        <option id="#">Reserva</option>
                                        <option id="#">Ribeirao Claro</option>
                                        <option id="#">Ribeirao do Pinhal</option>
                                        <option id="#">Rio Azul</option>
                                        <option id="#">Rio Bom</option>
                                        <option id="#">Rio Bonito do Iguacu</option>
                                        <option id="#">Rio Branco do Ivai</option>
                                        <option id="#">Rio Branco do Sul</option>
                                        <option id="#">Rio Negro</option>
                                        <option id="#">Rolandia</option>
                                        <option id="#">Roncador</option>
                                        <option id="#">Rondon</option>
                                        <option id="#">Rosario do Ivai</option>
                                        <option id="#">Sabaudia</option>
                                        <option id="#">Salgado Filho</option>
                                        <option id="#">Salto do Itarare</option>
                                        <option id="#">Salto do Lontra</option>
                                        <option id="#">Santa Amelia</option>
                                        <option id="#">Santa Cecilia do Pavao</option>
                                        <option id="#">Santa Cruz de Monte Castelo</option>
                                        <option id="#">Santa Fe</option>
                                        <option id="#">Santa Helena</option>
                                        <option id="#">Santa Ines</option>
                                        <option id="#">Santa Isabel do Ivai</option>
                                        <option id="#">Santa Izabel do Oeste</option>
                                        <option id="#">Santa Lucia</option>
                                        <option id="#">Santa Maria do Oeste</option>
                                        <option id="#">Santa Mariana</option>
                                        <option id="#">Santa Monica</option>
                                        <option id="#">Santa Tereza do Oeste</option>
                                        <option id="#">Santa Terezinha de Itaipu</option>
                                        <option id="#">Santana do Itarare</option>
                                        <option id="#">Santo Antonio da Platina</option>
                                        <option id="#">Santo Antonio do Caiua</option>
                                        <option id="#">Santo Antonio do Paraiso</option>
                                        <option id="#">Santo Antonio do Sudoeste</option>
                                        <option id="#">Santo Inacio</option>
                                        <option id="#">Sao Carlos do Ivai</option>
                                        <option id="#">Sao Jeronimo da Serra</option>
                                        <option id="#">Sao Joao do Caiua</option>
                                        <option id="#">Sao Joao do Ivai</option>
                                        <option id="#">Sao Joao do Triunfo</option>
                                        <option id="#">Sao Joao</option>
                                        <option id="#">Sao Jorge d'Oeste</option>
                                        <option id="#">Sao Jorge do Ivai</option>
                                        <option id="#">Sao Jorge do Patrocinio</option>
                                        <option id="#">Sao Jose da Boa Vista</option>
                                        <option id="#">Sao Jose das Palmeiras</option>
                                        <option id="#">Sao Jose dos Pinhais</option>
                                        <option id="#">Sao Manoel do Parana</option>
                                        <option id="#">Sao Mateus do Sul</option>
                                        <option id="#">Sao Miguel do Iguacu</option>
                                        <option id="#">Sao Pedro do Iguacu</option>
                                        <option id="#">Sao Pedro do Ivai</option>
                                        <option id="#">Sao Pedro do Parana</option>
                                        <option id="#">Sao Sebastiao da Amoreira</option>
                                        <option id="#">Sao Tome</option>
                                        <option id="#">Sapopema</option>
                                        <option id="#">Sarandi</option>
                                        <option id="#">Saudade do Iguacu</option>
                                        <option id="#">Senges</option>
                                        <option id="#">Serranopolis do Iguacu</option>
                                        <option id="#">Sertaneja</option>
                                        <option id="#">Sertanopolis</option>
                                        <option id="#">Siqueira Campos</option>
                                        <option id="#">Sulina</option>
                                        <option id="#">Tamarana</option>
                                        <option id="#">Tamboara</option>
                                        <option id="#">Tapejara</option>
                                        <option id="#">Tapira</option>
                                        <option id="#">Teixeira Soares</option>
                                        <option id="#">Telemaco Borba</option>
                                        <option id="#">Terra Boa</option>
                                        <option id="#">Terra Rica</option>
                                        <option id="#">Terra Roxa</option>
                                        <option id="#">Tibagi</option>
                                        <option id="#">Tijucas do Sul</option>
                                        <option id="#">Toledo</option>
                                        <option id="#">Tomazina</option>
                                        <option id="#">Tres Barras do Parana</option>
                                        <option id="#">Tunas do Parana</option>
                                        <option id="#">Tuneiras do Oeste</option>
                                        <option id="#">Tupassi</option>
                                        <option id="#">Turvo</option>
                                        <option id="#">Ubirata</option>
                                        <option id="#">Umuarama</option>
                                        <option id="#">Uniao da Vitoria</option>
                                        <option id="#">Uniflor</option>
                                        <option id="#">Urai</option>
                                        <option id="#">Ventania</option>
                                        <option id="#">Vera Cruz do Oeste</option>
                                        <option id="#">Vere</option>
                                        <option id="#">Vila Alta</option>
                                        <option id="#">Virmond</option>
                                        <option id="#">Vitorino</option>
                                        <option id="#">Wenceslau Braz</option>
                                        <option id="#">Xambre</option>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->
                                
                                <div class="location control-group">
                                    <label class="control-label" for="inputLocation">
                                        Região
                                    </label>
                                    <div class="controls">
                                        <select name="inputLocation">
                                        <option>Centro</option>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="type control-group">
                                    <label class="control-label" for="inputType">
                                        O que você procura?
                                    </label>
                                    <div class="controls">
                                        <select id="inputType">
                                        	<optgroup label="&#8212; Serviços &#8212;  ">
                                            <option id="#">Construção Civil</option>
                                            <option id="#">Materiais Construção</option>
                                            <option id="#">Pintura e tintas</option>
                                            <option id="#">Serralheria</option>
                                            <option id="#">Metalúrgica</option>
                                            
                                            <optgroup label="&#8212; Imóveis &#8212;">
                                            <option id="#">Apartamento</option>
                                            <option id="#">Casa/Sobrado</option>
                                            <option id="#">Terreno</option>
                                            <option id="#">Rural</option>
                                            <option id="#">Comercial</option>
                                            <option id="#">Condomínio</option>
                                            
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="beds control-group">
                                    
                                </div><!-- /.control-group -->


                                <div class="rent control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="inputRent">
                                            <input type="checkbox" id="inputRent"> Comprar
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="sale control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="inputSale">
                                            <input type="checkbox" id="inputSale"> Alugar
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->
                                

                                <div class="price-from control-group">
                                    <label class="control-label" for="inputPriceFrom">
                                        Valor Mínimo
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="inputPriceFrom" name="inputPriceFrom">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-to control-group">
                                    <label class="control-label" for="inputPriceTo">
                                        Valor Máximo
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="inputPriceTo" name="inputPriceTo">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-value">
                                    <span class="from"></span><!-- /.from -->
                                    -
                                    <span class="to"></span><!-- /.to -->
                                </div><!-- /.price-value -->

                                <div class="price-slider">
                                </div><!-- /.price-slider -->

                                <div class="form-actions">
                                    <input type="submit" value="Buscar !" class="btn btn-primary btn-large">
                                </div><!-- /.form-actions -->
                            </form>
                        </div><!-- /.content -->
                    </div><!-- /.property-filter -->
                </div><!-- /.span3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.map -->
</div><!-- /.map-wrapper -->
<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header">Imobiliárias</h1>
                <div class="properties-grid">
    <div class="row">
        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-1.png" alt="">
                </div><!-- /.content -->

               <!-- <div class="price">R$ 1.250.000</div><!-- /.price -->

     <!--          <div class="reduced">Destaque </div>  -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="#">Aroveda Imobiliária</a></h2>
            </div><!-- /.title -->

            <div class="location">Avenida Silva Jardim, nº 2042, conj. 705 - Batel</div><!-- /.location -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-2.png" alt="">
                </div><!-- /.content -->
               <!-- <div class="price">R$ 1.250.000</div><!-- /.price -->

     <!--          <div class="reduced">Destaque </div>  -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="#">Absoluto Imóveis</a></h2>
            </div><!-- /.title -->

            <div class="location">Estrada da Ilha</div><!-- /.location -->
            <div class="area">
            </div><!-- /.area -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-3.png" alt="">
                </div><!-- /.content -->

               <!-- <div class="price">R$ 1.250.000</div><!-- /.price -->

     <!--          <div class="reduced">Destaque </div>  -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="#">AC2 Assessoria Imobiliária</a></h2>
            </div><!-- /.title -->

            <div class="location">R. Luiz Renato Mocelin, 37 s 1 - Xaxim</div><!-- /.location -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-4.png" alt="">
                </div><!-- /.content -->
               <!-- <div class="price">R$ 1.250.000</div><!-- /.price -->

     <!--          <div class="reduced">Destaque </div>  -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="#">Ademimóveis Imobiliária</a></h2>
            </div><!-- /.title -->

            <div class="location">R. Filipinas, 536 sobreloja - Cajuru</div><!-- /.location -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-5.png" alt="">
                </div><!-- /.content -->

               <!-- <div class="price">R$ 1.250.000</div><!-- /.price -->

     <!--          <div class="reduced">Destaque </div>  -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="#">Ágape Imóveis</a></h2>
            </div><!-- /.title -->

            <div class="location">Av. Cândido de Abreu, 526 Cj. 506 B</div><!-- /.location -->
        </div><!-- /.property -->

        <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-6.png" alt="">
                </div><!-- /.content -->

               <!-- <div class="price">R$ 1.250.000</div><!-- /.price -->

     <!--          <div class="reduced">Destaque </div>  -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="#">Alceu Junior Corretor</a></h2>
            </div><!-- /.title -->

            <div class="location">R. Cel Hugo de Mattos Moura, 18 - Alto </div><!-- /.location -->
        </div><!-- /.property -->
    </div><!-- /.row -->
</div><!-- /.properties-grid -->
            </div>
            <div class="sidebar span3">
                
                <div class="hidden-tablet">
                    <div class="widget properties last">
    <div class="title">
        <h2>Serviços Ofertados</h2>
    </div><!-- /.title -->

    <div class="content">
        <div class="property">
            <div class="image">
                <a href="#"></a>
                <img src="assets/img/servicos/property-small-4.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="#">Global Pinturas</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">R. Cel Hugo de Mattos Moura, 18</div><!-- /.location -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->

        <div class="property">
            <div class="image">
                <a href="#"></a>
                <img src="assets/img/servicos/property-small-5.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="#">Vini Color</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">R. Cel Hugo de Mattos Moura, 18</div><!-- /.location -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->

        <div class="property">
            <div class="image">
                <a href="#"></a>
                <img src="assets/img/servicos/property-small-6.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="#">MS Arquitetura</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">R. Cel Hugo de Mattos Moura, 18</div><!-- /.location -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->

        <div class="property">
            <div class="image">
                <a href="#"></a>
                <img src="assets/img/servicos/property-small-2.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="#">Artes Belas Serralheria</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">R. Cel Hugo de Mattos Moura, 18</div><!-- /.location -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->
        
                <div class="property">
            <div class="image">
                <a href="#"></a>
                <img src="assets/img/servicos/property-small-7.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="#">27523 Pacific Coast</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">R. Cel Hugo de Mattos Moura, 18</div><!-- /.location -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->
        
                <div class="property">
            <div class="image">
                <a href="#"></a>
                <img src="assets/img/servicos/property-small-1.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="#">ReforPredi Manutenção</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">R. Cel Hugo de Mattos Moura, 18</div><!-- /.location -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->
        
                <div class="property">
            <div class="image">
                <a href="#"></a>
                <img src="assets/img/servicos/property-small-2.png" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="#">27523 Pacific Coast</a>
                    </h3>
                </div><!-- /.title -->
                <div class="location">R. Cel Hugo de Mattos Moura, 18</div><!-- /.location -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->
    </div><!-- /.content -->
</div><!-- /.properties -->
                </div>
            </div>
        </div>
        <div class="carousel">
    <h2 class="page-header">Anúncios em Destaque</h2>

    <div class="content">
        <a class="carousel-prev" href="#">Previous</a>
        <a class="carousel-next" href="#">Next</a>
        <ul>
            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-1.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>
            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-2.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-3.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-4.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-5.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-6.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-1.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-2.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-3.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>

            <li>
                <div class="image">
                    <a href="#"></a>
                    <img src="assets/img/tmp/property-small-4.png" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="#">27523 Pacific Coast</a></h3>
                </div><!-- /.title -->
                <div class="location">Palo Alto CA</div><!-- /.location-->
                <div class="price">R$ 2.300.000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value">750m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"><div class="inner">3</div></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner">3</div></div><!-- /.bedrooms -->
            </li>
        </ul>
    </div><!-- /.content -->
</div><!-- /.carousel -->        

   </div>
</div>

<div class="bottom-wrapper">
    <div class="bottom container">
        <div class="bottom-inner row">
            <div class="item span4">
                <div class="address decoration"></div>
                <h2><a>Anúncie</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet rhoncus. Aenean vitae imperdiet lectus</p>
                <a href="#" class="btn btn-primary">Saiba mais</a>
            </div><!-- /.item -->

            <div class="item span4">
                <div class="gps decoration"></div>
                <h2><a>Encontre com facilidade</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet rhoncus. Aenean vitae imperdiet lectus</p>
                <a href="#" class="btn btn-primary">Saiba mais</a>
            </div><!-- /.item -->

            <div class="item span4">
                <div class="key decoration"></div>
                <h2><a>Imóvel ou serviço</a></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan dui ac nunc imperdiet rhoncus. Aenean vitae imperdiet lectus</p>
                <a href="#" class="btn btn-primary">Saiba mais</a>
            </div><!-- /.item -->
        </div><!-- /.bottom-inner -->
    </div><!-- /.bottom -->
</div><!-- /.bottom-wrapper -->    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->

<div id="footer-wrapper">
    <div id="footer-top">
        <div id="footer-top-inner" class="container">
            <div class="row">
                

                <div class="widget span3" style="width: 30%">
                    <div class="title">
                        <h2>Informações</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <table class="contact">
                            <tbody>
                            <tr>
                                <th class="address">Endereço:</th>
                                  <td>Rua Izabel a Redentora, n° 1050 - São José dos Pinhais, Centro<br>Paraná<br></td>
                            </tr>
                            <tr>
                                <th class="phone">Telefone:</th>
                                <td>(41) 3282-9955 <br>(41) 3556-3004</td>
                            </tr>
                            <tr>
                                <th class="email">E-mail:</th>
                                <td><a href="mailto:contato@imoveiseservicos.com.br">contato@imoveiseservicos.com.br</a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3" >
                    <div class="title">
                        <h2 class="block-title">Menu</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="#">Principal</a></li>
                            <li class="leaf"><a href="#">Imóveis</a></li>
                            <li class="leaf"><a href="#">Serviços</a></li>
                            <li class="leaf"><a href="#">Imobiliárias</a></li>
                            <li class="leaf"><a href="#">Anúncie</a></li>
                            <li class="leaf"><a href="#">Contato</a></li>
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
                <div class="widget properties span3" style="width: 35%;">
                    <div class="title">
                        <h2>Localização</h2>
                    </div><!-- /.title -->

                    <div class="content">
                       <iframe width="425" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?q=rua+izabel+a+redentora+1050+centro+s%C3%A3o+jos%C3%A9+dos+pinhais&amp;ie=UTF8&amp;hq=&amp;hnear=Rua+Dona+Izabel+A+Redentora,+1050+-+Silveira+da+Motta,+Paran%C3%A1&amp;t=m&amp;ll=-25.523931,-49.204245&amp;spn=0.027109,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
                          
                    </div><!-- /.content -->
                </div><!-- /.properties-small -->

                
            </div><!-- /.row -->
        </div><!-- /#footer-top-inner -->
    </div><!-- /#footer-top -->

    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>Desenvolvido por <a href="http://www.opisystem.com.br">OPI SYSTEM</a> © 2013 | Todos os direitos reservados.</p>
                </div><!-- /.copyright -->

                <div class="span6 share">
                    <div class="content">
                        <ul class="menu nav">
                             <!--
                            <li class="first leaf"><a href="http://www.facebook.com/" class="facebook">Facebook</a></li>
                            <li class="leaf"><a href="http://flickr.net/" class="flickr">Flickr</a></li>
                            <li class="leaf"><a href="http://plus.google.com/" class="google">Google+</a></li>
                            <li class="leaf"><a href="http://www.linkedin.com/" class="linkedin">LinkedIn</a></li>
                            -->
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.span6 -->
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->
</div><!-- /#wrapper-outer -->



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="assets/js/jquery.currency.js"></script>
<script type="text/javascript" src="assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/retina.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/carousel.js"></script>
<script type="text/javascript" src="assets/js/gmap3.min.js"></script>
<script type="text/javascript" src="assets/js/gmap3.infobox.min.js"></script>
<script type="text/javascript" src="assets/libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="assets/libraries/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="assets/libraries/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="assets/js/realia.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40414414-1', 'byaviators.com');
  ga('send', 'pageview');

</script>
</body>
</html>
