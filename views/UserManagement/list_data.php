
<?php $page=strtolower($_GET['page']); ?>

<!-- Header -->
<thead>
	<tr>
		<th>No</th>

		<?php switch($page): 
			
			case 'role': ?>
			    <th>Role Name</th>
			    <th>Create By</th>
			    <th>Create Date</th>
			<?php break; ?>

			<?php case 'user': ?>
			    <th>Username</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Role</th>
					<th>Create By</th>
			    <th>Create Date</th>
			<?php break; ?>

			<?php case 'role_permission': ?>
			    <th>Role</th>
			    <th>Modul</th>
					<th>Feature</th>
					<th>menu</th>
					<th>add</th>
					<th>edit</th>
					<th>delete</th>
			<?php break; ?>

		<?php 
				default:
					echo"Not List";
			endswitch; ?>

		<th>Aksi</th>
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
			
			case 'role': ?>
					<td><?PHP echo $numbers; ?></td>
					<td><?PHP echo $key->name; ?></td>
					<td><?PHP echo $key->create_by; ?></td>
					<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>

			<?php case 'user': ?>
					<td><?PHP echo $numbers; ?></td>
					<td><?PHP echo $key->username; ?></td>
					<td><?PHP echo $key->fullname; ?></td>
					<td><?PHP echo $key->email_address; ?></td>
					<td><?PHP echo $key->role; ?></td>
					<td><?PHP echo $key->create_by; ?></td>
					<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>

			<?php case 'role_permission': ?>
					<td><?PHP echo $numbers; ?></td>
					<td><?PHP echo $key->role; ?></td>
					<td><?PHP echo $key->modul_alias; ?></td>
					<td><?PHP echo $key->menu_alias;?></td>
					<td><input disabled="true" type="checkbox" <?php echo ($key->menu ? 'checked="true"' : '') ?> ></td>
					<td><input disabled="true" type="checkbox" <?php echo ($key->add ? 'checked="true"' : '') ?> ></td>
					<td><input disabled="true" type="checkbox" <?php echo ($key->edit ? 'checked="true"' : '') ?> ></td>
					<td><input disabled="true" type="checkbox" <?php echo ($key->delete ? 'checked="true"' : '') ?> ></td>
			<?php break; ?>

		<?php 
				default:
					echo"Not List";
			endswitch; ?>

		<td>

			<?PHP echo $_SESSION['permission']['elearn_um_'.$_GET['page']]['edit'] ? 
				"
				<a  href='?page=$page&action=edit&id=$key->id'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
				" : ""; ?> <!-- edit -->
			
			<?PHP 
				if ($_SESSION['permission']['elearn_um_'.$_GET['page']]['delete']==true){
				echo '
				<a title="Delete" href="#"  onclick="deletedata(\''.$key->id.'\',\''.$title.'\',\''.
				(
					$page=="user" ? $key->username : 
					(
						$page=="role_permission" ? $key->menu_alias : $key->name
					) //role_permission
				) //user
				.'\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
				';
				} else{ ''; }				
			?> <!-- delete -->
			
		</td>
	</tr>
	<?PHP 
		$numbers++; 
		}
	?>
</tbody>