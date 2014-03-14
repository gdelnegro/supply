<!DOCTYPE html>
<html lang="pt-br">
 <head>
 <meta charset="utf-8"/>
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
 <title>Im&oacute;veis e Servi&ccedil;os</title>
 <script>
function buscarbairro(){
var cidade = ($('#cidade').val());
if(cidade){
var url = 'ajax_buscar_cidades.php?cidade='+cidade;  
$.get(url, function(dataReturn) {

var str=(dataReturn);
var res = replaceAll(str,'[','');
res = replaceAll(res,']','');
res = replaceAll(res,'{','');
res = replaceAll(res,'}','');
var matrizbairros = res.split(',');
var lenmatrizbairros=matrizbairros.length;
var bairro='';
var bairrolimpo = new Array();
var y=0;
for(x=0;x<lenmatrizbairros;x++){
	if(x%2){
		bairro=matrizbairros[x];
		bairrolimpo[y] = replaceAll(bairro,'"','');
	//	alert('bairrolimpo: '+bairrolimpo[y]);
	y++;
	}
}
var lenbairrolimpo = bairrolimpo.length;
var b=0;
var nomebairro = new Array();
var estebairro2;
var matriznomebairro = new Array();
for(z=0;z<lenbairrolimpo;z++){
	estebairro2 = bairrolimpo[z];
	matriznomebairro = estebairro2.split(':');
	nomebairro[b] = matriznomebairro[1];	
	b++;	
  
}
var novaselect='<select name="bairro" id="bairro">';
for (c=0;c<nomebairro.length;c++){
novaselect+='<option value="'+nomebairro[c]+'">'+nomebairro[c]+'</option>';	
}
novaselect+='</select>';
document.getElementById('selectbairro').innerHTML=novaselect;
function replaceAll(string, token, newtoken) {
	while (string.indexOf(token) != -1) {
 		string = string.replace(token, newtoken);
	}
	return string;
}
});
}
    }

 </script>
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
         </ul>
        <!-- /.breadcrumb -->
        
        <div class="account pull-right">
           <ul class="nav nav-pills">
            <li><a href="admin/index.php">Entrar</a></li>
          </ul>
         </div>
      </div>
       <!-- /.span12 --> 
     </div>
    <!-- /.row --> 
  </div>
   <!-- /.container --> 
 </div>
<!-- /.breadcrumb-wrapper --> 

<!-- HEADER -->
<div id="header-wrapper">
   <div id="header">
    <div id="header-inner">
       <div class="container">
        <div class="navbar">
           <div class="navbar-inner">
            <div class="row">
               <div class="logo-wrapper span4"> <a href="#nav" class="hidden-desktop" id="btn-nav">Menu de navega&ccedil;&atilde;o</a>
                <div class="logo"> <a href="#" title="Home"> <img src="assets/img/logo.png" alt="Home"> </a> </div>
                <!-- /.logo -->
                
                <div class="site-name"> <a href="#" title="Home" class="brand"></a> </div>
                <!-- /.site-name --> 
                
              </div>
               <!-- /.logo-wrapper -->
               
               <div class="info">
                <div class="site-email"> <a href="mailto:contato@imoveiseservicos.com.br">contato@imoveiseservicos.com.br</a> </div>
                <!-- /.site-email -->
                
                <div class="site-phone"> <span>(41) 3282-9955 / 3556-3004</span> </div>
                <!-- /.site-phone --> 
              </div>
               <!-- /.info --> 
               
             </div>
            <!-- /.row --> 
          </div>
           <!-- /.navbar-inner --> 
         </div>
        <!-- /.navbar --> 
      </div>
       <!-- /.container --> 
     </div>
    <!-- /#header-inner --> 
  </div>
   <!-- /#header --> 
 </div>
<!-- /#header-wrapper --> 

