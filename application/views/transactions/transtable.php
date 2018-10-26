<?php defined('BASEPATH') OR exit('') ?>

<?= isset($range) && !empty($range) ? $range : ""; ?>
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Ventas</div>
    <?php if($allTransactions): ?>


<div class="table table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Venta</th>
                    <th>Recibo</th>
                    <th>Cant. de Productos</th>
                    <th>Monto Total</th>
                    <th>Monto Pagado</th>
                    <th>Cambio</th>
                    <th>Modo de pago</th>
                    <th>Operador</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allTransactions as $get): ?>
                <?php if($get->local == $this->session->admin_local || $this->session->admin_local == "" || $this->session->admin_local == " "):?>
                <tr>

                    <th><?= $sn ?>.</th>
                    <td><a class="pointer vtr" title="Click to view receipt"><?= $get->ref ?></a></td>
                    <td><?= $get->quantity ?></td>
                    <td>$<?= number_format($get->totalMoneySpent, 2) ?></td>
                    <td>$<?= number_format($get->amountTendered, 2) ?></td>
                    <td>$<?= number_format($get->changeDue, 2) ?></td>
                    <?php if($get->modeOfPayment == "Cash"){
                    $get->modeOfPayment = "Efectivo";
                         }elseif($get->modeOfPayment == "POS"){
                         $get->modeOfPayment = "Tarjeta";
                         }elseif($get->modeOfPayment == "Cash and POS"){
                        $get->modeOfPayment = "Efectivo y Tarjeta";
                    }?>
                    <td><?=  str_replace("_", " ", $get->modeOfPayment)?></td>
                    <td><?=$get->staffName?></td>
                    
                    <?php if(empty($get->cust_code)): ?>

                    <td><?=$get->cust_name?> - <?=$get->cust_phone?> - <?=$get->cust_email?></td>
                <?php else:?>
                <td><?=$get->cust_code - $get->cust_name?> - <?=$get->cust_phone?> - <?=$get->cust_email?></td>
                <?php endif;?>  
                    <td><?= date('jS M, Y h:ia', strtotime($get->transDate)) ?></td>
                    <input type="hidden" value="<?= $get->ref ?>" class="curItemId">
                     <td class="text-center"><i class="fa fa-trash text-danger delItem pointer"></i></td>
                </tr>
                <?php $sn++; ?>
                <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<!-- table div end-->
    <?php else: ?>
        <ul><li>No hay ventas</li></ul>
    <?php endif; ?>
    
    <!--Pagination div-->
    <div class="col-sm-12 text-center">
        <ul class="pagination">
            <?= isset($links) ? $links : "" ?>
        </ul>
    </div>
</div>
<!-- panel end-->
