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

	<div id="header-css">
        	<div id="frase-header">41 3042 8697</div>
                <div id="frase-header"> <a href="mailto:contato@osupply.com.br">contato@osupply.com.br</a></div>
        </div>

        <div style="clear: both">
        </div>
    
        <div id="header-oSupply">
            <div id="logotipo-header-oSupply"><a href="/"><img src="images/logotipo-osupply.png"/></a></div>
            <div id="frase-header-oSupply"><h4>Tudo em manutenção industrial em um único portal.</h4></div>
            <div id="frase-header-oSupply">
                <p>
                    <a href="cadastro/"><img src="images/botaoCadastre-se_2.png" /> </a>
                    <a href="/admin"> <img style="padding-left:30px" src="images/botaoEntrar_2.png"/> </a>
                </p>
            </div>
        </div>
        
        <div style="clear: both">
        </div>

        <div id="menu-Nav">
            <div id='cssmenu'>
                <ul>
                   <li <?php if ($pagina1) echo 'class="active"'; ?>><a href='/index'><span>Home</span></a></li>
                   <li <?php if ($pagina2) echo 'class="active"'; ?>><a href='/funcionamento'><span>Como Funciona</span></a></li>
                   <li <?php if ($pagina3) echo 'class="active"'; ?>><a href='/compradores'><span>Compradores</span></a></li>
                   <li <?php if ($pagina4) echo 'class="active"'; ?>><a href='/fornecedores'><span>Fornecedores</span></a></li>
                   <li <?php if ($pagina5) echo 'class="active"'; ?>><a href='/anuncie'><span>Anuncie</span></a></li>
                   <li class='last <?php if ($pagina5) echo 'active"'; ?>'><a href='/contato'><span>Contato</span></a></li>
                </ul>
            </div>
        </div>
        
        <div style="clear: both">
        </div>