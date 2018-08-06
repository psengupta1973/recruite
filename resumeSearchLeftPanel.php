<?php
	$jobDAO = new JobDAO(); 
	$designations = $jobDAO->getDistinctDesignations();
	$count = count($designations);
?>
<table  border="0" cellpadding="0" cellspacing="1"  width="100%">
	<tr>
		<td>
			<?php 
			include("empRightPanel.php");
			?>
			<table cellspacing="0" border="0" cellpadding="0" width="100%" height='7'><tr><td></td></tr></table>
		</td>
	</tr>
	<tr>
	  <td>
		<table  border="0" cellpadding="0" cellspacing="1" width="100%" bgcolor="#558273">
		   <tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2" bgcolor="#DDEEE4" align='left' width="100%">
					<tr bgcolor="#558273">
						<td class="bluebandheading1"><b>Candidates&nbsp;By&nbsp;Designation</b></td>
					</tr>
					<?php
						for($i=0; $i<$count; $i++)
						{
							echo "<tr><td class='text'><a href='empHome.php?rDesignation=$designations[$i]'>".$designations[$i]."</a></td></tr>\n";
						}
					?>
				</table>
			  </td>
			</tr>
		</table>
	  </td>
	</tr>
</table>
