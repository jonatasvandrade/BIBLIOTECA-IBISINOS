$(function(){
	
	//clique do checkbox do header da grid
	$('#check_grid').click(function(){
		$("input[rel='check']:enabled").attr('checked',$(this).is(':checked'));
		if ($("input[rel='check']:checked").length > 0){
			$('#botao_remover').fadeIn(300);
		}
		else{
			$('#botao_remover').fadeOut(300);
		}

		if($("input[rel='check']:checked").length == 1){
			var msg = 'este item';
		}
		else{
			var msg = 'estes '+$("input[rel='check']:checked").length+' itens';
		}
		$("#msg_remover").html(msg);
	});
	
	//clique do checkbox do header da grid
	$('#check_grid_orc').click(function(){
		$("input[rel='check_orc']").attr('checked',$(this).is(':checked'));
		if ($("input[rel='check_orc']:checked").length > 0){
			$('#botao_remover_orc').fadeIn(300);
		}
		else{
			$('#botao_remover_orc').fadeOut(300);
		}

		if($("input[rel='check_orc']:checked").length == 1){
			var msg = 'este item';
		}
		else{
			var msg = 'estes '+$("input[rel='check_orc']:checked").length+' itens';
		}
		$("#msg_remover").html(msg);
	});

	//clique do botão de filtro das páginas
	$("#botao_filtrar").click(function() {
  		$("#box_filtrar").fadeToggle(300);
	});

});

//carrega os dados da grid via ajax
function paginacao(nome_pagina,pagina){
	$('#botao_remover').fadeOut(300);
	if(nome_pagina.indexOf('?') > 0){
		nome_pagina = nome_pagina+'&pagina_atual='+pagina
	}
	else{
		nome_pagina = nome_pagina+'?pagina_atual='+pagina
	}
	$("#conteudo_grid").load(encodeURI(nome_pagina), function(response, status, xhr) {
		if (status == "success")
		{
			$("input[rel='check']").click(function(){
				if ($("input[rel='check']:checked").length > 0){
					$('#botao_remover').fadeIn(300);
				}
				else{
					$('#botao_remover').fadeOut(300);
				}
				if($("input[rel='check']:checked").length == 1){
					var msg = 'este item';
				}
				else{
					var msg = 'estes '+$("input[rel='check']:checked").length+' itens';
				}
				$("#msg_remover").html(msg);			
			});
		}
	});
}

documentall = document.all;  
/* 
* função para formatação de valores monetários retirada de 
*[url]http://jonasgalvez.com/br/blog/2003-08/egocentrismo[/url] 
*/  
function formatamoney(c) {  
    var t = this; if(c == undefined) c = 2;        
    var p, d = (t=t.split("."))[1].substr(0, c);  
    for(p = (t=t[0]).length; (p-=3) >= 1;) {  
           t = t.substr(0,p) + "." + t.substr(p);  
    }  
    return t+","+d+Array(c+1-d.length).join(0);  
}  
  
String.prototype.formatCurrency=formatamoney  
  
function demaskvalue(valor, currency){  
/* 
* Se currency é false, retorna o valor sem apenas com os números. Se é true, os dois últimos caracteres são considerados as  
* casas decimais 
*/  
var val2 = '';  
var strCheck = '0123456789';  
var len = valor.length;  
   if (len== 0){  
      return 0.00;  
   }  
  
   if (currency ==true){     
      /* Elimina os zeros à esquerda  
      * a variável  <i> passa a ser a localização do primeiro caractere após os zeros e  
      * val2 contém os caracteres (descontando os zeros à esquerda) 
      */  
        
      for(var i = 0; i < len; i++)  
         if ((valor.charAt(i) != '0') && (valor.charAt(i) != ',')) break;  
        
      for(; i < len; i++){  
         if (strCheck.indexOf(valor.charAt(i))!=-1) val2+= valor.charAt(i);  
      }  
  
      if(val2.length==0) return "0.00";  
      if (val2.length==1)return "0.0" + val2;  
      if (val2.length==2)return "0." + val2;  
        
      var parte1 = val2.substring(0,val2.length-2);  
      var parte2 = val2.substring(val2.length-2);  
      var returnvalue = parte1 + "." + parte2;  
      return returnvalue;  
        
   }  
   else{  
         /* currency é false: retornamos os valores COM os zeros à esquerda,  
         * sem considerar os últimos 2 algarismos como casas decimais  
         */  
         val3 ="";  
         for(var k=0; k < len; k++){  
            if (strCheck.indexOf(valor.charAt(k))!=-1) val3+= valor.charAt(k);  
         }           
   return val3;  
   }  
}  
  
