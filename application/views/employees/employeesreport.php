<?php
defined('BASEPATH') OR exit('');

$total_earned = 0;

/**
 * @fileName transReport
 * @author Ameer <amirsanni@gmail.com>
 * @date 06-Apr-2017
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Reporte de Usuarios</title>
		
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>public/images/icon.ico">
        <!-- favicon ends --->
        
        <!--- LOAD FILES -->
        <?php if((stristr($_SERVER['HTTP_HOST'], "localhost") !== FALSE) || (stristr($_SERVER['HTTP_HOST'], "192.168.") !== FALSE)|| (stristr($_SERVER['HTTP_HOST'], "127.0.0.") !== FALSE)): ?>
        <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/css/bootstrap.min.css">

        <?php else: ?>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <?php endif; ?>
        
        <!-- custom CSS -->
        <link rel="stylesheet" href="<?= base_url() ?>public/css/main.css">
    </head>

    <body>
        <div class="container margin-top-5">
            <div class="row">
                <div class="col-xs-12 text-right hidden-print">
                    <button class="btn btn-primary btn-sm" onclick="window.print()">Reporte</button>
                </div>
            </div>
                        <?php if($allEmployees):?>
    <div class="table ">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                   
                    <th>CODIGO DE EMPRESARIO</th>
                    <th>CODIGO DE REFERIDO</th>
                    <th>NOMBRE</th>
                    <th>DOMICILIO</th>
                    <th>CODIGO POSTAL</th>
                    <th>E-MAIL</th>
                    <th>TELEFONO</th>
                    <th>DNI</th>
                    <th>FECHA DE REGISTRADO</th>
                    <th>PUNTOS INDIVIDUALES</th>
                    <th>PUNTOS GRUPALES</th>
                    <th>PUNTOS TOTALES</th>
                    <th>PORCENTAJE(%)</th>
                    <th>PRECIO</th>                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($allEmployees as $get):?>
                    <tr>
                    <?php 
                    $totalpoints = $get['i_points'] + $get['group_points'];
                    if($totalpoints < 500){
                        $percent = 0;
                    }else if($totalpoints < 1600){
                        $percent = 11;
                    }else if($totalpoints < 3800){
                        $percent = 14;
                    }else if($totalpoints < 7100){
                        $percent = 17;
                    }else if($totalpoints < 10000){
                        $percent = 20;
                    }else{
                        $percent = 23;
                    }
                    ?>
                        
                        <td class="employeeCustomer"><?=$get['customer_id']?></td>
                        <td class="employeeCustomerRef"><?=$get['customer_ref']?></td>
                        <td class="employeeName"><?=$get['first_name'] ." ". $get['last_name']?></td>
                        <td class="hidden firstName"><?=$get['first_name']?></td>
                        <td class="hidden lastName"><?=$get['last_name']?></td>
                        <td class="employeeAddress"><?=$get['address']?></td>
                        <td class="employeeCp"><?=$get['cp']?></td>
                        <td class="employeeEmail"><?=$get['email']?></td>
                        <td class88="employeeMobile"><?=$get['mobile']?></td>
                        <td class="employeeDni"><?=$get['dni']?></td>
                        <td><?=date('jS M, Y h:i:sa', strtotime($get['created_on']))?></td>
                        <td class="employeeIPoints"><?=$get['i_points']?></td>
                        <td class="employeeGroupPoints"><?=$get['group_points']?></td>
                        <td class="employeeTotalPoints"><?=$totalpoints?></td>
                        <td class="employeeTotalPercent"><?=$percent?> %</td>
                        <td class="employeeAmount">$ <?=$get['finalamount']?></td>
                        
                    </tr>
                    <?php $sn++;?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
                        <!-- table div end--->
                        <?php else: ?>
                            <ul><li>No ventas entre las fechas señaladas</li></ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-6">
                    <button class="btn btn-primary btn-sm hidden-print" onclick="window.print()">Imprimir Reporte</button>
                </div>
                
                
            </div>
        </div>
        <!--- panel end-->
    </body>
</html>