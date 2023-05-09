// JavaScript Document
/*
*    Script:    Mascaras em Javascript
*    Autor:    Matheus Biagini de Lima Dias
*    Data:    26/08/2008
*    Obs:    
*/

	//retorna o valor do campo
	//passar campo como objeto
	function valor(campo)
	{
		var valor_var;
		
		valor_var = Array();
		
		if (campo == null)
		{alert('Campo inexistente!');}
		else
		{
			var tipo = campo.type;			//recebe o tipo do campo
			var quant_campo = campo.length;	//recebe a quantidade dos campos (caso seja uma array de campos, se nÃ£o recebe a quantidade de caracteres!)
		
			if  (tipo == 'select-one')
			{
				valor_var.push(campo.options[campo.selectedIndex].value);
			}
			else if (tipo == 'select-multiple')
			{
				for(i=0; i < campo.length; i++){if(campo.options[i].selected) valor_var.push(campo.options[i].value);}
			}
			else if (tipo == undefined || tipo == 'checkbox')
			{ 
				if (quant_campo != undefined){for(i=0; i<quant_campo; i++ ){if (campo[i].checked) valor_var.push(campo[i].value);}}
				else{if (campo.checked) valor_var.push(campo.value);}
			}
			else if (tipo == 'text'){valor_var.push(campo.value);}
			
			return valor_var.join(',');
		}
	}

	function limpa_espacos(str)
	{
		var nova_str = str;
		for(i=0;i<=str.length ;i++)
		{
			nova_str = nova_str.replace(' ','');
		}	
		return nova_str;
	}

    /*Função Pai de Mascaras*/
    function Mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    
    /*Função que Executa os objetos*/
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    
    /*Função que Determina as expressões regulares dos objetos*/
    function leech(v){
        v=v.replace(/o/gi,"0")
        v=v.replace(/i/gi,"1")
        v=v.replace(/z/gi,"2")
        v=v.replace(/e/gi,"3")
        v=v.replace(/a/gi,"4")
        v=v.replace(/s/gi,"5")
        v=v.replace(/t/gi,"7")
        return v
    }
    
    /*Função que permite apenas numeros*/
    function Integer(v){
        return v.replace(/\D/g,"")
    }
    
    /*Função que permite apenas letras*/
    function Letras(v){
        var alph = /^[a-zA-Z]+$/;
		if(v.match(alph) || v==''){
			return v;
		}
		else{
			return v.substring(0,v.length-1)
		}
    }

    /*Função que padroniza CEP*/
    function Cep(v){
        v=v.replace(/\D/g,"")                
        v=v.replace(/^(\d{5})(\d)/,"$1-$2") 

        return v
    }    
	
	/*Função que padroniza telefone (11) 4184-1241*/
    function Telefone(v){
        v=v.replace(/\D/g,"")
        v=v.replace(/^(\d\d)(\d)/g,"($1) $2")
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
        return v
    }
    
    /*Função que padroniza telefone (11) 41841241*/
    function TelefoneCall(v){
        v=v.replace(/\D/g,"")                 
        v=v.replace(/^(\d\d)(\d)/g,"($1) $2")    
        return v
    }
    
     /*Função que padroniza telefone 4184-1241*/
    function Fone(v){
        v=v.replace(/\D/g,"")                 
        v=v.replace(/(\d{4})(\d)/,"$1-$2")    
        return v
    }
    
    /*Função que padroniza CPF*/
    function Cpf(v){
        v=v.replace(/\D/g,"")                    
        v=v.replace(/(\d{3})(\d)/,"$1.$2")       
        v=v.replace(/(\d{3})(\d)/,"$1.$2")       
        v=v.replace(/(\d{3})(\d)/,"$1-$2")                                        
    /*    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")	*/
        return v
    }
    
    /*Função que padroniza Data*/
    function Datas(v){
        v=v.replace(/\D/g,"")                    
        v=v.replace(/(\d{2})(\d)/,"$1/$2")       
        v=v.replace(/(\d{2})(\d)/,"$1/$2")                                       
    /*    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")	*/
        return v
    }
	 
	 /*Função que padroniza Data ESPECIAL*/
    function DatasEsp(v){             
	 	  v=v.replace(/\D/g,"")       
        v=v.replace(/(\d{2})(\d)/,"$1/$2")       
        v=v.replace(/(\d{2})(\d)/,"$1/$2")                                       
    /*    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")	*/
        return v
    }
    
    /*Função que padroniza CNPJ*/
    function Cnpj(v){
        v=v.replace(/\D/g,"")                   
        v=v.replace(/^(\d{2})(\d)/,"$1.$2")     
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") 
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           
        v=v.replace(/(\d{4})(\d)/,"$1-$2")              
        return v
    }
    
    /*Função que padroniza Inscrição Estadual*/
    function Insc_estadual(v){
        v=v.replace(/\D/g,"")                    
        v=v.replace(/(\d{3})(\d)/,"$1.$2")       
        v=v.replace(/(\d{3})(\d)/,"$1.$2")       
        v=v.replace(/(\d{3})(\d)/,"$1.$2")                                        
    /*    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")	*/
        return v
    }
    
    /*Função que permite apenas numeros Romanos*/
    function Romanos(v){
        v=v.toUpperCase()             
        v=v.replace(/[^IVXLCDM]/g,"") 
        
        while(v.replace(/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/,"")!="")
            v=v.replace(/.$/,"")
        return v
    }
    
    /*Função que padroniza o Site*/
    function Site(v){
        v=v.replace(/^http:\/\/?/,"")
        dominio=v
        caminho=""
        if(v.indexOf("/")>-1)
            dominio=v.split("/")[0]
            caminho=v.replace(/[^\/]*/,"")
            dominio=dominio.replace(/[^\w\.\+-:@]/g,"")
            caminho=caminho.replace(/[^\w\d\+-@:\?&=%\(\)\.]/g,"")
            caminho=caminho.replace(/([\?&])=/,"$1")
        if(caminho!="")dominio=dominio.replace(/\.+$/,"")
            v="http://"+dominio+caminho
        return v
    }

    /*Função que padroniza DATA*/
    function Data(v){
        v=v.replace(/\D/g,"") 
        v=v.replace(/(\d{2})(\d)/,"$1/$2") 
        v=v.replace(/(\d{2})(\d)/,"$1/$2") 
        return v
    }
    
    /*Função que padroniza DATA*/
    function Hora(v){
        v=v.replace(/\D/g,"") 
        v=v.replace(/(\d{2})(\d)/,"$1:$2")  
      return v
    }
    
    /*Função que padroniza valor monétario*/
    function Valor(v){
        v=v.replace(/\D/g,"") //Remove tudo o que não é dígito
        v=v.replace(/^([0-9]{3}\.?){3}-[0-9]{2}$/,"$1.$2");
        //v=v.replace(/(\d{3})(\d)/g,"$1.$2")
        v=v.replace(/(\d)(\d{2})$/,"$1,$2") //Coloca ponto antes dos 2 últimos digitos
        return v
    }
    
    /*Função que padroniza Area*/
    function Area(v){
        v=v.replace(/\D/g,"") 
        v=v.replace(/(\d)(\d{2})$/,"$1.$2") 
        return v
        
    }
	
	//valida telefone
	function ValidaTelefone(tel)
	{
		exp = /\(\d{2}\)\ \d{4}\-\d{4}/
		if(!exp.test(tel.value))return false; else return true;
	}
	
	//valida CEP
	function ValidaCep(cep){
		exp = /\d{5}\-\d{3}/
		if(!exp.test(cep.value))return false; else return true;       
	}
	
	//valida data
	function ValidaData(data){
		exp = /\d{2}\/\d{2}\/\d{4}/
		if(!exp.test(data.value))return false; else return true;
	}	

	function ValidaEmail(mail)
	{
		var reTipo = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i; /// /^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/;
		return reTipo.test(mail);
		/*
		var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
		if(typeof(mail) == "string")
		{	
			return er.test(mail)
		}
		else if(typeof(mail) == "object")
		{
			return er.test(mail.value)
		}
		else
		{
			return false;
		}
		*/
	}
	
	
	function ValidaData(str_data)
	{
		
		var array_data = new Array;
		var ExpReg = new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
		var dia, mes, ano;
		
		dia = '00' + str_data.split('/')[0];
		dia = dia.substr(dia.length-2, 2);
		
		mes = '00' + str_data.split('/')[1];
		mes = mes.substr(mes.length-2, 2);
		
		ano = '0000' + str_data.split('/')[2];
		ano = ano.substr(ano.length-4, 4);
		
		var date = dia + '/' + mes + '/' + ano; //no formato dd/mm/aaaa
		
		if (date.length < 10) {
			erro = true;
		}
		else
		{
			//vetor que contem o dia o mes e o ano
			array_data = date.split("/");
			erro = false;
			//Valido se a data esta no formato dd/mm/yyyy e se o dia tem 2 digitos e esta entre 01 e 31
			//se o mes tem d2 digitos e esta entre 01 e 12 e o ano se tem 4 digitos e esta entre 1000 e 2999
			if ( date.search(ExpReg) == -1 )
				erro = true;
			//Valido os meses que nao tem 31 dias com execao de fevereiro
			else if ( ( ( array_data[1] == 4 ) || ( array_data[1] == 6 ) || ( array_data[1] == 9 ) || ( array_data[1] == 11 ) ) && ( array_data[0] > 30 ) )
				erro = true;
			//Valido o mes de fevereiro
			else if ( array_data[1] == 2 ) {
				//Valido ano que nao e bissexto
				if ( ( array_data[0] > 28 ) && ( ( array_data[2] % 4 ) != 0 ) )
					erro = true;
				//Valido ano bissexto
				if ( ( array_data[0] > 29 ) && ( ( array_data[2] % 4 ) == 0 ) )
					erro = true;
			}
		}
		
		return !erro;
	}
	
	function ValidaCPF(cpf)
	{
		var CPF = cpf.replace('.','').replace('.','').replace('/','').replace('-',''); // Recebe o valor digitado no campo

		// Verifica se o campo é nulo
		if (CPF == '') {
		  return false;
		   }
		
		// Aqui começa a checagem do CPF
		var posicao, i, soma, dv, dv_informado;
		var digito = new Array(10);
		dv_informado = CPF.substr(9, 2); // Retira os dois últimos dígitos do número informado
		
		// Desemembra o número do CPF na array digito
		for (i=0; i<=8; i++) {
		  digito[i] = CPF.substr( i, 1);
		}
		
		// Calcula o valor do 10º dígito da verificação
		posicao = 10;
		soma = 0;
		   for (i=0; i<=8; i++) {
			  soma = soma + digito[i] * posicao;
			  posicao = posicao - 1;
		   }
		digito[9] = soma % 11;
		   if (digito[9] < 2) {
				digito[9] = 0;
		}
		   else{
			   digito[9] = 11 - digito[9];
		}
		
		// Calcula o valor do 11º dígito da verificação
		posicao = 11;
		soma = 0;
		   for (i=0; i<=9; i++) {
			  soma = soma + digito[i] * posicao;
			  posicao = posicao - 1;
		   }
		digito[10] = soma % 11;
		   if (digito[10] < 2) {
				digito[10] = 0;
		   }
		   else {
				digito[10] = 11 - digito[10];
		   }
		
		// Verifica se os valores dos dígitos verificadores conferem
		dv = digito[9] * 10 + digito[10];
		   if (dv != dv_informado) {
			  return false;
		   } 
		return true;
	}
	
	//valida o CNPJ digitado
	function ValidaCNPJ(ObjCnpj)
	{
		var cnpj = ObjCnpj;
		var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
		var dig1= new Number;
		var dig2= new Number;
		
		exp = /\.|\-|\//g
		cnpj = cnpj.toString().replace( exp, "" ); 
		var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
			
		for(i = 0; i<valida.length; i++){
			dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);    
			dig2 += cnpj.charAt(i)*valida[i];    
		}
		dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
		dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
		
		if(((dig1*10)+dig2) != digito)return false; else return true;
			
	}