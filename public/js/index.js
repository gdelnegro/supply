$(function(){
	$('#cidades').ajaxAddOption('acoes.php', {id: $(this).val(), acao: 'lercidades'}, false);
	$('#paises').change(function(){
		if($('#paises').selectedTexts() != 'Selecione'){		
			$('#estados').removeOption(/./);
			$('#estados').ajaxAddOption('acoes.php', {id: $(this).val(), acao: 'lerEstados'}, false);		
		}
	});

	$('#estados').change(function(){
		if($('#estados').selectedTexts() != 'Selecione'){
			$('#cidades').removeOption(/./);
			$('#cidades').ajaxAddOption('acoes.php', {id: $(this).val(), acao: 'lerCidades'}, false);
		}
	});
});