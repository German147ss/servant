<?php defined('BASEPATH') OR exit('') ?>

<div class='col-sm-6'>
    <?= isset($range) && !empty($range) ? $range : ""; ?>
</div>
<?php
$localToProd = "";
?>
<div class='col-sm-12 text-right'><div class='col-sm-3 text-right'><b>Artículos Costo total :</b> $<?=$cum_total ? number_format($cum_cost, 2) : '0.00'?>
</div><div class='col-sm-3 text-right'><b>Artículos Valor total / precio:</b> $<?=$cum_total ? number_format($cum_total, 2) : '0.00'?></div>
<div class='col-sm-3 text-right'><b>Ganancia Total:</b> $<?=$cum_total ? number_format($cum_total - $cum_cost , 2) : '0.00'?></div></div>
<div class='col-xs-12'>
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">PRODUCTOS</div>
        <?php if($allItems): ?>
        <div class="table table-responsive">
            <table class="table table-bordered table-striped" style="background-color: #f5f5f5">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>PRODUCTO</th>
                        <th>CODIGO</th>
                        <th>PUNTOS</th>
                        <th>DESCRIPCION</th>
			             <th>LOCAL</th>
                        <th>EN STOCK</th>
                        <th>COSTO DEL PROD.</th>
                        <th>PRECIO x UNIDAD </th>
                        <th>TOTAL VENDIDO</th>
                        <th>TOTAL GANADO</th>
                        
                        <th>ACTUALIZAR STOCK</th>
                        
                        <th>EDITAR</th>
                        <th>BORRAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allItems as $get): ?>

                    <tr>
                        <input type="hidden" value="<?=$get->id?>" class="curItemId">
                        <th class="itemSN"><?=$sn?>.</th>
                        <td><span id="itemName-<?=$get->id?>"><?=$get->name?></span></td>
                        <td><span id="itemCode-<?=$get->id?>"><?=$get->code?></td>
                        <td><span id="itemPoints-<?=$get->id?>"><?=$get->points?></td>
                        <td>
                            <span id="itemDesc-<?=$get->id?>" data-toggle="tooltip" title="<?=$get->description?>" data-placement="auto">
                                <?=word_limiter($get->description, 15)?>
                            </span>
                        </td>
		<?php 
		$localToProd = $get->local;
				switch ($get->local) {
    case 'brown':
        $get->local = 'Av. Almte Brown 901';
        break;
   case 'brown2':
        $get->local = 'Av. Almte Brown 201';
        break;
    case 'independencia':
        $get->local = 'Av. Independencia 399';
        break;
case 'patricios':
        $get->local = 'Av. R. de Patricios 802';
        break;
case 'rincon':
        $get->local = 'Rincón 1';
        break;
case 'local1':
        $get->local = 'Local 1 S. Dir.';
        break;
case 'local2':
        $get->local = 'Local 2 S. Dir.';
        break;
case 'local3':
        $get->local = 'Local 3 S. Dir.';
        break;
case 'local4':
        $get->local = 'Local 4 S. Dir.';
        break;
case 'local5':
        $get->local = 'Local 5 S. Dir.';
        break;
}
?>
			<td><span id="itemPoints-<?=$get->id?>"><?=$get->local?></td>
                        <td class="<?=$get->quantity <= 10 ? 'bg-danger' : ($get->quantity <= 25 ? 'bg-warning' : '')?>">
                            <span id="itemQuantity-<?=$get->id?>"><?=$get->quantity?></span>
                        </td>
                        <td>$<span id="itemCost-<?=$get->id?>"><?=number_format($get->unitCost, 2)?></span></td>
                        <td>$<span id="itemPrice-<?=$get->id?>"><?=number_format($get->unitPrice, 2)?></span></td>
                        <td><?=$this->genmod->gettablecol('transactions', 'SUM(quantity)', 'itemCode', $get->code)?></td>
                        <td>
                            $<?=number_format($this->genmod->gettablecol('transactions', 'SUM(totalPrice)', 'itemCode', $get->code), 2)?>
                        </td>
                        <td><a class="pointer updateStock" id="stock-<?=$get->id?>">ACTUALIZAR STOCK</a></td>
                        <td class="text-center text-primary">
                            <span class="editItem" local="<?=$localToProd?>" id="edit-<?=$get->id?>"><i class="fa fa-pencil pointer"></i> </span>
                        </td>
                        <td class="text-center"><i class="fa fa-trash text-danger delItem pointer"></i></td>
                    </tr>
                    <?php $sn++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- table div end-->
        <?php else: ?>
        <ul><li>No items</li></ul>
        <?php endif; ?>
    </div>
    <!--- panel end-->
</div>

<!---Pagination div-->
<div class="col-sm-12 text-center">
    <ul class="pagination">
        <?= isset($links) ? $links : "" ?>
    </ul>
</div>
