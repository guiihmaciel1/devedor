
    <body class="sb-nav-fixed">
        
    <?php    
    require 'layout.php';
    say_header();
      
    ?>        
            <div id="layoutSidenav_content">
                <?php
                $opc            = $_POST['opc']; 
                if (isset($opc)) { $opc == 0; }
                if ($opc == 0)
                {
                ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Cadastro de Devedores</h1>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                Aqui será feita a ligação de uma pessoa a uma dívida tornando um devedor.
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                        <form name='retorno' method='post' action='cad_devedor.php'>
                            <input type='hidden' name='opc'>
                            <a class="btn btn-success" onclick='cadastrar_devedor();'>Novo</a>
                        </form>
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>Cpf/Cnpj</th>
                                            <th>Descrição dívida</th>
                                            <th>Valor</th>                                            
                                            <th>Última atualização</th>    
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $query='SELECT a.id_devedor, a.id_pessoa, a.id_divida, b.nome,b.cpfcnpj, c.descricao, a.valor, a.updated 
                                                FROM devedores a, pessoa b, divida c 
                                                WHERE b.id_pessoa = a.id_pessoa 
                                                and c.id_divida = a.id_divida 
                                                and a.status != 0 
                                                order by a.id_devedor desc';
                                        $con       = pdo_open();
                                        $result    = query($query);
                                        while ($row = $result->fetchObject())
                                        { echo"
                                            <tr>                                               
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_devedor(\"$row->id_devedor\")'>$row->id_devedor<a></td>
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_devedor(\"$row->id_devedor\")'>$row->nome<a></td>
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_devedor(\"$row->id_devedor\")'>$row->cpfcnpj<a></td>
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_devedor(\"$row->id_devedor\")'>$row->descricao<a></td>
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_devedor(\"$row->id_devedor\")'>$row->valor<a></td>                                                
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_devedor(\"$row->id_devedor\")'>$row->updated<a></td>    
                                            </tr>  
                                            ";
                                        }
                                        $con = null;                                        
                                        
                                        ?>                                                                           
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main> 
                <?php
                }elseif ($opc == 1) {
                    ?>

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Inclusão</h1>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                            Aqui será feita a ligação de uma pessoa a uma dívida tornando um devedor.
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                        <form name='retorno' method='post' action='cad_devedor.php'>
                            <input type='hidden' name='opc'>
                            <a class="btn btn-warning" onclick='voltar();'>Voltar</a>                           
                            
                        
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="row">
                            <script></script>
                                <div class="col-md-12">
                                    Pessoa
                                    <input class="form-control" list="datalistpessoa" id="pessoa" name="pessoa" placeholder="Digite para pesquisar...">
                                    <datalist id="datalistpessoa">
                                        
                                        <?php 
                                        $query='select * from pessoa where status != 0  order by id_pessoa desc';
                                        $con       = pdo_open();
                                        $result    = query($query);
                                        #echo $query;
                                        while ($row = $result->fetchObject())
                                        { echo"
                                            <option value='$row->id_pessoa - $row->nome'>Cpf/Cnpj: $row->cpfcnpj </option>
                                            ";
                                        }
                                        
                                        $con = null;                                        
                                        
                                        ?>                                          
                                    </datalist>

                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                Dívida
                                    <input class="form-control" list="datalistdivida" id="divida" name="divida" placeholder="Digite para pesquisar...">
                                    <datalist id="datalistdivida">
                                        
                                        <?php 
                                        $query='select * from divida where status != 0  order by id_divida desc';
                                        $con       = pdo_open();
                                        $result    = query($query);
                                        #echo $query;
                                        while ($row = $result->fetchObject())
                                        { echo"
                                            <option value='$row->id_divida - $row->descricao'></option>
                                            ";
                                        }
                                        $con = null;                                        
                                        
                                        ?>                                          
                                    </datalist>
                                </div>  
                                <div class='row'>
                                <div class="col-md-6">         
                                    Valor
                                    <input class="form-control" id="valor" name="valor" type="text" >
                                </div>
                                <div class="col-md-6">         
                                    Data de Atualização
                                    <input class="form-control" id="updated" name="updated" type="date"  >
                                </div>
                                </div>
                                </div>
                                
                                
                                </div>
                                </div>
                                <a class="btn btn-success" onclick='salvar();'>Salvar</a>
                            </form>
                            </div>
                        </div>
                    </div>
                </main> 

                    <?php
                }
                elseif ($opc == 2) {
                    $pessoa  = $_POST['pessoa'];
                    $divida  = $_POST['divida'];
                    $valor   = str_replace(",",".",str_replace(".","",$_POST['valor']));
                    $updated = $_POST['updated'];
                    $pessoa  = explode("-", trim($pessoa));
                    $divida  = explode("-", trim($divida));     
                    $query       = "insert into devedores (id_pessoa, id_divida, valor, updated, status) values
                    ('$pessoa[0]', $divida[0], '$valor', '$updated',1);";
                    $con         = pdo_open();
                    #echo $query;
                    $con->query($query);                    
                    $con = null;
                    header("Location: cad_devedor.php");
                }
            elseif ($opc == 3) {
                $id_devedor = $_GET['id_devedor'];   
                $con    = pdo_open();
                $query  = "
                SELECT a.id_devedor, a.id_pessoa, a.id_divida, b.nome,b.cpfcnpj, c.descricao, a.valor, a.updated 
                                                FROM devedores a, pessoa b, divida c 
                                                WHERE b.id_pessoa = a.id_pessoa 
                                                and c.id_divida = a.id_divida 
                                                and id_devedor = $id_devedor";
                $result       = query($query);
                $row          = $result->fetchObject();                
                $id_pessoa = $row->id_pessoa;
                $id_divida = $row->id_divida;
                $nome      = $row->nome;
                $cpfcnpj   = $row->cpfcnpj;
                $descricao = $row->descricao;
                $valor     = $row->valor;
                $updated   = $row->updated;
                $con          = null;
                ?>

            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Alteração</h1>
                    
                    <div class="card mb-4">
                        <div class="card-body">
                        Aqui será feita a ligação de uma pessoa a uma dívida tornando um devedor.
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                    <form name='retorno' method='post' action='cad_devedor.php'>
                        <input type='hidden' name='opc'>
                        <input type='hidden' name='id_devedor' value='<?=$id_devedor?>'>
                        <a class="btn btn-warning" onclick='voltar();'>Voltar</a>                        
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">                         
                        <div class="row">
                        <div class="col-md-12">
                                    Pessoa
                                    <input class="form-control" value="<?=$id_pessoa." - ".$nome?>" onfocus="this.value=''" list="datalistpessoa" id="pessoa" name="pessoa" placeholder="Digite para pesquisar..." autocomplete="off">
                                    <datalist id="datalistpessoa">
                                        
                                        <?php 
                                        
                                        $query='select * from pessoa where status != 0  order by id_pessoa desc';
                                        $con       = pdo_open();
                                        $result    = query($query);
                                        #echo $query;
                                        while ($row = $result->fetchObject())
                                        { 
                                            
                                         echo"<option value='$row->id_pessoa - $row->nome'>Cpf/Cnpj: $row->cpfcnpj </option>";
                                            
                                            
                                        }
                                        
                                        $con = null;                                        
                                        
                                        ?>                                          
                                    </datalist>

                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                Dívida
                                    <input class="form-control" value="<?=$id_divida." - ".$descricao?>" onfocus="this.value=''" list="datalistdivida" id="divida" name="divida" placeholder="Digite para pesquisar..." autocomplete="off">
                                    <datalist id="datalistdivida">
                                        
                                        <?php 
                                        $query='select * from divida where status != 0  order by id_divida desc';
                                        $con       = pdo_open();
                                        $result    = query($query);
                                        #echo $query;
                                        while ($row = $result->fetchObject())
                                        { echo"
                                            <option value='$row->id_divida - $row->descricao'></option>
                                            ";
                                        }
                                        $con = null;                                        
                                        
                                        ?>                                          
                                    </datalist>
                                </div>  



                            <div class='row'>
                                <div class="col-md-6">         
                                    Valor
                                    <input class="form-control" id="valor" name="valor" type="text" value="<?=$valor?>" >
                                </div>
                                <div class="col-md-6">         
                                    Data de Atualização
                                    <input class="form-control" id="updated" name="updated" type="date"   value="<?=$updated?>" >
                                </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            <div class="row"> 
                            <div class="col-md-1"> 
                                <a class="btn btn-success" onclick='editar();'>Salvar</a>
                            </div>&nbsp;&nbsp;
                            <div class="col-md-1"> 
                                <a class="btn btn-danger" onclick='excluir();'>Excluir</a>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </main> 

                <?php
            }
            elseif ($opc == 4) {
                $id_devedor = $_POST['id_devedor'];
                $pessoa  = $_POST['pessoa'];
                $divida  = $_POST['divida'];
                $valor   = str_replace(",",".",str_replace(".","",$_POST['valor']));
                $updated = $_POST['updated'];
                $pessoa  = explode("-", trim($pessoa));
                $divida  = explode("-", trim($divida));
                $query       = "update devedores set id_pessoa = '$pessoa[0]', id_divida = '$divida[0]', valor = '$valor', updated = '$updated' where id_devedor = $id_devedor;";
                $con         = pdo_open();
                #echo $query;
                $con->query($query);                    
                $con = null;
                header("Location: cad_devedor.php");
            }else if ($opc == 5)
            {
                $id_devedor = $_POST['id_devedor'];                
                $query       = "update devedores set status = 0 where id_devedor = $id_devedor;";
                $con         = pdo_open();
                #echo $query;
                $con->query($query);                    
                $con = null;
                header("Location: cad_devedor.php");
            }
                ?>               
            </div>
        </div>
    
        <?php
        say_footer_cad_devedor();
        
        ?>
    </body>
</html>
