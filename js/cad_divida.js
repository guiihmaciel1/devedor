function cadastrar_divida()
{
   with(retorno)
   {
      opc.value = '1';
      action = 'cad_divida.php';
      submit();
   }
}
function voltar()
{
   with(retorno)
   {
      opc.value = '0';
      action = 'cad_divida.php';
      submit();
   }
}

function salvar()
{
    with(retorno)
    {
       if (descricao.value == '')
       {
          alert('descricao não informado', function () { descricao.focus(); });
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

function editar_divida(id_divida)
{
   with(retorno)
   {
      opc.value = '3';
      action = 'cad_divida.php?id_divida=' + id_divida;
      submit();
   }
}

function editar()
{
    with(retorno)
    {
       if (descricao.value == '')
       {
          alert('descricao não informado', function () { descricao.focus(); });
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