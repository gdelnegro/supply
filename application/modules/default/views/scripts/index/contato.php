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
    <link rel="stylesheet" href="#" type="text/css" id="color-variant" >

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
                                
                                <li><a href="imoveis.php">Imóveis</a></li>
                                
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


                            <form method="get" class="site-search" action="index.php">
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
                                         <option id="Abatia">Abatia</option>

                                        <option id="Adrianopolis">Adrianopolis</option>

                                        <option id="Agudos do Sul">Agudos do Sul</option>

                                        <option id="Almirante Tamandare">Almirante Tamandare</option>

                                        <option id="Altamira do Parana">Altamira do Parana</option>

                                        <option id="Altania">Altania</option>

                                        <option id="Alto Parana">Alto Parana</option>

                                        <option id="Alto Piquiri">Alto Piquiri</option>

                                        <option id="Alvorada do Sul">Alvorada do Sul</option>

                                        <option id="Amapora">Amapora</option>

                                        <option id="Ampere">Ampere</option>

                                        <option id="Anahy">Anahy</option>

                                        <option id="Andira">Andira</option>

                                        <option id="Angulo">Angulo</option>

                                        <option id="Antonina">Antonina</option>

                                        <option id="Antonio Olinto">Antonio Olinto</option>

                                        <option id="Apucarana">Apucarana</option>

                                        <option id="Arapongas">Arapongas</option>

                                        <option id="Arapoti">Arapoti</option>

                                        <option id="Arapua">Arapua</option>

                                        <option id="Araruna">Araruna</option>

                                        <option id="Araucaria">Araucaria</option>

                                        <option id="Ariranha do Iva">Ariranha do Ivai</option>

                                        <option id="Assai">Assai</option>

                                        <option id="Assis Chateaubriand">Assis Chateaubriand</option>

                                        <option id="Astorga">Astorga</option>

                                        <option id="Atalaia">Atalaia</option>

                                        <option id="Balsa Nova">Balsa Nova</option>

                                        <option id="Bandeirantes">Bandeirantes</option>

                                        <option id="Barbosa Ferra">Barbosa Ferraz</option>

                                        <option id="Barra do Jacare">Barra do Jacare</option>

                                        <option id="Barracao">Barracao</option>

                                        <option id="Bela Vista da Caroba">Bela Vista da Caroba</option>

                                        <option id="Bela Vista do Paraiso">Bela Vista do Paraiso</option>

                                        <option id="Bituruna">Bituruna</option>

                                        <option id="Boa Esperanca do Iguacu">Boa Esperanca do Iguacu</option>

                                        <option id="Boa Esperanca">Boa Esperanca</option>

                                        <option id="Boa Ventura de Sao Roque">Boa Ventura de Sao Roque</option>

                                        <option id="Boa Vista da Aparecida">Boa Vista da Aparecida</option>

                                        <option id="Bocaiuva do Sul">Bocaiuva do Sul</option>

                                        <option id="Bom Jesus do Sul">Bom Jesus do Sul</option>

                                        <option id="Bom Sucesso do Su">Bom Sucesso do Sul</option>

                                        <option id="Bom Sucesso">Bom Sucesso</option>

                                        <option id="Borrazopolis">Borrazopolis</option>

                                        <option id="Braganey">Braganey</option>

                                        <option id="Brasilandia do Sul">Brasilandia do Sul</option>

                                        <option id="Cafeara">Cafeara</option>

                                        <option id="Cafelandia">Cafelandia</option>

                                        <option id="Cafezal do Sul">Cafezal do Sul</option>

                                        <option id="California">California</option>

                                        <option id="Cambara">Cambara</option>

                                        <option id="Cambe">Cambe</option>

                                        <option id="Cambira">Cambira</option>

                                        <option id="Campina Grande do Sul">Campina Grande do Sul</option>

                                        <option id="Campina da Lagoa">Campina da Lagoa</option>

                                        <option id="Campina do Simao">Campina do Simao</option>

                                        <option id="Campo Bonito">Campo Bonito</option>

                                        <option id="Campo Largo">Campo Largo</option>

                                        <option id="Campo Magro">Campo Magro</option>

                                        <option id="Campo Mourao">Campo Mourao</option>

                                        <option id="Campo do Tenente">Campo do Tenente</option>

                                        <option id="Candido de Abreu">Candido de Abreu</option>

                                        <option id="Candoi">Candoi</option>

                                        <option id="Cantagalo">Cantagalo</option>

                                        <option id="Capanema">Capanema</option>

                                        <option id="apitao Leonidas Marques">apitao Leonidas Marques</option>

                                        <option id="Carambei">Carambei</option>

                                        <option id="Carlopolis">Carlopolis</option>

                                        <option id="Cascavel">Cascavel</option>

                                        <option id="Castro">Castro</option>

                                        <option id="Catanduvas">Catanduvas</option>

                                        <option id="Centenario do Sul">Centenario do Sul</option>

                                        <option id="Cerro Azul">Cerro Azul</option>

                                        <option id="Ceu Azul">Ceu Azul</option>

                                        <option id="Chopinzinho">Chopinzinho</option>

                                        <option id="Cianorte">Cianorte</option>

                                        <option id="Cidade Gaucha">Cidade Gaucha</option>

                                        <option id="Clevelandia">Clevelandia</option>

                                        <option id="Colombo">Colombo</option>

                                        <option id="Colorado">Colorado</option>

                                        <option id="Congonhinhas">Congonhinhas</option>

                                        <option id="Conselheiro Mairinck">Conselheiro Mairinck</option>

                                        <option id="Contenda">Contenda</option>

                                        <option id="Corbelia">Corbelia</option>

                                        <option id="Cornelio Procopio">Cornelio Procopio</option>

                                        <option id="Coronel Domingos Soares#">Coronel Domingos Soares</option>

                                        <option id="Coronel Vivida">Coronel Vivida</option>

                                        <option id="Corumbatai do Sul">Corumbatai do Sul</option>

                                        <option id="Cruz Machado">Cruz Machado</option>

                                        <option id="Cruzeiro do Iguacu">Cruzeiro do Iguacu</option>

                                        <option id="Cruzeiro do Oeste">Cruzeiro do Oeste</option>

                                        <option id="Cruzeiro do Sul">Cruzeiro do Sul</option>

                                        <option id="Cruzmaltina">Cruzmaltina</option>

                                        <option id="Curitiba">Curitiba</option>

                                        <option id="Curiuva">Curiuva</option>

                                        <option id="Diamante do Oeste">Diamante d'Oeste</option>

                                        <option id="Diamante do Norte">Diamante do Norte</option>

                                        <option id="Diamante do Sul">Diamante do Sul</option>

                                        <option id="Dois Vizinhos">Dois Vizinhos</option>

                                        <option id="Douradina">Douradina</option>

                                        <option id="Doutor Camargo">Doutor Camargo</option>

                                        <option id="Doutor Ulysses">Doutor Ulysses</option>

                                        <option id="Eneas Marques">Eneas Marques</option>

                                        <option id="Engenheiro Beltrao">Engenheiro Beltrao</option>

                                        <option id="Entre Rios do Oeste">Entre Rios do Oeste</option>

                                        <option id="Esperanca Nova">Esperanca Nova</option>

                                        <option id="Espigao Alto do Iguacu">Espigao Alto do Iguacu</option>

                                        <option id="Farol">Farol</option>

                                        <option id="Faxinal">Faxinal</option>

                                        <option id="Fazenda Rio Grande">Fazenda Rio Grande</option>

                                        <option id="Fenix">Fenix</option>

                                        <option id="Fernandes Pinheiro">Fernandes Pinheiro</option>

                                        <option id="Figueira">Figueira</option>

                                        <option id="Flor da Serra do Sul">Flor da Serra do Sul</option>

                                        <option id="Florai">Florai</option>

                                        <option id="Floresta">Floresta</option>

                                        <option id="Florestopolis">Florestopolis</option>

                                        <option id="Florida">Florida</option>

                                        <option id="Formosa do Oeste">Formosa do Oeste</option>

                                        <option id="Foz do Iguacu">Foz do Iguacu</option>

                                        <option id="Foz do Jordao">Foz do Jordao</option>

                                        <option id="Francisco Alves">Francisco Alves</option>

                                        <option id="Francisco Beltrao">Francisco Beltrao</option>

                                        <option id="General Carneiro">General Carneiro</option>

                                        <option id="Godoy Moreira">Godoy Moreira</option>

                                        <option id="Goioere">Goioere</option>

                                        <option id="Goioxim">Goioxim</option>

                                        <option id="Grandes Rios">Grandes Rios</option>

                                        <option id="Guaira">Guaira</option>

                                        <option id="Guairaca">Guairaca</option>

                                        <option id="Guamiranga">Guamiranga</option>

                                        <option id="Guapirama">Guapirama</option>

                                        <option id="Guaporema">Guaporema</option>

                                        <option id="Guaraci">Guaraci</option>

                                        <option id="Guaraniacu">Guaraniacu</option>

                                        <option id="Guarapuava">Guarapuava</option>

                                        <option id="Guaraquecaba">Guaraquecaba</option>

                                        <option id="Guaratuba">Guaratuba</option>

                                        <option id="Honorio Serpa">Honorio Serpa</option>

                                        <option id="Ibaiti">Ibaiti</option>

                                        <option id="Ibema">Ibema</option>

                                        <option id="Ibipora">Ibipora</option>

                                        <option id="Icaraima">Icaraima</option>

                                        <option id="Iguaracu">Iguaracu</option>

                                        <option id="Iguatu">Iguatu</option>

                                        <option id="Imbau">Imbau</option>

                                        <option id="Imbituva">Imbituva</option>

                                        <option id="Inacio Martins">Inacio Martins</option>

                                        <option id="Inaja">Inaja</option>

                                        <option id="Indianopolis">Indianopolis</option>

                                        <option id="Ipiranga">Ipiranga</option>

                                        <option id="Ipora">Ipora</option>

                                        <option id="Iracema do Oeste">Iracema do Oeste</option>

                                        <option id="Irati">Irati</option>

                                        <option id="Iretama">Iretama</option>

                                        <option id="Itaguaje">Itaguaje</option>

                                        <option id="Itaipulandia">Itaipulandia</option>

                                        <option id="Itambaraca">Itambaraca</option>

                                        <option id="Itambe">Itambe</option>

                                        <option id="Itapejara d'Oeste">Itapejara d'Oeste</option>

                                        <option id="Itaperucu">Itaperucu</option>

                                        <option id="Itauna do Sul">Itauna do Sul</option>

                                        <option id="Ivai">Ivai</option>

                                        <option id="Ivaipora">Ivaipora</option>

                                        <option id="Ivate">Ivate</option>

                                        <option id="Ivatuba">Ivatuba</option>

                                        <option id="Jaboti">Jaboti</option>

                                        <option id="Jacarezinho">Jacarezinho</option>

                                        <option id="Jaguapita">Jaguapita</option>

                                        <option id="Jaguariaiva">Jaguariaiva</option>

                                        <option id="Jandaia do Sul">Jandaia do Sul</option>

                                        <option id="Janiopolis">Janiopolis</option>

                                        <option id="Japira">Japira</option>

                                        <option id="Japura">Japura</option>

                                        <option id="Jardim Alegre">Jardim Alegre</option>

                                        <option id="Jardim Olinda">Jardim Olinda</option>

                                        <option id="Jataizinho">Jataizinho</option>

                                        <option id="Jesuitas">Jesuitas</option>

                                        <option id="Joaquim Tavora">Joaquim Tavora</option>

                                        <option id="Jundiai do Sul">Jundiai do Sul</option>

                                        <option id="Juranda">Juranda</option>

                                        <option id="Jussara">Jussara</option>

                                        <option id="Kalore">Kalore</option>

                                        <option id="Lapa">Lapa</option>

                                        <option id="Laranjal">Laranjal</option>

                                        <option id="Laranjeiras do Sul">Laranjeiras do Sul</option>

                                        <option id="Leopolis">Leopolis</option>

                                        <option id="Lidianopolis">Lidianopolis</option>

                                        <option id="Lindoeste">Lindoeste</option>

                                        <option id="Loanda">Loanda</option>

                                        <option id="Lobato">Lobato</option>

                                        <option id="Londrina">Londrina</option>

                                        <option id="Luiziana">Luiziana</option>

                                        <option id="Lunardelli">Lunardelli</option>

                                        <option id="Lupionopolis">Lupionopolis</option>

                                        <option id="Mallet">Mallet</option>

                                        <option id="Mambore">Mambore</option>

                                        <option id="Mandaguacu">Mandaguacu</option>

                                        <option id="Mandaguari">Mandaguari</option>

                                        <option id="Mandirituba">Mandirituba</option>

                                        <option id="Manfrinopolis">Manfrinopolis</option>

                                        <option id="Mangueirinha">Mangueirinha</option>

                                        <option id="Manoel Ribas">Manoel Ribas</option>

                                        <option id="Marechal Candido Rondon">Marechal Candido Rondon</option>

                                        <option id="Maria Helena">Maria Helena</option>

                                        <option id="Marialva">Marialva</option>

                                        <option id="Marilandia do Su">Marilandia do Sul</option>

                                        <option id="Marilena">Marilena</option>

                                        <option id="Mariluz">Mariluz</option>

                                        <option id="Maringa">Maringa</option>

                                        <option id="Mariopolis">Mariopolis</option>

                                        <option id="Maripa">Maripa</option>

                                        <option id="Marmeleiro">Marmeleiro</option>

                                        <option id="Marquinho">Marquinho</option>

                                        <option id="Marumbi">Marumbi</option>

                                        <option id="Matelandia">Matelandia</option>

                                        <option id="Matinhos">Matinhos</option>

                                        <option id="Mato Rico">Mato Rico</option>

                                        <option id="Maua da Serra">Maua da Serra</option>

                                        <option id="Medianeira">Medianeira</option>

                                        <option id="Mercedes">Mercedes</option>

                                        <option id="Mirador">Mirador</option>

                                        <option id="Miraselva">Miraselva</option>

                                        <option id="Missal">Missal</option>

                                        <option id="Moreira Sales">Moreira Sales</option>

                                        <option id="Morretes">Morretes</option>

                                        <option id="Munhoz de Melo">Munhoz de Melo</option>

                                        <option id="Nossa Senhora das Gracas">Nossa Senhora das Gracas</option>

                                        <option id="Nova Alianca do Ivai">Nova Alianca do Ivai</option>

                                        <option id="Nova America da Colina">Nova America da Colina</option>

                                        <option id="Nova Aurora">Nova Aurora</option>

                                        <option id="Nova Cantu">Nova Cantu</option>

                                        <option id="Nova Esperanca do Sudoeste">Nova Esperanca do Sudoeste</option>

                                        <option id="Nova Esperanca">Nova Esperanca</option>

                                        <option id="Nova Fatima">Nova Fatima</option>

                                        <option id="Nova Laranjeiras">Nova Laranjeiras</option>

                                        <option id="Nova Londrina">Nova Londrina</option>

                                        <option id="Nova Olimpia">Nova Olimpia</option>

                                        <option id="Nova Prata do Iguacu">Nova Prata do Iguacu</option>

                                        <option id="Nova Santa Barbara">Nova Santa Barbara</option>

                                        <option id="Nova Santa Rosa">Nova Santa Rosa</option>

                                        <option id="Nova Tebas">Nova Tebas</option>

                                        <option id="Novo Itacolomi">Novo Itacolomi</option>

                                        <option id="Ortigueira">Ortigueira</option>

                                        <option id="Ourizona">Ourizona</option>

                                        <option id="Ouro Verde do Oeste">Ouro Verde do Oeste</option>

                                        <option id="Paicandu">Paicandu</option>

                                        <option id="Palmas">Palmas</option>

                                        <option id="Palmeira">Palmeira</option>

                                        <option id="Palmital">Palmital</option>

                                        <option id="Palotina">Palotina</option>

                                        <option id="Paraiso do Norte">Paraiso do Norte</option>

                                        <option id="Paranacity">Paranacity</option>

                                        <option id="Paranagua">Paranagua</option>

                                        <option id="Paranapoema">Paranapoema</option>

                                        <option id="Paranavai">Paranavai</option>

                                        <option id="Pato Bragado">Pato Bragado</option>

                                        <option id="Pato Branco">Pato Branco</option>

                                        <option id="Paula Freitas">Paula Freitas</option>

                                        <option id="Paulo Frontin">Paulo Frontin</option>

                                        <option id="Peabiru">Peabiru</option>

                                        <option id="Perobal">Perobal</option>

                                        <option id="Perola d'Oeste">Perola d'Oeste</option>

                                        <option id="Perola">Perola</option>

                                        <option id="Pien">Pien</option>

                                        <option id="Pinhais">Pinhais</option>

                                        <option id="Pinhal de Sao Bento">Pinhal de Sao Bento</option>

                                        <option id="Pinhalao">Pinhalao</option>

                                        <option id="Pinhao">Pinhao</option>

                                        <option id="Pirai do Sul">Pirai do Sul</option>

                                        <option id="Piraquara">Piraquara</option>

                                        <option id="Pitanga">Pitanga</option>

                                        <option id="Pitangueiras">Pitangueiras</option>

                                        <option id="Planaltina do Parana">Planaltina do Parana</option>

                                        <option id="Planalto">Planalto</option>

                                        <option id="Ponta Grossa">Ponta Grossa</option>

                                        <option id="Pontal do Parana">Pontal do Parana</option>

                                        <option id="Porecatu">Porecatu</option>

                                        <option id="Porto Amazonas">Porto Amazonas</option>

                                        <option id="Porto Barreiro">Porto Barreiro</option>

                                        <option id="Porto Rico">Porto Rico</option>

                                        <option id="Porto Vitoria">Porto Vitoria</option>

                                        <option id="Prado Ferreira">Prado Ferreira</option>

                                        <option id="Pranchita">Pranchita</option>

                                        <option id="Presidente Castelo Branco">Presidente Castelo Branco</option>

                                        <option id="Primeiro de Maio">Primeiro de Maio</option>

                                        <option id="Prudentopolis">Prudentopolis</option>

                                        <option id="Quarto Centenario">Quarto Centenario</option>

                                        <option id="Quatigua">Quatigua</option>

                                        <option id="Quatro Barras">Quatro Barras</option>

                                        <option id="Quatro Pontes">Quatro Pontes</option>

                                        <option id="Quedas do Iguacu">Quedas do Iguacu</option>

                                        <option id="Querencia do Norte">Querencia do Norte</option>

                                        <option id="Quinta do Sol">Quinta do Sol</option>

                                        <option id="Quitandinha">Quitandinha</option>

                                        <option id="Ramilandia">Ramilandia</option>

                                        <option id="Rancho Alegre d'Oeste">Rancho Alegre d'Oeste</option>

                                        <option id="Rancho Alegre">Rancho Alegre</option>

                                        <option id="Realeza">Realeza</option>

                                        <option id="Reboucas">Reboucas</option>

                                        <option id="Renascenca">Renascenca</option>

                                        <option id="Reserva do Iguacu">Reserva do Iguacu</option>

                                        <option id="Reserva">Reserva</option>

                                        <option id="Ribeirao Claro">Ribeirao Claro</option>

                                        <option id="Ribeirao do Pinhal">Ribeirao do Pinhal</option>

                                        <option id="Rio Azul">Rio Azul</option>

                                        <option id="Rio Bom">Rio Bom</option>

                                        <option id="Rio Bonito do Iguacu">Rio Bonito do Iguacu</option>

                                        <option id="Rio Branco do Ivai">Rio Branco do Ivai</option>

                                        <option id="Rio Branco do Sul">Rio Branco do Sul</option>

                                        <option id="Rio Negro">Rio Negro</option>

                                        <option id="Rolandia">Rolandia</option>

                                        <option id="Roncador">Roncador</option>

                                        <option id="Rondon">Rondon</option>

                                        <option id="Rosario do Ivai">Rosario do Ivai</option>

                                        <option id="Sabaudia">Sabaudia</option>

                                        <option id="Salgado Filho">Salgado Filho</option>

                                        <option id="Salto do Itarare">Salto do Itarare</option>

                                        <option id="Salto do Lontra">Salto do Lontra</option>

                                        <option id="Santa Amelia">Santa Amelia</option>

                                        <option id="Santa Cecilia do Pavao">Santa Cecilia do Pavao</option>

                                        <option id="Santa Cruz de Monte Castelo">Santa Cruz de Monte Castelo</option>

                                        <option id="Santa Fe">Santa Fe</option>

                                        <option id="Santa Helena">Santa Helena</option>

                                        <option id="Santa Ines">Santa Ines</option>

                                        <option id="Santa Isabel do Ivai">Santa Isabel do Ivai</option>

                                        <option id="Santa Izabel do Oeste">Santa Izabel do Oeste</option>

                                        <option id="Santa Lucia">Santa Lucia</option>

                                        <option id="Santa Maria do Oeste">Santa Maria do Oeste</option>

                                        <option id="Santa Mariana">Santa Mariana</option>

                                        <option id="Santa Monica">Santa Monica</option>

                                        <option id="Santa Tereza do Oeste">Santa Tereza do Oeste</option>

                                        <option id="Santa Terezinha de Itaipu">Santa Terezinha de Itaipu</option>

                                        <option id="Santana do Itarare">Santana do Itarare</option>

                                        <option id="Santo Antonio da Platina">Santo Antonio da Platina</option>

                                        <option id="Santo Antonio do Caiua">Santo Antonio do Caiua</option>

                                        <option id="Santo Antonio do Paraiso">Santo Antonio do Paraiso</option>

                                        <option id="Santo Antonio do Sudoeste">Santo Antonio do Sudoeste</option>

                                        <option id="Santo Inacio">Santo Inacio</option>

                                        <option id="Sao Carlos do Ivai">Sao Carlos do Ivai</option>

                                        <option id="Sao Jeronimo da Serra">Sao Jeronimo da Serra</option>

                                        <option id="Sao Joao do Caiua">Sao Joao do Caiua</option>

                                        <option id="Sao Joao do Ivai">Sao Joao do Ivai</option>

                                        <option id="Sao Joao do Triunfo">Sao Joao do Triunfo</option>

                                        <option id="Sao Joao">Sao Joao</option>

                                        <option id="Sao Jorge d'Oeste">Sao Jorge d'Oeste</option>

                                        <option id="Sao Jorge do Ivai">Sao Jorge do Ivai</option>

                                        <option id="Sao Jorge do Patrocinio">Sao Jorge do Patrocinio</option>

                                        <option id="Sao Jose da Boa Vista">Sao Jose da Boa Vista</option>

                                        <option id="Sao Jose das Palmeiras">Sao Jose das Palmeiras</option>

                                        <option id="Sao Jose dos Pinhais">Sao Jose dos Pinhais</option>

                                        <option id="Sao Manoel do Parana">Sao Manoel do Parana</option>

                                        <option id="Sao Mateus do Sul">Sao Mateus do Sul</option>

                                        <option id="Sao Miguel do Iguacu">Sao Miguel do Iguacu</option>

                                        <option id="Sao Pedro do Iguacu">Sao Pedro do Iguacu</option>

                                        <option id="Sao Pedro do Ivai">Sao Pedro do Ivai</option>

                                        <option id="Sao Pedro do Parana">Sao Pedro do Parana</option>

                                        <option id="Sao Sebastiao da Amoreira">Sao Sebastiao da Amoreira</option>

                                        <option id="Sao Tome">Sao Tome</option>

                                        <option id="Sapopema">Sapopema</option>

                                        <option id="Sarandi">Sarandi</option>

                                        <option id="Saudade do Iguacu">Saudade do Iguacu</option>

                                        <option id="Senges">Senges</option>

                                        <option id="Serranopolis do Iguacu">Serranopolis do Iguacu</option>

                                        <option id="Sertaneja">Sertaneja</option>

                                        <option id="Sertanopolis">Sertanopolis</option>

                                        <option id="Siqueira Campos">Siqueira Campos</option>

                                        <option id="Sulina">Sulina</option>

                                        <option id="Tamarana">Tamarana</option>

                                        <option id="Tamboara">Tamboara</option>

                                        <option id="Tapejara">Tapejara</option>

                                        <option id="Tapira">Tapira</option>

                                        <option id="Teixeira Soares">Teixeira Soares</option>

                                        <option id="Telemaco Borba">Telemaco Borba</option>

                                        <option id="Terra Boa">Terra Boa</option>

                                        <option id="Terra Rica">Terra Rica</option>

                                        <option id="Terra Roxa">Terra Roxa</option>

                                        <option id="Tibagi">Tibagi</option>

                                        <option id="Tijucas do Sul">Tijucas do Sul</option>

                                        <option id="Toledo">Toledo</option>

                                        <option id="Tomazina">Tomazina</option>

                                        <option id="Tres Barras do Parana">Tres Barras do Parana</option>

                                        <option id="Tunas do Parana">Tunas do Parana</option>

                                        <option id="Tuneiras do Oeste">Tuneiras do Oeste</option>

                                        <option id="Tupassi">Tupassi</option>

                                        <option id="Turvo">Turvo</option>

                                        <option id="Ubirata">Ubirata</option>

                                        <option id="Umuarama">Umuarama</option>

                                        <option id="Uniao da Vitoria">Uniao da Vitoria</option>

                                        <option id="Uniflor">Uniflor</option>

                                        <option id="Urai">Urai</option>

                                        <option id="Ventania">Ventania</option>

                                        <option id="Vera Cruz do Oeste">Vera Cruz do Oeste</option>

                                        <option id="Vere">Vere</option>

                                        <option id="Vila Alta">Vila Alta</option>

                                        <option id="Virmond">Virmond</option>

                                        <option id="Vitorino">Vitorino</option>

                                        <option id="Wenceslau Braz">Wenceslau Braz</option>

                                        <option id="Xambre">Xambre</option>

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
                <h1 class="page-header">Contato</h1>
                <div class="properties-grid" >
    <div class="row">

