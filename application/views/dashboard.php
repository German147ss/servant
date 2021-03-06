<?php
defined('BASEPATH') OR exit('');
?>

<div class="row latestStuffs">
    <div class="col-sm-4">
        <div class="panel panel-info">
            <div class="panel-body latestStuffsBody" style="background-color: #5cb85c">
                <div class="pull-left"><i class="fa fa-exchange"></i></div>
                <div class="pull-right">
                    <div><?=$totalSalesToday?></div>
                    <div class="latestStuffsText">Productos vendidos Hoy</div>
                </div>
            </div>
            <div class="panel-footer text-center" style="color:#5cb85c">Numero de productos vendidos hoy</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-info">
            <div class="panel-body latestStuffsBody" style="background-color: #f0ad4e">
                <div class="pull-left"><i class="fa fa-tasks"></i></div>
                <div class="pull-right">
                    <div><?=$totalTransactions?></div>
                    <div class="latestStuffsText pull-right">Total de ventas</div>
                </div>
            </div>
            <div class="panel-footer text-center" style="color:#f0ad4e">Ventas de Siempre</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-info">
            <div class="panel-body latestStuffsBody" style="background-color: #337ab7">
                <div class="pull-left"><i class="fa fa-shopping-cart"></i></div>
                <div class="pull-right">
                    <div><?=$totalItems?></div>
                    <div class="latestStuffsText pull-right">Productos en Stock</div>
                </div>
            </div>
            <div class="panel-footer text-center" style="color:#337ab7">Total de productos en Stock</div>
        </div>
    </div>
</div>


<!-- ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->
<div class="row margin-top-5">
    <div class="col-sm-9">
        <div class="box">
            <div class="box-header" style="background-color:/*#33c9dd*/#333;">
              <h3 class="box-title" id="earningsTitle"></h3>
            </div>

            <div class="box-body" style="background-color:/*#33c9dd*/#333;">
              <canvas style="padding-right:25px" id="earningsGraph" width="200" height="80"/></canvas>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <section class="panel form-group-sm">
            <label class="control-label">Seleccione Año:</label>
            <select class="form-control" id="earningAndExpenseYear">
                <?php $years = range("2016", date('Y')); ?>
                <?php foreach($years as $y):?>
                <option value="<?=$y?>" <?=$y == date('Y') ? 'selected' : ''?>><?=$y?></option>
                <?php endforeach; ?>
            </select>
            <span id="yearAccountLoading"></span>
        </section>
        
        <section class="panel">
          <center>
              <canvas id="paymentMethodChart" width="200" height="200"/></canvas><br>Metodos de Pago(%)<span id="paymentMethodYear"></span>
          </center>
        </section>
    </div>
</div>
<!-- END OF ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->

<!-- ROW OF SUMMARY -->
<div class="row margin-top-5">
    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-plus"></i> Mas Vendidos</div>
            <?php if($topDemanded): ?>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Productos</th>
                        <th>C. Vend.</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($topDemanded as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td><?=$get->totSold?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-cart-arrow-down"></i> Menos vendidos</div>
            <?php if($leastDemanded): ?>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>C. Vend.</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($leastDemanded as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td><?=$get->totSold?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No ventas
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-money"></i> Mas Ganancia</div>
            <?php if($highestEarners): ?>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Total Ganado</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($highestEarners as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td>$<?=number_format($get->totEarned, 2)?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?> 
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="panel panel-hash">
            <div class="panel-heading"><i class="fa fa-money"></i> Menor Ganancia</div>
            <?php if($lowestEarners): ?>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Ganancia Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lowestEarners as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td>$<?=number_format($get->totEarned, 2)?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Ventas
            <?php endif; ?> 
        </div>
    </div>
</div>
<!-- END OF ROW OF SUMMARY -->

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading">Ventas diarias</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($dailyTransactions) && $dailyTransactions): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Dia</th>
                            <th>C. Vendida</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Ganado</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($dailyTransactions as $get): ?>
                        <tr>
                            <td><?=
                                    date('l jS M, Y', strtotime($get->transDate)) === date('l jS M, Y', time())
                                    ? 
                                    "Today" 
                                    : 
                                    date('l jS M, Y', strtotime($get->transDate));
                                ?>
                            </td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>$<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Ventas</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading">Ventas por Dias</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($transByDays) && $transByDays): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Dia</th>
                            <th>C. Vendida</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Ganado</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByDays as $get): ?>
                        <tr>
                            <td><?=$get->day?>s</td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>$<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Ventas</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading">Ventas por Mes</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($transByMonths) && $transByMonths): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mes</th>
                            <th>C. Vendida</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Ganado</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByMonths as $get): ?>
                        <tr>
                            <td><?=$get->month?></td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>$<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No ventas</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    
    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading">Ventas por Año</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($transByYears) && $transByYears): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Año</th>
                            <th>C. Vendida</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Ganado</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByYears as $get): ?>
                        <tr>
                            <td><?=$get->year?></td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>$<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Ventas</li>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
  <?php if($this->session->admin_local == ""):?>
<div class="row">
    
<div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading">Diezmo Diario</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($dailyTransactions) && $dailyTransactions): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Dia</th>
                            <th>C. Vendida</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Diezmo</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($dailyTransactions as $get): ?>
                        <?php $get->tot_earned = $get->tot_earned / 10; ?>
                        <tr>
                            <td><?=
                                    date('l jS M, Y', strtotime($get->transDate)) === date('l jS M, Y', time())
                                    ? 
                                    "Today" 
                                    : 
                                    date('l jS M, Y', strtotime($get->transDate));
                                ?>
                            </td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>$<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Ventas</li>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-hash">
            <div class="panel-heading">Diezmos por Mes</div>
            <div class="panel-body scroll panel-height">
                <?php if(isset($transByMonths) && $transByMonths): ?>
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mes</th>
                            <th>C. Vendida</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Diezmo</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByMonths as $get): ?>
                        <?php $get->tot_earned = $get->tot_earned / 10; ?>
                        <tr>
                            <td><?=$get->month?></td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>$<?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No ventas</li>
                <?php endif; ?>
            </div>
        </div>
    
</div>
   <?php endif; ?>
<script src="<?=base_url('public/js/chart.js'); ?>"></script>
<script src="<?=base_url('public/js/dashboard.js')?>"></script>
