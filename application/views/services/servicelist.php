<?php
defined('BASEPATH') OR exit('');
?>
<div class="row">Monto total : <?php echo $cumTotal; ?></div>

<div class="row">Monto No Pagado Aun : <?php echo $cumTotalNotPayed; ?></div>
<div class="row">Monto Pagado : <?php echo $cumTotalPayed; ?></div>

<?php echo isset($range) && !empty($range) ? "Showing ".$range : ""?>
<div class="panel panel-primary">
    <div class="panel-heading">Servicio Tecnico</div>
    <?php if($allServices):?>
    <div class="table table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>NOMBRE</th>
                    <th>CONTACTO</th>

                       <th>DESCRIPCION</th>
                          <th>PRECIO</th>
                          <th>LOCAL</th>
                          <th>FECHA</th>
                    <th>PAGO</th>

                  
                </tr>
            </thead>
            <tbody>
                <?php foreach($allServices as $get):?>
                    <tr>
                        <th><?=$sn?>.</th>
                        <td class="serviceName"><?=$get->first_name?></td>
                        <td class="serviceName"><?=$get->contact?></td>

                        <td class="hidden serviceName"><?=$get->first_name?></td>
                        <td class="serviceDesc"><?=$get->description?></td>
                        <td class="servicePrice"><?=$get->price?></td>
                        <td class="serviceLocal"><?=$get->local?></td>
                                                <td class="serviceFecha"><?=$get->created_on?></td>

                        
                            <?php if($get->payed === "1"): ?>
                             <td class="text-center">Pagado
                            <?php else: ?>
                              <input type="hidden" value="<?= $get->id ?>" class="curItemId">
                             <td class="text-center text-danger deleteAdmin pointer" id="del-<?=$get->id?>">
                            Pagar
                            <?php endif; ?>
                        </td>
                
                    </tr>
                    <?php $sn++;?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <?php else:?>
    Sin Servicio Tecnico
    <?php endif; ?>
</div>
<!-- Pagination -->
<div class="row text-center">
    <?php echo isset($links) ? $links : ""?>
</div>
<!-- Pagination ends -->