<form action="contato.php" id="contactform" method="post" name="contactForm" style="width:100%" >
              <h4>Nome:<br>  <input type="text" name="name"  id="name" size="40px" value="" style="width:100%" /><br>
              E-mail: <br><input type="text" name="email"  id="email" value="" style="width:100%"/><br>
              Assunto: <br><input type="text" name="subject"  id="subject" value="" style="width:100%"/><br>
              Mensagem:<br> <textarea name="message" id="message"  cols="2" rows="6" style="width:100%"></textarea><br>
              <label>&nbsp;</label>
              <input type="submit" name="submit" class="buttoncontact" id="buttonsend" value="Enviar" style="font-size:20px" />
             </h4> </form>  
    </div><!-- /.row -->
</div><!-- /.properties-grid -->
            </div>
            <div class="sidebar span3">
                
                <div class="hidden-tablet">
                    <div class="widget properties last">
    <div class="title">
        <h2></h2>
    </div><!-- /.title -->

    

            
    </div><!-- /.content -->
</div><!-- /.properties -->
                </div>
            </div>
        </div>
              

   </div>
</div>

<div class="bottom-wrapper">
    <div class="bottom container">
        <div class="bottom-inner row">
            <div class="item span4">
                <div class="address decoration"></div>
                <h2><a>An&uacute;ncie</a></h2>
                <p>Clique para se Cadastrar e Anunciar Gr&aacute;tis, depois faça o login. Voc&ecirc; far&aacute; o seu pr&oacute;prio an&uacute;ncio escolhendo o Estado, a Cidade, depois a Categoria e a Subcategoria onde deseja que ele apare&ccedil;a.</p>
                <a href="#" class="btn btn-primary">Saiba mais</a>
            </div><!-- /.item -->

            <div class="item span4">
                <div class="gps decoration"></div>
                <h2><a>Encontre com facilidade</a></h2>
                <p>O nosso site oferece o serviço perfeito para quem quer comprar ou vender um im&aacute;vel, divulgar serviços entre outros.  Al&eacute;m do site de Im&oacute;veis e Servi&ccedil;os &eacute; ser uma ferramenta simples, f&aacute;cil e &aacute;gil para os usu&aacute;rios.</p>
                <a href="#" class="btn btn-primary">Saiba mais</a>
            </div><!-- /.item -->

            <div class="item span4">
                <div class="key decoration"></div>
                <h2><a>Im&oacute;vel ou servi&ccedil;o</a></h2>
                <p>Possibilidade de achar o imovel ou o servi&ccedil;o que tanto precisa ou quer no mesmo site tudo em um unico lugar sem complicação sem demora, ...<br><br></p>
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
