<?php  
	$pagina1 = strripos($_SERVER['PHP_SELF'], 'index');
	$pagina2 = strripos($_SERVER['PHP_SELF'], 'comofunciona');
	$pagina3 = strripos($_SERVER['PHP_SELF'], 'compradores');
	$pagina4 = strripos($_SERVER['PHP_SELF'], 'fornecedores');
	$pagina5 = strripos($_SERVER['PHP_SELF'], 'anuncie');
	$pagina6 = strripos($_SERVER['PHP_SELF'], 'contato');
?>

	<div id="header-css">
        	<div id="frase-header">41 3042 8697</div>
                <div id="frase-header"> <a href="mailto:contato@osupply.com.br">contato@osupply.com.br</a></div>
        </div>

        <div style="clear: both">
        </div>
    
        <div id="header-oSupply">
            <div id="logotipo-header-oSupply"><img src="images/logotipo-osupply.png"/></div>
            <div id="frase-header-oSupply"><h4>Tudo em manutenção industrial em um único portal.</h4></div>
            <div id="frase-header-oSupply">
                <p>
                    <a href="cadastro/"><img src="images/botaoCadastre-se.png" /> </a>
                    <a href="/admin"> <img style="padding-left:30px" src="images/botaoEntrar.png"/> </a>
                </p>
            </div>
        </div>
        
        <div style="clear: both">
        </div>

        <div id="menu-Nav">
            <div id='cssmenu'>
                <ul>
                   <li <?php if ($pagina1) echo 'class="active"'; ?>><a href='index'><span>Home</span></a></li>
                   <li <?php if ($pagina2) echo 'class="active"'; ?>><a href='comofunciona'><span>Como Funciona</span></a></li>
                   <li <?php if ($pagina3) echo 'class="active"'; ?>><a href='compradores'><span>Compradores</span></a></li>
                   <li <?php if ($pagina4) echo 'class="active"'; ?>><a href='fornecedores'><span>Fornecedores</span></a></li>
                   <li <?php if ($pagina5) echo 'class="active"'; ?>><a href='anuncie'><span>Anuncie</span></a></li>
                   <li class='last <?php if ($pagina5) echo 'active"'; ?>'><a href='contato'><span>Contato</span></a></li>
                </ul>
            </div>
        </div>
        
        <div style="clear: both">
        </div>