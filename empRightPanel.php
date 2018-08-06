<?php
	$jobDAO = new JobDAO(); 
	$locations = $jobDAO->getDistinctJobLocations();
	$industries = $jobDAO->getDistinctJobIndustries();
?>
<table  border="0" cellpadding="0" cellspacing="0" width="100%">
   <tr>
	  <td>
		<table  border="0" cellpadding="0" bgcolor="#558273" cellspacing="1" width="100%">
		   <tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2" bgcolor="#DDEEE4" align='left' width="100%">
					<tr bgcolor="#558273">
						<td class="bluebandheading1"><b>Candidate&nbsp;By&nbsp;Location</b></td>
					</tr>
						<?php
							$count = count($locations);
							for($i=0; $i<$count; $i++) // getting data
							{
								echo "<tr><td class='text'><a href='empHome.php?subSelected=resumeSearch&rLocation=$locations[$i]'>".$locations[$i]."</a></td></tr>\n";
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
		<table  border="0" cellpadding="0" bgcolor="#558273" cellspacing="1"  width="100%">
		   <tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2" bgcolor="#DDEEE4" align='left' width="100%">
					<tr bgcolor="#558273">
						<td class="bluebandheading1"><b>Candidate&nbsp;By&nbsp;Industry</b></td>
					</tr>
						<?php
							$count = count($industries);
							for($i=0; $i<$count; $i++) // getting data
							{
								echo "<tr><td class='text'><a href='empHome.php?subSelected=resumeSearch&rIndustry=$industries[$i]'>".$industries[$i]."</a></td></tr>\n";
							}
						?>
				</table>
			  </td>
		  </tr>
		</table>
	  </td>
  </tr>
</table>
