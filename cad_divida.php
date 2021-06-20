
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
                        <h1 class="mt-4">Cadastro de Dívidas</h1>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                Aqui serão cadastradas todas os tipos de dívidas.
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                        <form name='retorno' method='post' action='cad_divida.php'>
                            <input type='hidden' name='opc'>
                            <a class="btn btn-success" onclick='cadastrar_divida();'>Novo</a>
                        </form>
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $query='select * from divida where status != 0  order by id_divida desc';
                                        $con       = pdo_open();
                                        $result    = query($query);
                                        while ($row = $result->fetchObject())
                                        { echo"
                                            <tr>                                               
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_divida(\"$row->id_divida\")'>$row->id_divida<a></td>
                                                <td><a style='text-decoration:none; color:#000' href='#op' onclick='editar_divida(\"$row->id_divida\")'>$row->descricao<a></td>
                                                
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
                            Aqui serão cadastradas todas os tipos de dívidas.
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                        <form name='retorno' method='post' action='cad_divida.php'>
                            <input type='hidden' name='opc'>
                            <a class="btn btn-warning" onclick='voltar();'>Voltar</a>                           
                            
                        
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    Descricao
                                    <input class="form-control" id="descricao" name="descricao" type="text" >                                    
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
                    $descricao = strtoupper(trim($_POST['descricao']));                    
                    $query     = "insert into divida (descricao, status) values
                    ('$descricao',1);";
                    $con         = pdo_open();
                    $con->query($query);                    
                    $con = null;
                    header("Location: cad_divida.php");
                }
            elseif ($opc == 3) {
                $id_divida = $_GET['id_divida'];   
                $con    = pdo_open();
                $query  = "
                SELECT * FROM divida where id_divida = $id_divida";
                $result       = query($query);
                $row          = $result->fetchObject();                
                $descricao    = $row->descricao;                
                $con          = null;
                ?>

<main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Alteração</h1>
                    
                    <div class="card mb-4">
                        <div class="card-body">
                        Aqui serão cadastradas todas os tipos de dívidas.
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                    <form name='retorno' method='post' action='cad_divida.php'>
                        <input type='hidden' name='opc'>
                        <input type='hidden' name='id_divida' value='<?=$id_divida?>'>
                        <a class="btn btn-warning" onclick='voltar();'>Voltar</a>                        
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">                         
                        <div class="row">
                            <div class="col-md-12">
                                Descrição
                                <input class="form-control" id="descricao" name="descricao" type="text" value='<?=$descricao?>'>                                    
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
                $id_divida = $_POST['id_divida'];
                $descricao = strtoupper(trim($_POST['descricao']));
                $query       = "update divida set descricao = '$descricao' where id_divida = $id_divida;";
                $con         = pdo_open();
                #echo $query;
                $con->query($query);                    
                $con = null;
                header("Location: cad_divida.php");
            }else if ($opc == 5)
            {
                $id_divida = $_POST['id_divida'];                
                $query       = "update divida set status = 0 where id_divida = $id_divida;";
                $con         = pdo_open();
                #echo $query;
                $con->query($query);                    
                $con = null;
                header("Location: cad_divida.php");
            }
                ?>               
            </div>
        </div>
    
        <?php
        say_footer_cad_divida();
        
        ?>
    </body>
</html>
