function isArray(variavel)
{

	if (navigator.appName == 'Microsoft Internet Explorer')
	{
		if (variavel[0] == undefined) { return false; } else { return true; }	
	}
	else
	{
		if (variavel == null || variavel == undefined || variavel.length == variavel.toString().length) return false; else return true;	}
}

function remove_dados(campo)
{ 
	var tamanho = campo.length;
	var i;
	for (i=0; i<tamanho; i++) 
	{ 
		campo.options[0] = null;
	}
}


function adiciona_dados(campo,valores,textos)
{
	var novo_indice, op;
	if (!(isArray(valores))) {valores = valores.split(",");}
	if (!(isArray(textos))) {textos = textos.split(",");}
	if (valores.length == textos.length)
	{
		for(i=0; i<=valores.length-1; i++ )
		{
			op = new Option(textos[i],valores[i]);
			if (campo.options.length == undefined) {novo_indice = 0;} else {novo_indice = campo.options.length;}
			campo.options[novo_indice] = op;
		}
	}
	else
	{
		op = new Option(textos,valores);
		if (campo.options.length == undefined) {novo_indice = 0;} else {novo_indice = campo.options.length;}
		campo.options[novo_indice] = op;
	}
}
