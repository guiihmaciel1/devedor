function cadastrar_pessoa()
{
   with(retorno)
   {
      opc.value = '1';
      action = 'cad_pessoa.php';
      submit();
   }
}
function voltar()
{
   with(retorno)
   {
      opc.value = '0';
      action = 'cad_pessoa.php';
      submit();
   }
}

function salvar()
{
    with(retorno)
    {
       if (nome.value == '')
       {
          alert('Nome não informado', function () { nome.focus(); });
          return;
       }else if (cpfcnpj.value == '')
       {
          alert('Cpf ou Cnpnj não informado', function () { cpfcnpj.focus(); });
          return;
       }
       else if (dtnasc.value == '')
       {
          alert('Data de nascimento não informada', function () { dtnasc.focus(); });
          return;
       }
       else if (endereco.value == '')
       {
          alert('Endereço não informado', function () { endereco.focus(); });
          return;
       }
       else
        {
            if (confirm("Confirma a inclusão?")) {
                opc.value = '2'; submit(); 
              } else {
                return;
              }
        }

    }  
}

function editar_pessoa(id_pessoa)
{
   with(retorno)
   {
      opc.value = '3';
      action = 'cad_pessoa.php?id_pessoa=' + id_pessoa;
      submit();
   }
}

function editar()
{
    with(retorno)
    {
       if (nome.value == '')
       {
          alert('Nome não informado', function () { nome.focus(); });
          return;
       }else if (cpfcnpj.value == '')
       {
          alert('Cpf ou Cnpnj não informado', function () { cpfcnpj.focus(); });
          return;
       }
       else if (dtnasc.value == '')
       {
          alert('Data de nascimento não informada', function () { dtnasc.focus(); });
          return;
       }
       else if (endereco.value == '')
       {
          alert('Endereço não informado', function () { endereco.focus(); });
          return;
       }
       else
        {
            if (confirm("Confirma a inclusão?")) {
                opc.value = '4'; submit(); 
              } else {
                return;
              }
        }

    }  
}


function excluir()
{
   with(retorno)
   {
      if (confirm("Confirma a exclusão?")) {
         opc.value = '5'; submit(); 
       } else {
         return;
       }
   }
}