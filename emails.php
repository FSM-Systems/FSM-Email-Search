<?php
include "connection.php";

$strsql = "
select *, unnest(addresses) as addr from emails where (
upper(sender) like '%" . $_REQUEST['term'] . "%' or 

upper(addr) like '%" . $_REQUEST['term'] . "%' or

position(upper('" . $_REQUEST['term'] . "') in subject) > 0 or  

position(upper('" . $_REQUEST['term'] . "') in body) > 0

)
";

if($_REQUEST['from'] != "") {
	$strsql .= " and received::date between '" . $_REQUEST['from'] . "' and '" . $_REQUEST['to'] . "' ";
}

echo $strsql;

$res - pg_query($con, $strsql);
?>
<table summary="" class="table table-striped">
	<thead>
			<tr>
				<th>Date</th>			
				<th>From</th>			
				<th>Recipients</th>			
				<th>Subject</th>			
				<th>Content</th>			
			</tr>	
	</thead>
	<tbody>
	<?php
	if(pg_num_rows($res) == 0 ) {
		?>
		<tr>
			<td colspan="100">No results found</td>		
		</tr>
		<?php
	} else {
		while($row = pg_fetch_assoc($res)) {
		?>
		<tr>
			<td><?php echo $row['received']; ?></td>	
			<td><?php echo $row['sender']; ?></td>	
			<td><?php echo $row['addresses']; ?></td>	
			<td><?php echo $row['subject']; ?></td>	
			<td><?php echo $row['subject']; ?></td>	
		</tr>
		<?php	
		}
	}
	?>
	</tbody>
</table>