<?php
defined('BASEPATH') OR exit('');
?>

<?php echo isset($range) && !empty($range) ? "Showing ".$range : ""?>
<div class="panel panel-primary">
    <div class="panel-heading">EMPRESARIOS</div>
    <?php if($allEmployees):?>
    <div class="table table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>N</th>
                    <th>CODIGO DE EMPRESARIO</th>
                    <th>CODIGO DE REFERIDO</th>
                    <th>NOMBRE</th>
                    <th>DOMICILIO</th>
                    <th>CODIGO POSTAL</th>
                    <th>E-MAIL</th>
                    <th>TELEFONO</th>
                    <th>DNI</th>
                    <th>FECHA DE REGISTRADO</th>
                    <th>PUNTOS PERSONALES</th>
                    <th>PUNTOS GRUPALES</th>
                    <th>PUNTOS TOTALES</th>
                    <th>PORCENTAJE(%)</th>
                    <th>MONTO A COBRAR</th>                    
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
if($get['customer_ref'] == "S0"){
                        $get['customer_ref'] = "-";
                    }
                    ?>
                        <th><?=$sn?>.</th>
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
    <?php else:?>
    No Employee Accounts
    <?php endif; ?>
</div>
<!-- Pagination -->
<div class="row text-center">
    <?php echo isset($links) ? $links : ""?>
</div>
<!-- Pagination ends -->
