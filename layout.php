<?php

function say_header(){
require 'dist/conexao.php';
ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
    echo"
    <!DOCTYPE html>
    <html lang='pt-br'>
    ini_set(‘display_errors’, 0);
ini_set(‘display_startup_erros’, 0);
    <head>
        <meta charset='utf-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
        <meta name='description' content='' />
        <meta name='author' content='' />
        <title>Home - Controle de Devedores</title>
        <link href='https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css' rel='stylesheet' />
        <link href='css/styles.css' rel='stylesheet' />
        <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js' crossorigin='anonymous'></script>
    </head>
    <nav class='sb-topnav navbar navbar-expand navbar-dark bg-dark'>
    <!-- Navbar Brand-->
    <a class='navbar-brand ps-3' href='index.php'>Controle de Devedores</a>
    <!-- Sidebar Toggle-->
    <button class='btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0' id='sidebarToggle' href='#!'><i class='fas fa-bars'></i></button>
    <!-- Navbar Search-->
    <form class='d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0'>
    </form>
    <!-- Navbar-->
    <ul class='navbar-nav ms-auto ms-md-0 me-3 me-lg-4'>
        <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' id='navbarDropdown' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='fas fa-user fa-fw'></i></a>
            <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>                
                <li><a class='dropdown-item' href='index.php'>Sair</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id='layoutSidenav'>
    <div id='layoutSidenav_nav'>
        <nav class='sb-sidenav accordion sb-sidenav-dark' id='sidenavAccordion'>
            <div class='sb-sidenav-menu'>
                <div class='nav'>
                    <div class='sb-sidenav-menu-heading'>Lead</div>
                    <a class='nav-link' href='home.php'>
                        <div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>
                        Dashboard
                    </a>
                    <div class='sb-sidenav-menu-heading'>Controle</div>
                    <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseLayouts' aria-expanded='false' aria-controls='collapseLayouts'>
                        <div class='sb-nav-link-icon'><i class='fas fa-columns'></i></div>
                        Cadastros
                        <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                    </a>
                    <div class='collapse' id='collapseLayouts' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                        <nav class='sb-sidenav-menu-nested nav'>
                            <a class='nav-link' href='cad_pessoa.php'>Pessoas</a>
                            <a class='nav-link' href='layout-sidenav-light.html'>Devedores</a>
                            <a class='nav-link' href='layout-sidenav-light.html'>Dívidas</a>
                        </nav>
                    </div>
                    <div class='sb-sidenav-menu-heading'>Relatórios</div>
                    <a class='nav-link' href='charts.html'>
                        <div class='sb-nav-link-icon'><i class='fas fa-chart-area'></i></div>
                        Charts
                    </a>
                    <a class='nav-link' href='tables.html'>
                        <div class='sb-nav-link-icon'><i class='fas fa-table'></i></div>
                        Tables
                    </a>
                </div>
            </div>
        </nav>
    </div>";

    

}

function say_footer_dash(){

    echo"<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js' crossorigin='anonymous'></script>
    <script src='js/scripts.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js' crossorigin='anonymous'></script>
    <script src='assets/demo/chart-area-demo.js'></script>
    <script src='assets/demo/chart-bar-demo.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/simple-datatables@latest' crossorigin='anonymous'></script>
    <script src='js/datatables-simple-demo.js'></script>
    ";

}
function say_footer_cad(){

    echo"<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js' crossorigin='anonymous'></script>
    <script src='js/scripts.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/simple-datatables@latest' crossorigin='anonymous'></script>
    <script src='js/datatables-simple-demo.js'></script>
    <script src='js/cad_pessoa.js'></script>
    ";

}