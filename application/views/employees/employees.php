<?php
defined('BASEPATH') OR exit('');
?>

<div class="row hidden-print">
    <div class="col-sm-12">
        <div class="pwell">
            <!-- Header (add new employee, sort order etc.) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-2 form-inline form-group-sm">
                        <button class="btn btn-primary btn-sm"  data-target='#addNewEmployeeModal' data-toggle='modal'>Agregar Empresario</button>
                    </div>
                    <div class="col-sm-3 form-inline form-group-sm">
                        <label for="employeeListPerPage">ver</label>
                        <select id="employeeListPerPage" class="form-control">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <label for="employeeListPerPage">por pagina</label>
                    </div>
                    <div class="col-sm-4 form-inline form-group-sm">
                        <label for="employeeListSortBy" class="control-label">Ordenar: </label> 
                        <select id="employeeListSortBy" class="form-control">
                            <option value="first_name-ASC" selected>Nombre (A a Z)</option>
                            <option value="first_name-DESC">Nombre (Z a A)</option>
                            <option value="created_on-ASC">Fecha Creada (Viejo Primero)</option>
                            <option value="created_on-DESC">Fecha Creada (Nuevo primero)</option>
                            <option value="email-ASC">E-mail - ASC</option>
                            <option value="email-DESC">E-mail - DES</option>
                            <option value="customer_id-ASC">Codigo - Menor</option>
                            <option value="customer_id-DESC">Codigo - Mayor</option>
                            <option value="i_points-ASC">Puntos Individuales - Menor</option>
                            <option value="i_points-DESC">Puntos Individuales - Mayor</option>
                            <option value="group_points-ASC">Puntos Grupales - Menor</option>
                            <option value="group_points-DESC">Puntos Grupales - Mayor</option>
                            
                        </select>
                    </div>
                    <div class="col-sm-3 form-inline form-group-sm">
                        <label for="employeeSearch"><i class="fa fa-search"></i></label>
                        <input type="search" id="employeeSearch" placeholder="Buscar...." class="form-control">
                    </div>
                </div>
            </div>
            
            <hr>
            <!-- Header (sort order etc.) ends -->
            
            <!-- Employees list -->
            <div class="row">
                <div class="col-sm-12" id="allEmployee"></div>
            </div>
            <!-- Employees list ends -->
        </div>
    </div>
</div>


<!--- Modal to add new employee --->
<div class='modal fade' id='addNewEmployeeModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <button class="close" data-dismiss='modal'>&times;</button>
                <h4 class="text-center">AGREGAR NUEVO EMPRESARIO</h4>
                <div class="text-center">
                    <i id="fMsgIcon"></i><span id="fMsg"></span>
                </div>
            </div>
            <div class="modal-body">
                <form id='addNewEmployeeForm' name='addNewEmployeeForm' role='form'>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='firstName' class="control-label">Nombre</label>
                            <input type="text" id='firstName' class="form-control checkField" placeholder="Nombre">
                            <span class="help-block errMsg" id="firstNameErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='lastName' class="control-label">Apellido</label>
                            <input type="text" id='lastName' class="form-control checkField" placeholder="Apellido">
                            <span class="help-block errMsg" id="lastNameErr"></span>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-4">
                            <label for='email' class="control-label">Email</label>
                            <input type="email" id='email' class="form-control checkField" placeholder="Email">
                            <span class="help-block errMsg" id="emailErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-4">
                            <label for='address' class="control-label">Direccion</label>
                            <input type="text" id='address' class="form-control checkField" placeholder="Direccion">
                            <span class="help-block errMsg" id="emailErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-4">
                            <label for='cp' class="control-label">Codigo Postal</label>
                            <input type="text" id='cp' class="form-control checkField" placeholder="Codigo Postal">
                            <span class="help-block errMsg" id="cpErr"></span>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile1' class="control-label">Numero de Telefono</label>
                            <input type="tel" id='mobile1' class="form-control checkField" placeholder="Telefono">
                            <span class="help-block errMsg" id="mobile1Err"></span>
                        </div>
                         <div class="form-group-sm col-sm-6">
                            <label for='dni' class="control-label">DNI</label>
                            <input  id='dni' class="form-control checkField" placeholder="DNI">
                            <span class="help-block errMsg" id="mobile1Err"></span>
                        </div>
                    
                    </div>
                   <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='customerId' class="control-label">CODIGO DE EMPRESARIO</label>
                            <input type="text" id='customerId' class="form-control checkField" placeholder="Codigo que tendra el empresario">
                            <span class="help-block errMsg" id="mobile1EditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='customerRef' class="control-label">CODIGO DEL REFERIDO</label>
                            <input type="text" id='customerRef' class="form-control" placeholder="Codigo del Referido ">
                            <span class="help-block errMsg" id="mobile2EditErr"></span>
                        </div>
                    </div>
        
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" form="addNewEmployeeForm" class="btn btn-warning pull-left">Reiniciar</button>
                <button type='button' id='addEmployeeSubmit' class="btn btn-primary">AGREGAR</button>
                <button type='button' class="btn btn-danger" data-dismiss='modal'>Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to add new employee --->
<!--- Modal for editing employee details --->
<div class='modal fade' id='editEmployeeModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <button class="close" data-dismiss='modal'>&times;</button>
                <h4 class="text-center">Edit Employee Info</h4>
                <div class="text-center">
                    <i id="fMsgEditIcon"></i>
                    <span id="fMsgEdit"></span>
                </div>
            </div>
            <div class="modal-body">
                <form id='editEmployeeForm' name='editEmployeeForm' role='form'>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='firstNameEdit' class="control-label">First Name</label>
                            <input type="text" id='firstNameEdit' class="form-control checkField" placeholder="First Name">
                            <span class="help-block errMsg" id="firstNameEditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='lastNameEdit' class="control-label">Last Name</label>
                            <input type="text" id='lastNameEdit' class="form-control checkField" placeholder="Last Name">
                            <span class="help-block errMsg" id="lastNameEditErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='emailEdit' class="control-label">Email</label>
                            <input type="email" id='emailEdit' class="form-control checkField" placeholder="Email">
                            <span class="help-block errMsg" id="emailEditErr"></span>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile1Edit' class="control-label">Phone Number</label>
                            <input type="tel" id='mobile1Edit' class="form-control checkField" placeholder="Phone Number">
                            <span class="help-block errMsg" id="mobile1EditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile2Edit' class="control-label">Other Number</label>
                            <input type="tel" id='mobile2Edit' class="form-control" placeholder="Other Number (optional)">
                            <span class="help-block errMsg" id="mobile2EditErr"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" id="employeeId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" form="editEmployeeForm" class="btn btn-warning pull-left">Reset Form</button>
                <button type='button' id='editEmployeeSubmit' class="btn btn-primary">Update</button>
                <button type='button' class="btn btn-danger" data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to edit employee details --->
<script src="<?=base_url()?>public/js/employee.js"></script>
