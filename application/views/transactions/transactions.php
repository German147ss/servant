<?php
defined('BASEPATH') OR exit('');

$current_items = [];


if(isset($items) && !empty($items)){
    foreach($items as $get){
	if($this->session->admin_local == ""){
    		 echo "<div style = 'display:none;' id='esAdmin'></div>";
		$current_items[$get->code."-".$get->local] = $get->name . " - " .$get->local;

	}
        elseif($get->local === $this->session->admin_local){

          echo "<div style = 'display:none;' id='idHidden'>".$this->session->admin_local."</div>";

        $current_items[$get->code] = $get->name. " - " .$get->local;
        }
    }
}
?>

<style href="<?=base_url('public/ext/datetimepicker/bootstrap-datepicker.min.css')?>" rel="stylesheet"></style>

<script>
    var currentItems = <?=json_encode($current_items)?>;
</script>

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
                
            </div>
            <br>
            <?php  if($this->session->admin_local == "" || $this->session->admin_role === "Super"){?>
            <div class="row">

                <div class="col-sm-3">
                    <span class="pointer text-primary">
                        <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#reportModalProd'>
                            <i class="fa fa-newspaper-o"></i> Generar Reporte De Productos
                        </button>
                    </span>
                </div>
            </div>

          	<?php } ?>
            <!--- End of row to create  Nueva Venta-->
            <!---form to create  Nueva Ventas--->
            <div class="row collapse" id="newTransDiv">
                <!---div to display transaction form--->
                <div class="col-sm-12" id="salesTransFormDiv">
                    <div class="well">
                        <form name="salesTransForm" id="salesTransForm" role="form">
                            <div class="text-center errMsg" id='newTransErrMsg'></div>
                            <br>

                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Cloned div comes here--->
                                    <div id="appendClonedDivHere"></div>
                                    <!--End of cloned div here--->

                                    <!--- Text to click to add another item to transaction-->
                                    <div class="row">
                                        <div class="col-sm-2 text-primary pointer">
                                            <button class="btn btn-primary btn-sm" id="clickToClone"><i class="fa fa-plus"></i> Agregar Producto</button>
                                        </div>

                                        <br class="visible-xs">

                                        <div class="col-sm-2 form-group-sm">
                                            <input type="text" id="barcodeText" class="form-control" placeholder="item code" autofocus>
                                            <span class="help-block errMsg" id="itemCodeNotFoundMsg"></span>
                                        </div>
                                    </div>
                                    <!-- End of text to click to add another item to transaction-->
                                    <br>

                                    <div class="row">
                                        <div class="col-sm-3 form-group-sm">
                                            <label for="vat">IVA(%)</label>
                                            <input type="number" min="0" id="vat" class="form-control" value="0">
                                        </div>

                                        <div class="col-sm-3 form-group-sm">
                                            <label for="discount">Descuento(%)</label>
                                            <input type="number" min="0" id="discount" class="form-control" value="0">
                                        </div>

                                        <div class="col-sm-3 form-group-sm">
                                            <label for="discount">Descuento($)</label>
                                            <input type="number" min="0" id="discountValue" class="form-control" value="0">
                                        </div>

                                        <div class="col-sm-3 form-group-sm">
                                            <label for="modeOfPayment">Modo de Pago</label>
                                            <select class="form-control checkField" id="modeOfPayment">
                                                <option value="">---</option>
                                                <option value="Cash">Efectivo</option>
                                                <option value="POS">Tarjeta</option>
                                                <option value="Cash and POS">Tarjeta y efectivo</option>
                                            </select>
                                            <span class="help-block errMsg" id="modeOfPaymentErr"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 form-group-sm">
                                            <label for="cumAmount">Monto Total</label>
                                            <span id="cumAmount" class="form-control">0.00</span>
                                        </div>

                                        <div class="col-sm-4 form-group-sm">
                                            <div class="cashAndPos hidden">
                                                <label for="cashAmount">Monto A Pagar</label>
                                                <input type="text" class="form-control" id="cashAmount">
                                                <span class="help-block errMsg"></span>
                                            </div>

                                            <div class="cashAndPos hidden">
                                                <label for="posAmount">Tarjeta</label>
                                                <input type="text" class="form-control" id="posAmount">
                                                <span class="help-block errMsg"></span>
                                            </div>

                                            <div id="amountTenderedDiv">
                                                <label for="amountTendered" id="amountTenderedLabel">Monto Pagado</label>
                                                <input type="text" class="form-control" id="amountTendered">
                                                <span class="help-block errMsg" id="amountTenderedErr"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 form-group-sm">
                                            <label for="changeDue">Cambio</label>
                                            <span class="form-control" id="changeDue"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-3 form-group-sm">
                                            <label for="custCode">Codigo de Cliente</label>
                                            <input type="text" id="custCode" class="form-control" placeholder="Codigo del Cliente(opcional)">
                                        </div>
                                        <div class="col-sm-3 form-group-sm">
                                            <label for="custName">Nombre del Cliente</label>
                                            <input type="text" id="custName" class="form-control" placeholder="Nombre">
                                        </div>

                                        <div class="col-sm-3 form-group-sm">
                                            <label for="custPhone">Telefono</label>
                                            <input type="tel" id="custPhone" class="form-control" placeholder="Telefono">
                                        </div>

                                        <div class="col-sm-3 form-group-sm">
                                            <label for="custEmail">Email</label>
                                            <input type="email" id="custEmail" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-sm-2 form-group-sm">
                                    <button class="btn btn-primary btn-sm" id='useScanner'>Usar Numero de producto</button>
                                </div>
                                <br class="visible-xs">
                                <div class="col-sm-6"></div>
                                <br class="visible-xs">
                                <div class="col-sm-4 form-group-sm">
                                    <button type="button" class="btn btn-primary btn-sm" id="confirmSaleOrder">Confirmar Venta</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="cancelSaleOrder">Limpiar Venta</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="hideTransForm">Cerrar</button>
                                </div>
                            </div>
                        </form><!-- end of form-->
                    </div>
                </div>
                <!-- end of div to display transaction form-->
            </div>
            <!--end of form-->

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

    <!-- transaction list table-->
    <div class="row">
        <!-- Transaction list div-->
        <div class="col-sm-12" id="transListTable"></div>
        <!-- End of transactions div-->
    </div>
    <!-- End of transactions list table-->
