
<?php $page=strtolower($_GET['page']); ?>

<!-- Header -->
<thead>
	<tr>
		<th class="col-md-1">No</th>

		<?php switch($page): 
			
			case 'school': ?>
				<th  class="center">Sekolah</th>
				<th>Create By</th>
		    <th>Create Date</th>
			<?php break; ?>

			<?PHP case 'class': ?>
				<th  class="center">Kelas</th>
				<th>Create By</th>
		    <th>Create Date</th>
			<?php break; ?>

			<?php case 'class_sub': ?>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th>Sub Kelas</th>
				<th>Create By</th>
		    <th>Create Date</th>
			<?php break; ?>

			<?php case 'major': ?>
				<th>Jurusan</th>
				<th>Create By</th>
		    <th>Create Date</th>
			<?php break; ?>

			<?php case 'study': ?>
				<th>Mata Pelajaran</th>
				<th>Create By</th>
		    <th>Create Date</th>
			<?php break; ?>

			<?php case 'sub_study': ?>
				<th>Mata Pelajaran</th>
				<th>Sub Mata Pelajaran</th>
				<th>Create Date</th>
		   
			<?php break; ?>

		<?php 
				default:
					echo"Not List";
			endswitch; ?>

		<th class="col-md-1">Aksi</th>
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
		<td class="center"><?PHP echo $numbers; ?></td>
		
		<?php switch($page): 
			case 'school': ?>
				<td><?PHP echo $key->name; ?></td>
				<td><?PHP echo $key->create_by; ?></td>
				<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>

			<?PHP case 'class': ?>
				<td><?PHP echo $key->name; ?></td>
				<td><?PHP echo $key->create_by; ?></td>
				<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>

			<?php case 'class_sub': ?>
				<td><?PHP echo $key->class; ?></td>
				<td><?PHP echo $key->major; ?></td>
				<td><?PHP echo $key->name; ?></td>
				<td><?PHP echo $key->create_by; ?></td>
				<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>

			<?php case 'major': ?>
				<td><?PHP echo $key->name; ?></td>
				<td><?PHP echo $key->create_by; ?></td>
				<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>

			<?php case 'study': ?>
				<td><?PHP echo $key->name; ?></td>
				<td><?PHP echo $key->create_by; ?></td>
				<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>
			<?php case 'sub_study': ?>
				<td><?PHP echo $key->mapel; ?></td>
				<td><?PHP echo $key->name; ?></td>
				<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>

		<?php 
				default:
					echo"Not List";
			endswitch; ?>

		<td>

			<?PHP echo $_SESSION['permission']['elearn_md_'.$_GET['page']]['edit'] ? 
				"
				<a  href='?page=$page&action=edit&id=$key->id'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
				" : ""; ?> <!-- edit -->
			
			<?PHP 
				if ($_SESSION['permission']['elearn_md_'.$_GET['page']]['delete']==true){
				echo '
				<a title="Delete" href="#"  onclick="deletedata(\''.$key->id.'\',\''.$title.'\',\''.
				(
					$page=="class" ? $key->name : $key->name
				) //class
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