<?php
	$companyDAO = new CompanyDAO(); 
	$companies = $companyDAO->getCompanies(true);
	$count = count($companies);
?>
<table  border="0" cellpadding="0" cellspacing="0">
   <tr>
	  <td>
		<table  border="0" cellpadding="0" bgcolor='#558273' cellspacing="1" width="100%">
		   <tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2">
					<tr align='left' bgcolor='#558273'>
						<td class="bluebandheading1"><b>Top&nbsp;Employers</b></td>
					</tr>
				</table>
				<table cellspacing="0" border="1" bordercolor='#DADADA' cellpadding="5" bgcolor='#FFFFFF'>
					<tr>
					<?php
						for($i=0; $i<$count; $i++) // getting data
						{
							if($i%7 == 0){
								echo "</tr>\n";
								echo "<tr>\n";
							}
							echo "<td width='20%'><a href='index.php'><img border='0' width='65' height='25' src='images/".$companies[$i]->getLogo()."'/></a></td>\n";
						}
					?>
					</tr>
				</table>
			  </td>
			</tr>
		</table>
	  </td>
    </tr>
   <tr>
      <td>
		<table border="0" width="100%" cellpadding="0" cellspacing="0" height="7"><tr><td align="center"></td></tr></table>
	  </td>
   </tr>
   <tr>
	  <td>
		<table  border="0" cellpadding="0" bgcolor='#558273' cellspacing="1" width="100%">
			<tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2">
					<tr align='left'>
						<td class="bluebandheading1"><b>Top&nbsp;Jobs</b></td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="2"  width="100%" bgcolor='#DDEEE4'>
					<tr>
					<?php
						for($i=0; $i<$count; $i++) // getting data
						{
							if($i%7 == 0){
								echo "</tr>\n";
								echo "<tr>\n";
							}
							echo "<td valign='top' width='20%' class='text'><a href='jobSearch.php'>".$companies[$i]->getName()."</a></td>\n";
						}
					?>
					</tr>
				</table>
			</td>
		   </tr>
		</table>
	 </td>
   </tr>
</table>