</div>


<div class="row hidden" id="divToClone">
    <div class="col-sm-4 form-group-sm">
        <label>Producto</label>
        <select class="form-control selectedItemDefault" onchange="selectedItem(this)"></select>
    </div>

    <div class="col-sm-2 form-group-sm itemAvailQtyDiv">
        <label>Stock</label>
        <span class="form-control itemAvailQty">0</span>
    </div>

    <div class="col-sm-2 form-group-sm">
        <label>Precio por Unidad</label>
        <span class="form-control itemUnitPrice">0.00</span>
    </div>

    <div class="col-sm-1 form-group-sm itemTransQtyDiv">
        <label>Cantidad</label>
        <input type="number" min="0" class="form-control itemTransQty" value="0">
        <span class="help-block itemTransQtyErr errMsg"></span>
    </div>

    <div class="col-sm-2 form-group-sm">
        <label>Precio total</label>
        <span class="form-control itemTotalPrice">0.00</span>
    </div>

    <br class="visible-xs">

    <div class="col-sm-1">
        <button class="close retrit">&times;</button>
    </div>

    <br class="visible-xs">
</div>


<div class="modal fade" id='reportModal' data-backdrop='static' role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="close" data-dismiss='modal'>&times;</div>
                <h4 class="text-center">Generar Reporte</h4>
            </div>

            <div class="modal-body">
                <div class="row" id="datePair">
                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">Fecha desde</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id='transFrom' class="form-control date start" placeholder="YYYY-MM-DD">
                        </div>
                        <span class="help-block errMsg" id='transFromErr'></span>
                    </div>

                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">Hasta</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id='transTo' class="form-control date end" placeholder="YYYY-MM-DD">
                        </div>
                        <span class="help-block errMsg" id='transToErr'></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id='clickToGen'>Generar</button>
                <button class="btn btn-danger" data-dismiss='modal'>Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id='reportModalProd' data-backdrop='static' role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="close" data-dismiss='modal'>&times;</div>
                <h4 class="text-center">Generar Reporte de Producto</h4>
            </div>

            <div class="modal-body">
                <div class="row" id="datePair">
                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">Fecha desde</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id='transFromProd' class="form-control date start" placeholder="YYYY-MM-DD">
                        </div>
                        <span class="help-block errMsg" id='transFromErr'></span>
                    </div>

                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">Hasta</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id='transToProd' class="form-control date end" placeholder="YYYY-MM-DD">
                        </div>
                        <span class="help-block errMsg" id='transToErr'></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id='clickToGenProducto'>Generar</button>
                <button class="btn btn-danger" data-dismiss='modal'>Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!---End of copy of div to clone when adding more items to sales transaction---->
<script src="<?=base_url()?>public/js/transactions.js"></script>
<script src="<?=base_url('public/ext/datetimepicker/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=base_url('public/ext/datetimepicker/jquery.timepicker.min.js')?>"></script>
<script src="<?=base_url()?>public/ext/datetimepicker/datepair.min.js"></script>
<script src="<?=base_url()?>public/ext/datetimepicker/jquery.datepair.min.js"></script>
