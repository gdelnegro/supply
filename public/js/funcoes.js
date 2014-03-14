function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;  
    if((tecla>47 && tecla<58)) return true;
    else{
        if (tecla==8 || tecla==0) return true;
    else  return false;
    }
}

function getEnderecoan() {
    // Se o campo CEP não estiver vazio
    if($.trim($("#cep_anuncio").val()) != ""){
    /*
    Para conectar no serviço e executar o json, precisamos usar a função
    getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
    dataTypes não possibilitam esta interação entre domínios diferentes
    Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
    http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
    */
    $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep_anuncio").val(), function(){
    // o getScript dá um eval no script, então é só ler!
    //Se o resultado for igual a 1
                   
    if (resultadoCEP["tipo_logradouro"] != '') {
        if (resultadoCEP["resultado"]) {
        // troca o valor dos elementos
            $("#rua_anuncio").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
            $("#bairro_anuncio").val(unescape(resultadoCEP["bairro"]));
            $("#cidade_anuncio").val(unescape(resultadoCEP["cidade"]));
            $("#estado_anuncio").val(unescape(resultadoCEP["uf"]));
            $("#numero_anuncio").focus();
            }
        }       
    });
    }
}



function getEndereco() {
    // Se o campo CEP não estiver vazio
    if($.trim($("#cep_imobiliaria").val()) != ""){
    /*
    Para conectar no serviço e executar o json, precisamos usar a função
    getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
    dataTypes não possibilitam esta interação entre domínios diferentes
    Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
    http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
    */
    $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep_imobiliaria").val(), function(){
    // o getScript dá um eval no script, então é só ler!
    //Se o resultado for igual a 1
                   
    if (resultadoCEP["tipo_logradouro"] != '') {
        if (resultadoCEP["resultado"]) {
        // troca o valor dos elementos
            $("#rua_imobiliaria").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
            $("#bairro_imobiliaria").val(unescape(resultadoCEP["bairro"]));
            $("#cidade_imobiliaria").val(unescape(resultadoCEP["cidade"]));
            $("#estado_imobiliaria").val(unescape(resultadoCEP["uf"]));
            $("#numero_imobiliaria").focus();
            }
        }       
    });
    }
}




function getEndereco2() {
    // Se o campo CEP não estiver vazio
    if($.trim($("#cep_imovel").val()) != ""){
    /*
    Para conectar no serviço e executar o json, precisamos usar a função
    getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
    dataTypes não possibilitam esta interação entre domínios diferentes
    Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
    http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
    */
    $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep_imovel").val(), function(){
    // o getScript dá um eval no script, então é só ler!
    //Se o resultado for igual a 1
                   
    if (resultadoCEP["tipo_logradouro"] != '') {
        if (resultadoCEP["resultado"]) {
        // troca o valor dos elementos
            $("#rua_imovel").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
            $("#bairro_imovel").val(unescape(resultadoCEP["bairro"]));
            $("#cidade_imovel").val(unescape(resultadoCEP["cidade"]));
            $("#estado_imovel").val(unescape(resultadoCEP["uf"]));
            $("#numero_imovel").focus();
            }
        }       
    });
    }
}




function getEndereco3() {
    // Se o campo CEP não estiver vazio
    if($.trim($("#cep_prestadores_servicos").val()) != ""){
    /*
    Para conectar no serviço e executar o json, precisamos usar a função
    getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
    dataTypes não possibilitam esta interação entre domínios diferentes
    Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
    http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
    */
    $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep_prestadores_servicos").val(), function(){
    // o getScript dá um eval no script, então é só ler!
    //Se o resultado for igual a 1
                   
    if (resultadoCEP["tipo_logradouro"] != '') {
        if (resultadoCEP["resultado"]) {
        // troca o valor dos elementos
            $("#rua_prestadores_servicos").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
            $("#bairro_prestadores_servicos").val(unescape(resultadoCEP["bairro"]));
            $("#cidade_prestadores_servicos").val(unescape(resultadoCEP["cidade"]));
            $("#estado_prestadores_servicos").val(unescape(resultadoCEP["uf"]));
            $("#numero_prestadores_servicos").focus();
            }
        }       
    });
    }
}


function getEndereco4() {
    // Se o campo CEP não estiver vazio
    if($.trim($("#cep_fornecedor").val()) != ""){
    /*
    Para conectar no serviço e executar o json, precisamos usar a função
    getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
    dataTypes não possibilitam esta interação entre domínios diferentes
    Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
    http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
    */
    $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep_fornecedor").val(), function(){
    // o getScript dá um eval no script, então é só ler!
    //Se o resultado for igual a 1
                   
    if (resultadoCEP["tipo_logradouro"] != '') {
        if (resultadoCEP["resultado"]) {
        // troca o valor dos elementos
            $("#rua_fornecedor").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
            $("#bairro_fornecedor").val(unescape(resultadoCEP["bairro"]));
            $("#cidade_fornecedor").val(unescape(resultadoCEP["cidade"]));
            $("#estado_fornecedor").val(unescape(resultadoCEP["uf"]));
            $("#numero_fornecedor").focus();
            }
        }       
    });
    }
}