<!-- NAVIGATION -->
<div id="navigation">
   <div class="container">
    <div class="navigation-wrapper">
       <div class="navigation clearfix-normal">
        <ul class="nav">
           <li><a href="index.php">Principal</a></li>
           <li><a href="imoveis.php">Im&oacute;veis</a></li>
           <li class="menuparent"> <span class="menuparent nolink">Servi&ccedil;os</span>
            <ul>
               <li class="menuparent"> <span class="menuparent nolink">Categoria</span>
                <ul>
                   <li><a href="#">Servi&ccedil;o 1</a></li>
                   <li><a href="#">Servi&ccedil;o 2</a></li>
                   <li><a href="#">Servi&ccedil;o 3</a></li>
                 </ul>
              </li>
               <li class="menuparent"> <span class="menuparent nolink">Categoria</span>
                <ul>
                   <li><a href="#">Servi&ccedil;o 4</a></li>
                   <li><a href="#">Servi&ccedil;o 5</a></li>
                   <li><a href="#">Servi&ccedil;o 6</a></li>
                 </ul>
              </li>
               <li class="menuparent"> <span class="menuparent nolink">Categoria</span>
                <ul>
                   <li><a href="#">Servi&ccedil;o 7</a></li>
                   <li><a href="#">Servi&ccedil;o 8</a></li>
                   <li><a href="#">Servi&ccedil;o 9</a></li>
                 </ul>
              </li>
             </ul>
          </li>
           <li><a href="#">Imobili&aacute;rias</a></li>
           <li><a href="#">Fornecedores</a></li>
           <li><a href="#">An&uacute;ncie</a></li>
           <li><a href="contato.php">Contato</a></li>
         </ul>
        <!-- /.nav -->
        
        <form method="get" class="site-search" action="index.php">
           <div class="input-append">
            <input title="Coloque o que deseja procurar." class="search-query span2 form-text" placeholder="Procurar" type="text" name="">
            <button type="submit" class="btn"><i class="icon-search"></i></button>
          </div>
           <!-- /.input-append -->
         </form>
        <!-- /.site-search --> 
      </div>
       <!-- /.navigation --> 
     </div>
    <!-- /.navigation-wrapper --> 
  </div>
   <!-- /.container --> 
 </div>
<!-- /.navigation --> 

