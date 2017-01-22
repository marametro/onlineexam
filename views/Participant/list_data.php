
<?php $page=strtolower($_GET['page']); ?>

<!-- Header -->
<thead>
	<tr>
		<th width="3%">No</th>

		<?php switch($page): 
			
			case 'participant': ?>
			    <th class="center">NIS</th>
			    <th>Nama</th>
			    <th>JK</th>
			    <th>Sekolah Asal</th>
			    <th>Create By</th>
		    	<th>Create Date</th>
			<?php break; ?>

		<?php 
				default:
					echo"Not List";
			endswitch; ?>

		<th width="2%">Aksi</th>
	</tr>
</thead>

<!-- Data -->
<tbody>
	<?PHP
		$numbers = 1;
		foreach ($data as $key) 
		{ 
	?>
	<tr>
		
		<?php switch($page): 
			
			case 'participant': ?>
					<td><?PHP echo $numbers; ?></td>
			    <td class="center"><?PHP echo $key->nis; ?></td>
			    <td><?PHP echo $key->name; ?></td>
			    <td><?PHP echo $key->gender; ?></td>
			    <td><?PHP echo $key->school; ?></td>
			    <td><?PHP echo $key->create_by; ?></td>
					<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>

		<?php 
				default:
					echo"Not List";
			endswitch; ?>

		<td>
			<?PHP echo $_SESSION['permission']['elearn_pc_'.$_GET['page']]['edit'] ? 
				"
				<a  href='?page=$page&action=edit&id=$key->id'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
				" : ""; ?> <!-- edit -->
			
			<?PHP 
				if ($_SESSION['permission']['elearn_pc_'.$_GET['page']]['delete']==true){
				echo '
				<a title="Delete" href="#"  onclick="deletedata(\''.$key->id.'\',\''.$title.'\',\''.
				(
					$page=="participantTESTEST" ? $key->study : $key->name
				) //quest
				.'\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
				';
				} else{ ''; }				
			?>	<!-- delete -->
		</td>
	</tr>
	<?PHP 
		$numbers++; 
		}
	?>
</tbody>