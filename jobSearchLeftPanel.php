<?php
	$jobDAO = new JobDAO(); 
	$designations = $jobDAO->getDistinctDesignations();
	$count = count($designations);
?>
<table  border="0" cellpadding="0" cellspacing="1" width="100%">
	<tr>
		<td>
			<?php 
			include("indexRightPanel.php");
			?>
			<table cellspacing="0" border="0" cellpadding="0" width="100%" height='7'><tr><td></td></tr></table>
		</td>
	</tr>
	<tr>
	  <td>
		<table  border="0" cellpadding="0" cellspacing="1" width="100%" bgcolor="#6699CC">
		   <tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2" bgcolor="#DDEEFF" align='left' width="100%">
					<tr bgcolor="#6699CC">
						<td class="bluebandheading1"><b>Jobs&nbsp;By&nbsp;Designation</b></td>
					</tr>
					<?php
						for($i=0; $i<$count; $i++)
						{
							echo "<tr><td class='text'><a href='index.php?designation=$designations[$i]'>".$designations[$i]."</a></td></tr>\n";
						}
					?>
				</table>
			  </td>
			</tr>
		</table>
	  </td>
   </tr>
</table>
