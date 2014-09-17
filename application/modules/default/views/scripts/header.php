<?php  
	$pagina1 = strripos($_SERVER['REDIRECT_URL'], 'index');
	$pagina2 = strripos($_SERVER['REDIRECT_URL'], 'funcionamento');
	$pagina3 = strripos($_SERVER['REDIRECT_URL'], 'compradores');
	$pagina4 = strripos($_SERVER['REDIRECT_URL'], 'fornecedores');
	$pagina5 = strripos($_SERVER['REDIRECT_URL'], 'anuncie');
	$pagina6 = strripos($_SERVER['REDIRECT_URL'], 'contato');
        
        if(!isset($_SERVER['REDIRECT_URL'])){
            $pagina1 = 'index';
        }
?>


<div class="container">
            <nav class="navbar navbar-default navbar-rounded" role="navigation">
                <div class="container-fluid">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <button type="button" class="btn btn-link">contato@osupply.com.br</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn">41 3042 8697</button>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="row">
                <div class="col-md-4" >
                    <a class="pull-left" href="#">
                        <img src="imgs/logotipo-osupply.png" class="img-responsive" alt="Logo">
                    </a>
                </div>
                <div class="col-md-3 center-block">
                    <h4>Tudo em manutenção industrial <br> em um único portal.</h4>
                </div>
                <div class="col-md-4 pull-right">
                    <table class='table-responsive'>
                        <tr>
                            <td><p><a href=""><img src="imgs/botaoCadastre-se.png" class="img-responsive" alt="Cadastre-se"></a></p></td>
                            <td><p><a href=""><img src="imgs/botaoEntrar.png" class="img-responsive" alt="Entrar"></a></p></td>
                        </tr>
                    </table>
                </div>
            </div>
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li <?php if ($pagina1) echo 'class="active"'; ?>><a href="/index">Home</a></li>
                            <li <?php if ($pagina2) echo 'class="active"'; ?>><a href="/funcionamento">Como Funciona</a></li>
                            <li <?php if ($pagina3) echo 'class="active"'; ?>><a href="/compradores">Compradores</a></li>
                            <li <?php if ($pagina4) echo 'class="active"'; ?>><a href="/fornecedores">Fornecedores</a></li>
                            <li <?php if ($pagina5) echo 'class="active"'; ?>><a href="/anuncie">Anuncie</a></li>
                            <li <?php if ($pagina6) echo 'class="active"'; ?>><a href="/contato">Contato</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>