<!-- CONTENT -->
<div id="content">
<div class="map-wrapper">
   <div class="map">
    <div id="map" class="map-inner"></div>
    <!-- /.map-inner -->
    
    <div class="container">
       <div class="row">
        <div class="span3">
           <div class="property-filter pull-right">
            <div class="content">
               <form name="form1" method="get" action="#">
                <div class="location control-group">
                   <label class="control-label" for="inputLocation"> Cidade </label>
                   <div class="controls">
                    <select name="cidade" id="cidade" onChange="buscarbairro()">
                       <?php
     include_once('conexao.php');
      $pdo = conectar();
	  
	  $sqlt = "SELECT DISTINCT cidade_imovel FROM ".$db.".imovel UNION SELECT DISTINCT cidade_prestadores_servicos FROM ".$db.".prestadores_servicos";
	   $escolhert = $pdo->prepare($sqlt);
	  $escolhert->execute();
	  $dadosCidades = $escolhert->fetchAll(PDO::FETCH_ASSOC);
					echo "<option value='0' selected>selecione</option>";
             $i=0;
			 foreach($dadosCidades as $key => $valor){
					$matrizcidades[$i]=$valor['cidade_imovel'];
					echo "<option value=".$valor['cidade_imovel'].">".$valor['cidade_imovel']."</option>";
					 $i++;
					 }				?>
                     </select>
                 <?php 
				echo "<script>";
				 for ($x=0;$x<count($matrizcidades);$x++){
					 
					 }
					echo "</script>"; 
				 ?>
                  </div>
                   <!-- /.controls --> 
                 </div>
                <!-- /.control-group -->
                <div class="Bairro">
                   <label class="control-label" for="inputLocation"> Regi&atilde;o </label>
                   <div class="controls" id="selectbairro">
                    <select id="bairro">
                       <option value="" selected="selected">Selecione</option>
                     </select>
                  </div>
                 </div>
                <div class="type control-group">
                   <label class="control-label" for="inputType"> O que voc&ecirc; procura? </label>
                   <div class="controls">
                    <select id="inputType">
                       <optgroup label="&#8212; Serviços &#8212;  ">
                       <option id="construcao civil">Constru&ccedil;&atilde;o Civil</option>
                       <option id="materiais">Materiais Constru&ccedil;&atilde;o</option>
                       <option id="pintura e tinta">Pintura e tintas</option>
                       <option id="serralheria">Serralheria</option>
                       <option id="metarlugica">Metal&uacute;rgica</option>
                       <optgroup label="&#8212; Imóveis &#8212;">
                       <option id="apartamento">Apartamento</option>
                       <option id="casa/sobrado">Casa/Sobrado</option>
                       <option id="terreno">Terreno</option>
                       <option id="rural">Rural</option>
                       <option id="comercial">Comercial</option>
                       <option id="condominio">Condom&iacute;nio</option>
                     </select>
                  </div>
                   <!-- /.controls --> 
                 </div>
                <!-- /.control-group -->
                
                <div class="beds control-group"> </div>
                <!-- /.control-group -->
                
                <div class="rent control-group">
                   <div class="controls">
                    <label class="checkbox" for="inputRent">
                       <input type="checkbox" id="inputRent">
                       Comprar </label>
                  </div>
                   <!-- /.controls --> 
                 </div>
                <!-- /.control-group -->
                
                <div class="sale control-group">
                   <div class="controls">
                    <label class="checkbox" for="inputSale">
                       <input type="checkbox" id="inputSale">
                       Alugar </label>
                  </div>
                   <!-- /.controls --> 
                 </div>
                <!-- /.control-group -->
                
                <div class="price-from control-group">
                   <label class="control-label" for="inputPriceFrom"> Valor M&iacute;nimo </label>
                   <div class="controls">
                    <input type="text" id="inputPriceFrom" name="inputPriceFrom">
                  </div>
                   <!-- /.controls --> 
                 </div>
                <!-- /.control-group -->
                
                <div class="price-to control-group">
                   <label class="control-label" for="inputPriceTo"> Valor M&aacute;ximo </label>
                   <div class="controls">
                    <input type="text" id="inputPriceTo" name="inputPriceTo">
                  </div>
                   <!-- /.controls --> 
                 </div>
                <!-- /.control-group -->
                
                <div class="price-value"> <span class="from"></span><!-- /.from --> 
                   - <span class="to"></span><!-- /.to --> 
                 </div>
                <!-- /.price-value -->
                
                <div class="price-slider"> </div>
                <!-- /.price-slider -->
                
                <div class="form-actions">
                   <input type="submit" value="Buscar !" class="btn btn-primary btn-large">
                 </div>
                <!-- /.form-actions -->
              </form>
             </div>
            <!-- /.content --> 
          </div>
           <!-- /.property-filter --> 
         </div>
        <!-- /.span3 --> 
      </div>
       <!-- /.row --> 
     </div>
    <!-- /.container --> 
  </div>
   <!-- /.map --> 
 </div>
<!-- /.map-wrapper -->
<div class="container">
<div id="main">
<div class="row">
   <div class="span9">
    <h1 class="page-header">Imobili&aacute;rias</h1>
    <div class="properties-grid" >
       <div class="row">
        <?php         
   include_once('conexao.php');

      $pdo = conectar();

	  $sql = "SELECT * FROM ".$db.".imobiliaria";  

	  $escolher = $pdo->prepare($sql);

	  $escolher->execute();

  		  $imobiliaria = $escolher->fetchAll(PDO::FETCH_ASSOC);

			  foreach( $imobiliaria as $indice => $dadosImobiliaria){

					$diretorio = "images/imobiliaria/".tira_acento($dadosImobiliaria['nome_imobiliaria'])."";

					$arrayArquivos = scandir($diretorio);
if($arrayArquivos[2] == 'Thumbs.db'){
					$primeira_imagem = $diretorio."/".$arrayArquivos[3];

echo"<a href='http://".$dadosImobiliaria['website_imobiliaria']."'><img src='".$diretorio."/".$arrayArquivos[3]."' alt='".$dadosImobiliaria['nome_imobiliaria']."' style='width:130;height:130px; float:left; margin-left:10px;'></a>";
}
else{
		$primeira_imagem = $diretorio."/".$arrayArquivos[2];

echo"<a href='http://".$dadosImobiliaria['website_imobiliaria']."'><img src='".$diretorio."/".$arrayArquivos[2]."' alt='".$dadosImobiliaria['nome_imobiliaria']."' style='width:130;height:130px; float:left; margin-left:10px;'></a>";
}
			  }
