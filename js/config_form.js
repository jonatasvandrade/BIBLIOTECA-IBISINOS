function isIn( elm,col ){
	 var e;
	 for(e in col){
	 		if(col[e]==elm){
				return true;
			}
	 }
	 return false;
}


function config_form(campo,valor)
{
	if (campo == null)
	{
		alert('Campo inexistente!');
	}
	else
	{
		var tipo = campo.type;			//recebe o tipo do campo
		var quant_campo = campo.length;	//recebe a quantidade dos campos (caso seja uma array de campos, se não recebe a quantidade de caracteres!)
		valor = valor.split(',')		//converte os valores para array !
		var tam_valor = valor.length;	//recebe a quantidade de campos do array do valor
	
		if  (tipo == 'select-one')
		{
			for(i=0; i<campo.length; i++)
			{
				if(campo.options[i].value == valor[0])
				{
					campo.selectedIndex = i;
					break;
				}
			}
		}
		else if (tipo == 'select-multiple')
		{
			for(i=0; i < campo.length; i++)
			{
				if (isIn(campo.options[i].value, valor))
				{
					campo.options[i].selected = true;
					break;
				}
			}
		}
		else if (tipo == undefined || tipo == 'checkbox')
		{ 
			if (quant_campo != undefined)
			{
				for(i=0; i<quant_campo; i++ )
				{
					if(isIn(campo[i].value,valor))
					{
						campo[i].click();
						if (!(campo[i].checked)) campo[i].checked = true;						
					}
				}
			}
			else
			{
				//alert(campo.value+' - '+valor[0]);
				if(campo.value == valor[0])
				{
					campo.checked = true;
				}
			}
		}
		else if (tipo == 'text' || tipo == 'password' || tipo == 'textarea')
		{
			campo.value = valor[0];	
		}
	}
}
