<?php
include "connection.php";

$strsql = "
select id, subject, body, sender, addresses, to_char(received, 'dd/mm/yyyy @ hh24:mi') as received from emails where (
position(upper('" . pg_escape_string($_REQUEST['term']) . "') in upper(sender)) > 0 or 

position(upper('" . pg_escape_string($_REQUEST['term']) . "') in upper(addresses)) > 0 or

position(upper('" . pg_escape_string($_REQUEST['term']) . "') in upper(subject)) > 0 or  

position(upper('" . pg_escape_string($_REQUEST['term']) . "') in upper(body)) > 0

)
";

if($_REQUEST['from'] != "") {
	$strsql .= " and received::date between '" . $_REQUEST['from'] . "'::date and '" . $_REQUEST['to'] . "'::date ";
}

//echo $strsql;

$res = pg_query($con, $strsql);
//echo pg_num_rows($res);
?>
<table summary="" class="table table-striped table-condensed">
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
			<td><button type="button" id="det" class="btn btn-sm btn-danger" dbid="<?php echo $row['id']; ?>">VIEW CONTENT</button></td>	
		</tr>
		<?php	
		}
	}
	?>
	</tbody>
</table>
<script type="text/javascript" >
	$(document).ready(function () {
		$("#det").click(function () {
			$(".detail").load("read.php?id=" + $(this).attr("dbid"), function () {
				$(this).fadeIn();
			});
		})
	})
</script>