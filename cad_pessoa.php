
    <body class="sb-nav-fixed">
    <?php
    require 'layout.php';
    say_header();
    ?>        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Cadastro de Pessoa</h1>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                Cadastros de pessoas físicas e jurídicas
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-2">
                            <a class="btn btn-success" onclick='novo();'>Novo</a>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $data = $conn->query('SELECT * FROM pessoa');

                                        echo $data->nome;
                                        // while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                                            
                                        // }
                                        ?>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>                
            </div>
        </div>
        <?php
        say_footer_cad();
        ?>
    </body>
</html>
