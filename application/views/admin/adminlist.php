<?php
defined('BASEPATH') OR exit('');
?>

<?php echo isset($range) && !empty($range) ? "Showing ".$range : ""?>
<div class="panel panel-primary">
    <div class="panel-heading">ADMINISTRATOR ACCOUNTS</div>
    <?php if($allAdministrators):?>
    <div class="table table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>NOMBRE</th>
                    <th>E-MAIL</th>
                    <th>TELEFONO</th>
                    <th>2do TEL.</th>
                    <th>ROL</th>
		    <th>LOCAL</th>
                    <th>CREADO</th>
                    <th>ULTIMO LOGIN</th>
                    <th>EDITAR</th>
                    <th>ESTADO DE CUENTA</th>
                    <th>BORRAR</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allAdministrators as $get):?>
			<?php 
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
                    <tr>
                        <th><?=$sn?>.</th>
                        <td class="adminName"><?=$get->first_name ." ". $get->last_name?></td>
                        <td class="hidden firstName"><?=$get->first_name?></td>
                        <td class="hidden lastName"><?=$get->last_name?></td>
                        <td class="adminEmail"><?=mailto($get->email)?></td>
                        <td class="adminMobile1"><?=$get->mobile1?></td>
                        <td class="adminMobile2"><?=$get->mobile2?></td>
                        <td class="adminRole"><?=ucfirst($get->role)?></td>

			<td class="adminLocal"><?=$get->local?></td>
                        <td><?=date('jS M, Y h:i:sa', strtotime($get->created_on))?></td>
                        <td>
                            <?=$get->last_login === "0000-00-00 00:00:00" ? "---" : date('jS M, Y h:i:sa', strtotime($get->last_login))?>
                        </td>
                        <td class="text-center editAdmin" id="edit-<?=$get->id?>">
                            <i class="fa fa-pencil pointer"></i>
                        </td>
                        <td class="text-center suspendAdmin text-success" id="sus-<?=$get->id?>">
                            <?php if($get->account_status === "1"): ?>
                            <i class="fa fa-toggle-on pointer"></i>
                            <?php else: ?>
                            <i class="fa fa-toggle-off pointer"></i>
                            <?php endif; ?>
                        </td>
                        <td class="text-center text-danger deleteAdmin" id="del-<?=$get->id?>">
                            <?php if($get->deleted === "1"): ?>
                            <a class="pointer">Undo Delete</a>
                            <?php else: ?>
                            <i class="fa fa-trash pointer"></i>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $sn++;?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <?php else:?>
    No Administrative Accounts
    <?php endif; ?>
</div>
<!-- Pagination -->
<div class="row text-center">
    <?php echo isset($links) ? $links : ""?>
</div>
<!-- Pagination ends -->
