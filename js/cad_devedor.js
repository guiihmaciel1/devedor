function cadastrar_devedor()
{
   with(retorno)
   {
      opc.value = '1';
      action = 'cad_devedor.php';
      submit();
   }
}
function voltar()
{
   with(retorno)
   {
      opc.value = '0';
      action = 'cad_devedor.php';
      submit();
   }
}

function salvar()
{
    with(retorno)
    {
       if (pessoa.value == '')
       {
          alert('Pessoa não informado', function () { pessoa.focus(); });
          return;
       }else if (divida.value == '')
       {
          alert('Divida não informada', function () { divida.focus(); });
          return;
       }
       else if (valor.value == '')
       {
          alert('Valor não informado', function () { valor.focus(); });
          return;
       }
       else if (updated.value == '')
       {
          alert('Data não informada', function () { updated.focus(); });
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

function editar_devedor(id_devedor)
{
   with(retorno)
   {
      opc.value = '3';
      action = 'cad_devedor.php?id_devedor=' + id_devedor;
      submit();
   }
}

function editar()
{
    with(retorno)
    {
      if (pessoa.value == '')
      {
         alert('Pessoa não informado', function () { pessoa.focus(); });
         return;
      }else if (divida.value == '')
      {
         alert('Divida não informada', function () { divida.focus(); });
         return;
      }
      else if (valor.value == '')
      {
         alert('Valor não informado', function () { valor.focus(); });
         return;
      }
      else if (updated.value == '')
      {
         alert('Data não informada', function () { updated.focus(); });
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