<?php
    function menuAdministrador(){
        echo " 
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark pt-3'>
            <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
        <a class='navbar-brand' href='principal'>SCT v. 1.0</a>
        
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto ml-auto'>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='liga-directa' data-toggle='dropdown' aria-haspopup='false' aria-expanded='true'>Elementos (Agregar/Actualizar)</a>
                </li>
                <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Folios</a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        
                        <a class='dropdown-item' href='registrofolio'>Generar Folios</a>
                        <a class='dropdown-item' href='listadofolios'>Consulta de Folios</a>
                    </div>
        </li>
        <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Cat&aacute;logos</a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
        <a class='dropdown-item' href='catsectores'>Cat. Sectores.</a>
        <a class='dropdown-item' href='catresponsables'>Cat. Responsables de Grupo.</a>
        <a class='dropdown-item' href='catarmas'>Cat. Tipo de Arma.</a>
        <a class='dropdown-item' href='catinstructores'>Cat. de Instructores.</a>
        <a class='dropdown-item' href='catjefescampo'>Cat. de Jefes de Campo.</a>
        <a class='dropdown-item' href='catsituacion'>Cat. de Situaciones.</a>
        <a class='dropdown-item' href='catgrados'>Cat. de Grados.</a>
        </div>
        </li>
        <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Ayuda</a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
        <a class='dropdown-item' href='acerca'>Acerca de...</a>
        <a class='dropdown-item' href='manualhelp'>Manual de Usuario</a>
        </div>
        </li>
        <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Administrador</a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
        <a class='dropdown-item' href='11711511797114105111115'>Usuarios</a>
        <a class='dropdown-item' href='catroles'>Roles de Usuarios</a>
        <a class='dropdown-item' href='respaldo'>Respaldos</a>
        <a class='dropdown-item' href='bitacoraacceso'>Bit&aacute;cora de Accesso</a>
        </div>
        </li>
        </ul>
        </div>
        </nav>
       
    ";
    }

    function menuUsuario(){
        echo " 
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark pt-3'>
            <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
        <a class='navbar-brand' href='principal'>SCCP v. 1.0</a>
        
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto ml-auto'>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='false' aria-expanded='true'>Elementos (Agregar/Actualizar)</a>
                </li>
                <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Folios</a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        
                        <a class='dropdown-item' href='registrofolio'>Generar Folios</a>
                        <a class='dropdown-item' href='listadofolios'>Consulta de Folios</a>
                    </div>
        </li>
        <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Cat&aacute;logos</a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
        <a class='dropdown-item' href='catsectores'>Cat. Sectores o Estaciones</a>
        <a class='dropdown-item' href='catresponsables'>Cat. Responsables de Grupo</a>
        <a class='dropdown-item' href='catarmas'>Cat. Tipo de Arma</a>
        <a class='dropdown-item' href='catinstructores'>Cat. de Instructores</a>
        <a class='dropdown-item' href='catjefescampo'>Cat. de Jefes de Campo</a>
        <a class='dropdown-item' href='catsituacion'>Cat. de Situaciones</a>
        <a class='dropdown-item' href='catgrados'>Cat. de Grados</a>
        </div>
        </li>
        <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Ayuda</a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
        <a class='dropdown-item' href='acerca'>Acerca de...</a>
        <a class='dropdown-item' href='manualhelp'>Manual de Usuario</a>
        </div>
        </li>
        </ul>
        </div>
        </nav>
       
    ";
    }

    function menuConsultaUsuario(){
        echo " 
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark pt-3'>
            <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
        <a class='navbar-brand' href='principal'>SCCP v. 1.0</a>
        
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto ml-auto'>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='captura' id='liga-directa' data-toggle='dropdown' aria-haspopup='false' aria-expanded='true'>Elementos (Agregar/Actualizar)</a>

                </li>
                <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Folios</a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                        
                        <a class='dropdown-item' href='registrofolio'>Generar Folios</a>
                        <a class='dropdown-item' href='listadofolios'>Consulta de Folios</a>
                    </div>
        </li>
        <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Ayuda</a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
        <a class='dropdown-item' href='acerca'>Acerca de...</a>
        <a class='dropdown-item' href='manualhelp'>Manual de Usuario</a>
        </div>
        </li>
        </ul>
        </div>
        </nav>
       
    ";
    }
    ?>