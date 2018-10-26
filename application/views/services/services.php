<?php
defined('BASEPATH') OR exit('');

?>
<?php
$local = $this->session->admin_local;
?>
<style href="<?=base_url('public/ext/datetimepicker/bootstrap-datepicker.min.css')?>" rel="stylesheet"></style>

<div class="pwell hidden-print">
    <div class="row">
        <div class="col-sm-12">
            <!--- Row to create  Nueva Venta-->
            <div class="row">
                
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
                            <option value="price-DESC">Precio(bajo)</option>
                            <option value="price-ASC">Precio(alto)</option>
                        
                        </select>
                    </div>

                   
                </div>
            </div>
            <!-- end of sort and co div-->
        </div>
    </div>

    <hr>

     <div class="row">
        <!-- Transaction list div-->
        <div class="col-sm-12" id="serviceTable"></div>
        <!-- End of transactions div-->
    </div>
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
                <form role="form" id="fromService">
                 <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='firstNameService' class="control-label">Nombre Y Apellido</label>
                            <input type="text" id='firstNameService' class="form-control checkField" placeholder="Nombre y apellido">
                            <span class="help-block errMsg" id="firstNameServiceErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='serviceContact' class="control-label">Contacto</label>
                            <input type="text" id='serviceContact' class="form-control checkField" placeholder="Telefono o Email">
                            <span class="help-block errMsg" id="contactServiceErr"></span>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12 form-group-sm">
                              <?php if(!$this->session->admin_local == ""): ?>
                              <input type="hidden" id="localServicio" value="<?=$local?>">
                            
                            <?php else: ?>
                            <select class="form-control checkField" id='localServicio'>
                                <option value=''>Local del Servicio Tecnico</option>
				                <option value='rincon'>Rincón 1</option>
                                <option value='patricios'>Av. R. de Patricios 802</option>
                                <option value='brown'>Av. Almte Brown 901</option>
                                <option value='brown2'>Av. Almte Brown 201</option>
                                <option value='independencia'>Av. Independencia 399</option>
				                <option value='local1'>Local 1 S. Dir.</option>
			                	<option value='local2'>Local 2 S. Dir.</option>
				                <option value='local3'>Local 3 S. Dir.</option>
                				<option value='local4'>Local 4 S. Dir.</option>
                				<option value='local5'>Local 5 S. Dir.</option>                         
                				</select>
                            <?php endif; ?>
                    </div>
                    </div>
                    <div class="row">
                     
                         
                            
                        <div class="col-sm-12 form-group-sm">
                            <label for="servicePriceEdit">Precio</label>
                            <input type="text" id="servicePrice" name="servicePrice" placeholder="Precio por el servicio" class="form-control checkField">
                            <span class="help-block errMsg" id="servicePriceErr"></span>
                        </div>
                   </div>
                    
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <label for="serviceDescription" class="">Descripcion (Optional)</label>
                            <textarea class="form-control" id="serviceDescription" placeholder="Descripcion opcional"></textarea>
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
