<h3><?php echo $title;?></h3>
<ul>
	<li>Handphone</li>
	<li>Modem</li>
	<li>TV</li>
</ul>
<?php
$query = $this->db->query('SELECT nama, password FROM mail');
?>

<table>
	<?php
	foreach ($query->result() as $row)
	{
    ?>	<tr>
        	<td><?php echo $row->nama; ?></td>
        	<td><?php echo $row->password; ?></td>
        </tr>
    <?php
	}
	echo 'Total Results: ' . $query->num_rows();
	?>
</table>