?>
      </div>
       <!-- /.row --> 
     </div>
    <!-- /.properties-grid --> 
  </div>
   <div class="sidebar span3">
    <div class="hidden-tablet">
       <div class="widget properties last">
        <div class="title">
           <h2>Servi&ccedil;os Ofertados</h2>
         </div>
        <!-- /.title -->
        
        <div class="content">
           <?php 
include_once('conexao.php');
      $pdo = conectar();
	  $sql1 = "SELECT * FROM ".$db.".prestadores_servicos";  
	  $escolher2 = $pdo->prepare($sql1);
	  $escolher2->execute();
	  	  			  $prestadores_servicos = $escolher2->fetchAll(PDO::FETCH_ASSOC);
			  foreach( $prestadores_servicos as $indice2 => $dados_prestadores_servicos){
				  ?>
           <div class="property">
            <div class="image">
               <?php
					$diretorio = "images/prestadores_servicos/".tira_acento($dados_prestadores_servicos['nome_prestadores_servicos'])."/";
					$arrayArquivos = scandir($diretorio);
					
				if($arrayArquivos[3]== null){
			  $primeira_imagem = $diretorio."/".$arrayArquivos[2];
echo"<a href='http://".$dados_prestadores_servicos['website_prestadores_servicos']."'><img src='".$diretorio."/".$arrayArquivos[2]."' alt='".$dados_prestadores_servicos['nome_prestadores_servicos']."' style='width:200px;height:95px; float:left; margin-left:140px; margin-bottom:5px;'></a>";
		  }
	  else { $primeira_imagem = $diretorio."/".$arrayArquivos[3];
echo"<a href='http://".$dados_prestadores_servicos['website_prestadores_servicos']."'><img src='".$diretorio."/".$arrayArquivos[3]."' alt='".$dados_prestadores_servicos['nome_prestadores_servicos']."' style='width:200px;height:95px; float:left; margin-left:140px; margin-bottom:5px;'></a>"; };
			  
			
		 ?>
               <div class="wrapper">
                <div class="title">
                   <h3> <?php echo "<a href='http://".$dados_prestadores_servicos['website_prestadores_servicos']."'></a>"?> </h3>
                 </div>
                <!-- /.title -->
                <div class="location"><?php echo "<h4><font color='#990000'>".$dados_prestadores_servicos['nome_prestadores_servicos']."</h4></font>".$dados_prestadores_servicos['rua_prestadores_servicos']." - ".$dados_prestadores_servicos['numero_prestadores_servicos']."- ".$dados_prestadores_servicos['complemento_prestadores_servicos']."- ".$dados_prestadores_servicos['bairro_prestadores_servicos']."- ".$dados_prestadores_servicos['cidade_prestadores_servicos']."- ".$dados_prestadores_servicos['estado_prestadores_servicos'].""?></div>
                <!-- /.location --> 
              </div>
               <!-- /.wrapper --> 
               
             </div>
            <!-- /.image --> 
          </div>
           <!-- /.property -->
           <?php
			  }
					 
    
            

           
	    

		  
	
?>
         </div>
        <!-- /.content --> 
      </div>
       <!-- /.properties --> 
     </div>
  </div>
 </div>