function reais(obj,event){  
  
var whichCode = (window.Event) ? event.which : event.keyCode;  
/* 
Executa a formatação após o backspace nos navegadores !document.all 
*/  
if (whichCode == 8 && !documentall) {     
/* 
Previne a ação padrão nos navegadores 
*/  
   if (event.preventDefault){ //standart browsers  
         event.preventDefault();  
      }else{ // internet explorer  
         event.returnValue = false;  
   }  
   var valor = obj.value;  
   var x = valor.substring(0,valor.length-1);  
   obj.value= demaskvalue(x,true).formatCurrency();  
   return false;  
}  
/* 
Executa o Formata Reais e faz o format currency novamente após o backspace 
*/  
FormataReais(obj,'.',',',event);  
} // end reais  
  
  
function backspace(obj,event){  
/* 
Essa função basicamente altera o  backspace nos input com máscara reais para os navegadores IE e opera. 
O IE não detecta o keycode 8 no evento keypress, por isso, tratamos no keydown. 
Como o opera suporta o infame document.all, tratamos dele na mesma parte do código. 
*/  
  
var whichCode = (window.Event) ? event.which : event.keyCode;  
if (whichCode == 8 && documentall) {     
   var valor = obj.value;  
   var x = valor.substring(0,valor.length-1);  
   var y = demaskvalue(x,true).formatCurrency();  
  
   obj.value =""; //necessário para o opera  
   obj.value += y;  
     
   if (event.preventDefault){ //standart browsers  
         event.preventDefault();  
      }else{ // internet explorer  
         event.returnValue = false;  
   }  
   return false;  
  
   }// end if        
}// end backspace  
  
function FormataReais(fld, milSep, decSep, e) {  
var sep = 0;  
var key = '';  
var i = j = 0;  
var len = len2 = 0;  
var strCheck = '0123456789';  
var aux = aux2 = '';  
var whichCode = (window.Event) ? e.which : e.keyCode;  
  
//if (whichCode == 8 ) return true; //backspace - estamos tratando disso em outra função no keydown  
if (whichCode == 0 ) return true;  
if (whichCode == 9 ) return true; //tecla tab  
if (whichCode == 13) return true; //tecla enter  
if (whichCode == 16) return true; //shift internet explorer  
if (whichCode == 17) return true; //control no internet explorer  
if (whichCode == 27 ) return true; //tecla esc  
if (whichCode == 34 ) return true; //tecla end  
if (whichCode == 35 ) return true;//tecla end  
if (whichCode == 36 ) return true; //tecla home  
  
/* 
O trecho abaixo previne a ação padrão nos navegadores. Não estamos inserindo o caractere normalmente, mas via script 
*/  
  
if (e.preventDefault){ //standart browsers  
      e.preventDefault()  
   }else{ // internet explorer  
      e.returnValue = false  
}  
  
var key = String.fromCharCode(whichCode);  // Valor para o código da Chave  
if (strCheck.indexOf(key) == -1) return false;  // Chave inválida  
  
/* 
Concatenamos ao value o keycode de key, se esse for um número 
*/  
fld.value += key;  
  
var len = fld.value.length;  
var bodeaux = demaskvalue(fld.value,true).formatCurrency();  
fld.value=bodeaux;  
  
/* 
Essa parte da função tão somente move o cursor para o final no opera. Atualmente não existe como movê-lo no konqueror. 
*/  
  if (fld.createTextRange) {  
    var range = fld.createTextRange();  
    range.collapse(false);  
    range.select();  
  }  
  else if (fld.setSelectionRange) {  
    fld.focus();  
    var length = fld.value.length;  
    fld.setSelectionRange(length, length);  
  }  
  return false;  
  
}


