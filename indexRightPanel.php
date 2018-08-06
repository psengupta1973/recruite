<?php
	$jobDAO = new JobDAO(); 
	$locations = $jobDAO->getDistinctJobLocations();
	$industries = $jobDAO->getDistinctJobIndustries();
?>
<table  border="0" cellpadding="0" cellspacing="0" width="100%">
   <tr>
	  <td>
		<table  border="0" cellpadding="0" bgcolor="#6699CC" cellspacing="1" width="100%">
		   <tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2" bgcolor="#DDEEFF" align='left' width="100%">
					<tr bgcolor="#6699CC">
						<td class="bluebandheading1"><b>Jobs&nbsp;By&nbsp;Location</b></td>
					</tr>
					<?php
						$count = count($locations);
						for($i=0; $i<$count; $i++) // getting data
						{
							echo "<tr><td class='text'><a href='index.php?subSelected=jobSearch&location=$locations[$i]'>".$locations[$i]."</a></td></tr>\n";
						}
					?>
				</table>
			  </td>
		  </tr>
		</table>
	  </td>
   </tr>
   <tr>
	  <td>
		<table border="0" width="100%" cellpadding="0" cellspacing="0" height="7"><tr><td></td></tr></table>
	  </td>
   </tr>
   <tr>
	  <td>
		<table  border="0" cellpadding="0" bgcolor="#6699CC" cellspacing="1"  width="100%">
		   <tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2" bgcolor="#DDEEFF" align='left' width="100%">
					<tr bgcolor="#6699CC">
						<td class="bluebandheading1"><b>Jobs&nbsp;By&nbsp;Industry</b></td>
					</tr>
						<?php
							$count = count($industries);
							for($i=0; $i<$count; $i++) // getting data
							{
								echo "<tr><td class='text'><a href='index.php?subSelected=jobSearch&industry=$industries[$i]'>".$industries[$i]."</a></td></tr>\n";
							}
						?>
				</table>
			  </td>
		  </tr>
		</table>
	  </td>
  </tr>
</table>