<div class="carousel">
<h2 class="page-header">An&uacute;ncios em Destaque</h2>
<div class="content">
<a class="carousel-prev" href="#">Previous</a> <a class="carousel-next" href="#">Next</a>
<ul>
<ul>
   <?php 
include_once('conexao.php');
      $pdo = conectar();
	  $sql3 = "SELECT * FROM ".$db.".imovel";  
	  $escolher4 = $pdo->prepare($sql3);
	  $escolher4->execute();
	  	  			  $imovel = $escolher4->fetchAll(PDO::FETCH_ASSOC);
			  foreach( $imovel as $indice4 => $dados_imovel){
				  ?>
   <li>
    <div class="image">
       <?php
					$diretorio = "images/imovel/".tira_acento($dados_imovel['titulo_imovel'])."/";
					$arrayArquivos = scandir($diretorio);
					
				if($arrayArquivos[3]== null){
$primeira_imagem = $diretorio."/".$arrayArquivos[2]; echo"".$dados_imovel['responsavel_imovel']."<img src='".$diretorio."/".$arrayArquivos[2]."' alt='".$dados_anuncio['titulo_anuncio']."' style='width:150px;height:150px, float:left; margin-left:40px; margin-bottom:5px; margin-top:20px'></a>"; }
	  else { $primeira_imagem = $diretorio."/".$arrayArquivos[3]; echo"".$dados_imovel['responsavel_imovel']."<img src='".$diretorio."/".$arrayArquivos[3]."' alt='".$dados_imovel['titulo_imovel']."' style='width:150px;height:150px, float:left; margin-left:40px; margin-bottom:5px; margin-top:20px'></a>"; } 
	  ?>
       <div class="title">
        <h3> <?php echo "".$dados_imovel['titulo_imovel'].""?></h3>
      </div>
       <div class="location"><?php echo "".$dados_imovel['titulo_imovel']." - <br>".$dados_imovel['rua_imovel']." - ".$dados_imovel['numero_imovel']." - ".$dados_anuncio['complemento_imovel']." - <br> ".$dados_imovel['bairro_imovel']." - ".$dados_imovel['cidade_imovel']." - ".$dados_imovel['estado_imovel']."<br>"?></div>
       <div class="bathrooms">
        <div class="inner"><?php echo "".$dados_imovel['info_banheiro_imovel'].""; ?></div>
      </div>
       <!-- /.bathrooms -->
       <div class="bedrooms">
        <div class="inner"><?php echo "".$dados_imovel['info_quarto_imovel'].""; ?></div>
      </div>
       <!-- /.bedrooms --> 
     </div>
  </li>
   <?php
			  }
?>
 </ul>
</div>
<!-- /.content -->
</div>
<!-- /.carousel -->

</div>
</div>
<div class="bottom-wrapper">
   <div class="bottom container">
    <div class="bottom-inner row">
       <div class="item span4">
        <div class="address decoration"></div>
        <h2><a>An&uacute;ncie</a></h2>
        <p>Clique para se Cadastrar e Anunciar Gr&aacute;tis, depois faça o login. Voc&ecirc; far&aacute; o seu pr&oacute;prio an&uacute;ncio escolhendo o Estado, a Cidade, depois a Categoria e a Subcategoria onde deseja que ele apare&ccedil;a.</p>
        <a href="#" class="btn btn-primary">Saiba mais</a> </div>
       <!-- /.item -->
       
       <div class="item span4">
        <div class="gps decoration"></div>
        <h2><a>Encontre com facilidade</a></h2>
        <p>O nosso site oferece o serviço perfeito para quem quer comprar ou vender um im&aacute;vel, divulgar serviços entre outros.  Al&eacute;m do site de Im&oacute;veis e Servi&ccedil;os &eacute; ser uma ferramenta simples, f&aacute;cil e &aacute;gil para os usu&aacute;rios.</p>
        <a href="#" class="btn btn-primary">Saiba mais</a> </div>
       <!-- /.item -->
       
       <div class="item span4">
        <div class="key decoration"></div>
        <h2><a>Im&oacute;vel ou servi&ccedil;o</a></h2>
        <p>Possibilidade de achar o imovel ou o serviço que tanto precisa ou quer no mesmo site tudo em um unico lugar sem complicação sem demora venha conhecer os ...</p>
        <a href="#" class="btn btn-primary">Saiba mais</a> </div>
       <!-- /.item --> 
     </div>
    <!-- /.bottom-inner --> 
  </div>
   <!-- /.bottom --> 
 </div>
