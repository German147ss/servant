<?php
defined('BASEPATH') OR exit('');

?>

<style href="<?=base_url('public/ext/datetimepicker/bootstrap-datepicker.min.css')?>" rel="stylesheet"></style>

<div class="pwell hidden-print">
    <div class="row">
        <div class="col-sm-12">
            <!--- Row to create  Nueva Venta-->
            <div class="row">
                <div class="col-sm-3">
                    <span class="pointer text-primary">
                        <button class='btn btn-primary btn-sm' id='showTransForm'><i class="fa fa-plus"></i>  Nueva Venta </button>
                    </span>
                </div>
                <div class="col-sm-3">
                    <span class="pointer text-primary">
                        <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#reportModal'>
                            <i class="fa fa-newspaper-o"></i> Generar Reporte
                        </button>
                    </span>
                </div>
                <div class="col-sm-3">
                    <span class="pointer text-primary">
                        <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#servicioModal'>
                            <i class="fa fa-newspaper-o"></i> Servicio Tecnico
                        </button>
                    </span>
                </div>
            </div>
    
         
                            
            <br><br>
            <!-- sort and co row-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-3 form-inline form-group-sm">
                        <label for="transListPerPage">Por pagina</label>
                        <select id="transListPerPage" class="form-control">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                    <div class="col-sm-5 form-group-sm form-inline">
                        <label for="transListSortBy">Ordenar Por</label>
                        <select id="transListSortBy" class="form-control">
                            <option value="transId-DESC">Fecha(Reciente primero)</option>
                            <option value="transId-ASC">Fecha(Viejo primero)</option>
                            <option value="quantity-DESC">Cantidad (Mas Cantidad)</option>
                            <option value="quantity-ASC">Cantidad (Menor Cantidad)</option>
                            <option value="totalPrice-DESC">Precio Total (Mas Caro)</option>
                            <option value="totalPrice-ASC">Precio Tota (Mas Barato)</option>
                            <option value="totalMoneySpent-DESC">Monto total gastado (Mas Caro)</option>
                            <option value="totalMoneySpent-ASC">Monto total gastado (Mas Barato)</option>
                        </select>
                    </div>

                    <div class="col-sm-4 form-inline form-group-sm">
                        <label for='transSearch'><i class="fa fa-search"></i></label>
                        <input type="search" id="transSearch" class="form-control" placeholder="Buscar Venta">
                    </div>
                </div>
            </div>
            <!-- end of sort and co div-->
        </div>
    </div>

    <hr>

    
    <!-- End of transactions list table-->
</div>






<div class="modal fade" id='servicioModal' data-backdrop='static' role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="close" data-dismiss='modal'>&times;</div>
                <h4 class="text-center">SERVICIO TECNICO</h4>
            </div>

            <div class="modal-body">
                <form role="form">
                 <div class="row">
                        <div class="form-group-sm col-sm-4">
                            <label for='firstNameService' class="control-label">Nombre</label>
                            <input type="text" id='firstNameService' class="form-control checkField" placeholder="Nombre">
                            <span class="help-block errMsg" id="firstNameServiceErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-4">
                            <label for='lastNameService' class="control-label">Apellido</label>
                            <input type="text" id='lastNameService' class="form-control checkField" placeholder="Apellido">
                            <span class="help-block errMsg" id="lastNameServiceErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-4">
                            <label for='contactService' class="control-label">Contacto</label>
                            <input type="text" id='contactService' class="form-control checkField" placeholder="Telefono o Email">
                            <span class="help-block errMsg" id="contactServiceErr"></span>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-12 form-group-sm">
                            <label for="servicePriceEdit">Precio</label>
                            <input type="text" id="servicePriceEdit" name="servicePrice" placeholder="Precio por el servicio" class="form-control checkField">
                            <span class="help-block errMsg" id="servicePriceErr"></span>
                        </div>
                   </div>
                    
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <label for="serviceDescriptionEdit" class="">Descripcion (Optional)</label>
                            <textarea class="form-control" id="itemDescriptionEdit" placeholder="Descripcion opcional"></textarea>
                    </div>
                    </div>
                  
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id='clickToGenService'>Generar</button>
                <button class="btn btn-danger" data-dismiss='modal'>Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!---End of copy of div to clone when adding more items to sales transaction---->
<script src="<?=base_url()?>public/js/services.js"></script>
<script src="<?=base_url('public/ext/datetimepicker/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=base_url('public/ext/datetimepicker/jquery.timepicker.min.js')?>"></script>
<script src="<?=base_url()?>public/ext/datetimepicker/datepair.min.js"></script>
<script src="<?=base_url()?>public/ext/datetimepicker/jquery.datepair.min.js"></script>