/*
Permite apenas numeros e uma virgula
*/
function keypressed( obj , e ) {
	var tecla = ( window.event ) ? e.keyCode : e.which;
	var texto = obj.value;
	var indexvir = texto.indexOf(",");
	var indexpon = texto.indexOf(".");
	
	if ( tecla == 8 || tecla == 0 )
		return true;
	if ( tecla != 44 && tecla != 46 && tecla < 48 || tecla > 57 )
		return false;
	if (tecla == 44) { if (indexvir !== -1 || indexpon !== -1) {return false} }
	if (tecla == 46) { if (indexvir !== -1 || indexpon !== -1) {return false} }
}


/* 
Mascara horas validas
*/
function Mascara_Hora(Hora){
	if (Hora.length == 1){ 
		Hora = '0'+Hora+':00';
	}
	if (Hora.length == 2){ 
		Hora = Hora+':00';
	}
	if (Hora.length == 4){ 
		Hora = Hora+'0';
	}
	return Hora;
} 

/*
Preenche numero com zeros a esquerda
*/
function preencheZeros(valor,tamanho){
	var qtd = valor.length;
	
	if(qtd < tamanho){
		var limite = tamanho-qtd;
		for(i=0;i<limite;i++){
			valor = '0'+valor;
		}
	}
	return valor;
} 


/* 
Verifica horas validas
*/
function Verifica_Hora(campo){  
   hrs = (campo.value.substring(0,2));
   min = (campo.value.substring(3,5));
   estado = "";  
   if ((hrs < 00 ) || (hrs > 23) || ( min < 00) || ( min > 59)){
      estado = "errada";  
   }
   if (campo.value == "") {  
      estado = "errada";  
   }
   
   if (estado == "errada")
   { return false; } 
   else
   { return true; }
}

function digito(aid){
	document.getElementById(aid+'_div').className = '';
}

function submeter(form,metodo,acao,aba){
   with (document.getElementById(form)) {
   method = metodo;
   action = acao;
   jan = openWinbuttons('',aba,800,400); 
   target = aba;
   submit();
   }
   return true;
}

function openWinbuttons(popup_url,name,width,height) 
{
	var size = ',width=' + width + ',height=' + height;
	//var posicion = ",left="+Math.round(screen.availWidth/3)+",top="+Math.round(screen.availHeight/3);
	var posicion = ",left="+Math.round((screen.availWidth-width)/2)+",top="+Math.round((screen.availHeight-height)/2);
	var popUp=window.open(popup_url,name,'resizable=yes,menubar=yes,location=no,toolbar=yes,status=yes,scrollbars=yes,directories=no,'+size+posicion);
	popUp.opener=self;
}

function config_botoes()
{
	if($('btn_voltar_bottom').is(':disabled') == false)
	{
		$('#btn_salvar_top').attr("disabled", true);
		$('#btn_salvar_bottom').attr("disabled", true);
		$('#btn_novo').attr("disabled", true);
		$('#btn_continuar').attr("disabled", true);
		$('#btn_voltar_top').attr("disabled", true);
		$('#btn_voltar_bottom').attr("disabled", true);
		$('#btn_voltar_top').attr("onclick", "");
		$('#btn_remover').attr("disabled", true);
	}
	else
	{ 
		$('#btn_salvar_top').removeAttr("disabled");
		$('#btn_salvar_bottom').removeAttr("disabled");
		$('#btn_novo').removeAttr("disabled");
		$('#btn_continuar').removeAttr("disabled");
		$('#btn_voltar_top').removeAttr("disabled");
		$('#btn_voltar_bottom').removeAttr("disabled");
		$('#btn_remover').removeAttr("disabled");
	}
}