<!-- /.bottom-wrapper -->
</div>
<!-- /#content -->
</div>
<!-- /#wrapper-inner -->

<div id="footer-wrapper">
   <div id="footer-top">
    <div id="footer-top-inner" class="container">
       <div class="row">
        <div class="widget span3" style="width: 30%">
           <div class="title">
            <h2>Informa&ccedil;&otilde;es</h2>
          </div>
           <!-- /.title -->
           
           <div class="content">
            <table class="contact">
               <tbody>
                <tr>
                   <th class="address">Endere&ccedil;o:</th>
                   <td>Rua Izabel a Redentora, n&deg; 1050 - S&atilde;o Jos&eacute; dos Pinhais, Centro<br>
                    Paran&aacute;<br></td>
                 </tr>
                <tr>
                   <th class="phone">Telefone:</th>
                   <td>(41) 3282-9955 <br>
                    (41) 3556-3004</td>
                 </tr>
                <tr>
                   <th class="email">E-mail:</th>
                   <td><a href="mailto:contato@imoveiseservicos.com.br">contato@imoveiseservicos.com.br</a></td>
                 </tr>
              </tbody>
             </table>
          </div>
           <!-- /.content --> 
         </div>
        <!-- /.widget -->
        
        <div class="widget span3" >
           <div class="title">
            <h2 class="block-title">Menu</h2>
          </div>
           <!-- /.title -->
           
           <div class="content">
            <ul class="menu nav">
               <li class="first leaf"><a href="#">Principal</a></li>
               <li class="leaf"><a href="#">Im&oacute;veis</a></li>
               <li class="leaf"><a href="#">Servi&ccedil;os</a></li>
               <li class="leaf"><a href="#">Imobili&aacute;rias</a></li>
               <li class="leaf"><a href="#">An&uacute;ncie</a></li>
               <li class="leaf"><a href="#">Contato</a></li>
             </ul>
          </div>
           <!-- /.content --> 
         </div>
        <!-- /.widget -->
        <div class="widget properties span3" style="width: 35%;">
           <div class="title">
            <h2>Localiza&ccedil;&atilde;o</h2>
          </div>
           <!-- /.title -->
           
           <div class="content">
            <iframe width="425" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?q=rua+izabel+a+redentora+1050+centro+s%C3%A3o+jos%C3%A9+dos+pinhais&amp;ie=UTF8&amp;hq=&amp;hnear=Rua+Dona+Izabel+A+Redentora,+1050+-+Silveira+da+Motta,+Paran%C3%A1&amp;t=m&amp;ll=-25.523931,-49.204245&amp;spn=0.027109,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
            <br />
          </div>
           <!-- /.content --> 
         </div>
        <!-- /.properties-small --> 
        
      </div>
       <!-- /.row --> 
     </div>
    <!-- /#footer-top-inner --> 
  </div>
   <!-- /#footer-top -->
   
   <div id="footer" class="footer container">
    <div id="footer-inner">
       <div class="row">
        <div class="span6 copyright">
           <p>Desenvolvido por <a href="http://www.opisystem.com.br">OPI SYSTEM</a> © 2013 | Todos os direitos reservados.</p>
         </div>
        <!-- /.copyright -->
        
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
          </div>
           <!-- /.content --> 
         </div>
        <!-- /.span6 --> 
      </div>
       <!-- /.row --> 
     </div>
    <!-- /#footer-inner --> 
  </div>
   <!-- /#footer --> 
 </div>
<!-- /#footer-wrapper -->
</div>
<!-- /#wrapper -->
</div>
<!-- /#wrapper-outer --> 

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
