<?php
defined('BASEPATH') OR exit('');
?>
<?php if($allTransInfo):?>
<?php $sn = 1;
        if($_mop == "Cash"){
            $_mop = "Efectivo";
        }elseif($_mop == "POS"){
            $_mop = "Tarjeta";
        }elseif($_mop == "Cash and POS"){
            $_mop = "Efectivo y Tarjeta";
        }

?>
<div id="transReceiptToPrint">
    <div class="row">
        <div class="col-xs-12 text-center text-uppercase">
            <center style='margin-bottom:5px'><img src="<?=base_url()?>public/images/receipt_logo.png" alt="logo" class="img-responsive" width="60px"></center>
            <b>SERVANT ELECTRONIC</b>
          <?php
          switch ($cust_local) {
    case "brown":
        echo "<div>Av. Almte Brown 901, Distrito Federal, Argentina</div><div>011 4300-0585</div>";
        break;
    case "brown2":
        echo "<div>Av. Almte Brown 201, Distrito Federal, Argentina</div>  <div>011 4300-2282</div>";
        break;
    case "independencia":
        echo "<div>Av. Independencia 399, Distrito Federal, Argentina</div> <div>011 4300-8414</div>";
        break;
    case "patricios":
            echo "<div>Av. R. de Patricios 802 Barracas, Distrito Federal, Argentina</div>  <div> 2103-7383</div>";
            break;
     case "rincon":
                echo "<div>Rincón 1, Distrito Federal, Argentina</div>  <div>-</div>";
                break;
      default:
      echo "<div>{$cust_local}</div>";

}
          ?>

        </div>
    </div>
    <div class="row text-center">
        <div class="col-sm-12">
            <b><?=isset($transDate) ? date('jS M, Y ', strtotime($transDate)) : ""?></b>
        </div>
    </div>

    <div class="row" style="margin-top:2px">
        <div class="col-sm-12">
            <label>Numero de Recibo</label>
            <span><?=isset($ref) ? $ref : ""?></span>
		</div>

    </div>
	<div class="row" style='font-weight:bold'>
		<div class="col-xs-4">Producto</div>
		<div class="col-xs-4">Cant X Precio</div>
		<div class="col-xs-4">Total($)</div>
	</div>
	<hr style='margin-top:2px; margin-bottom:0px'>
    <?php $init_total = 0; ?>
    <?php foreach($allTransInfo as $get):?>
        <div class="row">
            <div class="col-xs-4"><?=ellipsize($get['itemName'], 33)?></div>
            <div class="col-xs-4"><?=$get['quantity'] . " x " .number_format($get['unitPrice'], 2)?></div>
            <div class="col-xs-4"><?=number_format($get['totalPrice'], 2)?></div>
        </div>
        <?php $init_total += $get['totalPrice'];?>
    <?php endforeach; ?>
    <hr style='margin-top:2px; margin-bottom:0px'>
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>Total: $<?=isset($init_total) ? number_format($init_total, 2) : 0?></b>
        </div>
    </div>
    <hr style='margin-top:2px; margin-bottom:0px'>
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>Descuento(<?=$discountPercentage?>%): $<?=isset($discountAmount) ? number_format($discountAmount, 2) : 0?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-right">
            <?php if($vatPercentage > 0): ?>
            <b>IVA(<?=$vatPercentage?>%): $<?=isset($vatAmount) ? number_format($vatAmount, 2) : ""?></b>
            <?php else: ?>
            IVA INCLUIDO
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-right">
            <b>PRECIO FINAL: $<?=isset($cumAmount) ? number_format($cumAmount, 2) : ""?></b>
        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-xs-12">
            <b>MODO DE PAGO: <?=
            isset($_mop) ? str_replace("_", " ", $_mop) : ""?>


        </b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>ABONADO: $<?=isset($amountTendered) ? number_format($amountTendered, 2) : ""?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>CAMBIO: $<?=isset($changeDue) ? number_format($changeDue, 2) : ""?></b>
        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-xs-12">
            <b>Nombre de Cliente: <?=$cust_name?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Telefono: <?=$cust_phone?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Email: <?=$cust_email?></b>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 text-center">Gracias por su Compra,Vuelva Pronto!!</div>
    </div>
</div>
<br class="hidden-print">
<div class="row hidden-print">
    <div class="col-sm-12">
        <div class="text-center">
            <button type="button" class="btn btn-primary ptr">
                <i class="fa fa-print"></i> Imprimir Recibo
            </button>

            <button type="button" data-dismiss='modal' class="btn btn-danger">
                <i class="fa fa-close"></i> Cerrar
            </button>
        </div>
    </div>
</div>
<br class="hidden-print">
<?php endif;?>
