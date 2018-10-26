<?php
defined('BASEPATH') OR exit('');
?>
<?php $sn = 1;
     
?>
<div id="transReceiptToPrint">
    <div class="row">
        <div class="col-xs-12 text-center text-uppercase">
            <center style='margin-bottom:5px'><img src="<?=base_url()?>public/images/receipt_logo.png" alt="logo" class="img-responsive" width="60px"></center>
            <b>SERVANT ELECTRONIC</b>

        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0px'>
    
   

    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-xs-12">
            <b>Nombre de Cliente: <?=$firstname?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Contacto: <?=$contact?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Description: <?=$desc?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <b>Costo: $<?=$price?></b>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 text-center">Gracias por elegirnos!!</div>
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
