
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
                        <h1 class="mt-4">Cadastro de Pessoa</h1>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                Cadastros de pessoas físicas e jurídicas
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                        <form name='retorno' method='post' action='cad_pessoa.php'>
                            <input type='hidden' name='opc'>
                            <a class="btn btn-success" onclick='cadastrar_pessoa();'>Novo</a>
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
                                            <th>Data de Nascimento</th>
                                            <th>Endereço</th>                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $query='select * from pessoa order by id_pessoa desc';
                                        $con       = pdo_open();
                                        $result    = query($query);
                                        while ($row = $result->fetchObject())
                                        { echo"
                                            <tr>                                               
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_pessoa(\"$row->id_pessoa\")'>$row->id_pessoa<a></td>
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_pessoa(\"$row->id_pessoa\")'>$row->nome<a></td>
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_pessoa(\"$row->id_pessoa\")'>$row->cpfcnpj<a></td>
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_pessoa(\"$row->id_pessoa\")'>$row->dtnasc<a></td>
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_pessoa(\"$row->id_pessoa\")'>$row->endereco<a></td>                                                
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
                                Cadastros de pessoas físicas e jurídicas
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                        <form name='retorno' method='post' action='cad_pessoa.php'>
                            <input type='hidden' name='opc'>
                            <a class="btn btn-warning" onclick='voltar();'>Voltar</a>                           
                            
                        
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    Nome
                                    <input class="form-control" id="nome" name="nome" type="text" >                                    
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    CPF/CNPJ
                                    <input class="form-control" id="cpfcnpj" name="cpfcnpj" type="text"  >
                                </div>      
                                <div class="col-md-6">         
                                    Data de Nascimento
                                    <input class="form-control" id="dtnasc" name="dtnasc" type="date"  >
                                </div>
                                </div>
                                
                                <div class="col-md-12">         
                                    Endereço Completo
                                    <input class="form-control" id="endereco" name="endereco" type="text" >
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
                    $nome = strtoupper(trim($_POST['nome']));
                    $cpfcnpj = trim($_POST['cpfcnpj']);
                    $dtnasc = $_POST['dtnasc'];
                    $endereco = strtoupper(trim($_POST['endereco'])); 
                    $query       = "insert into pessoa (nome, cpfcnpj,  dtnasc, endereco) values
                    ('$nome', $cpfcnpj, '$dtnasc', '$endereco');";
                    $con         = pdo_open();
                    $con->query($query);                    
                    $con = null;
                    header("Location: cad_pessoa.php");
                }
            elseif ($opc == 3) {
                $id_pessoa = $_GET['id_pessoa'];   
                $con    = pdo_open();
                $query  = "
                SELECT * FROM pessoa where id_pessoa = $id_pessoa";
                $result       = query($query);
                $row          = $result->fetchObject();                
                $nome    = $row->nome;
                $cpfcnpj = $row->cpfcnpj;
                $dtnasc  = $row->dtnasc;
                $endereco= $row->endereco;
                $con          = null;
                ?>

            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Alteração</h1>
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            Cadastros de pessoas físicas e jurídicas
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                    <form name='retorno' method='post' action='cad_pessoa.php'>
                        <input type='hidden' name='opc'>
                        <input type='hidden' name='id_pessoa' value='<?=$id_pessoa?>'>
                        <a class="btn btn-warning" onclick='voltar();'>Voltar</a>                        
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">                         
                        <div class="row">
                            <div class="col-md-12">
                                Nome
                                <input class="form-control" id="nome" name="nome" type="text" value='<?=$nome?>'>                                    
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                CPF/CNPJ
                                <input class="form-control" id="cpfcnpj" name="cpfcnpj" type="text" value='<?=$cpfcnpj?>' >
                            </div>      
                            <div class="col-md-6">         
                                Data de Nascimento
                                <input class="form-control" id="dtnasc" name="dtnasc" type="date" value='<?=$dtnasc?>' >
                            </div>
                            </div>
                            
                            <div class="col-md-12">         
                                Endereço Completo
                                <input class="form-control" id="endereco" name="endereco" type="text" value='<?=$endereco?>'>
                            </div>
                            </div>
                            </div>
                            <a class="btn btn-success" onclick='editar();'>Salvar edição</a>
                        </form>
                        </div>
                    </div>
                </div>
            </main> 

                <?php
            }
            elseif ($opc == 4) {
                $id_pessoa = $_POST['id_pessoa'];
                $nome = strtoupper(trim($_POST['nome']));
                $cpfcnpj = trim($_POST['cpfcnpj']);
                $dtnasc = $_POST['dtnasc'];
                $endereco = strtoupper(trim($_POST['endereco'])); 
                $query       = "update pessoa set nome = '$nome', cpfcnpj = '$cpfcnpj', dtnasc = '$dtnasc', endereco = '$endereco' where id_pessoa = $id_pessoa;";
                $con         = pdo_open();
                #echo $query;
                $con->query($query);                    
                $con = null;
                header("Location: cad_pessoa.php");
            }
                ?>               
            </div>
        </div>
    
        <?php
        say_footer_cad();
        
        ?>
    </body>
</html>
