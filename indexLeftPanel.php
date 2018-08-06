<?php
	$companyDAO = new CompanyDAO(); 
	$companies = $companyDAO->getCompanies(false);
	$count = count($companies);
?>
<table  border="0" cellpadding="0" bgcolor="#6699CC" cellspacing="1"  width="100%">
   <tr>
	  <td>
		<table cellspacing="0" border="0" cellpadding="2" width="100%">
			<tr><td class="bluebandheading1"><b>Featured&nbsp;Employers&nbsp;</b></td></tr>
		</table>
		  <table cellspacing="0" border="0" cellpadding="2" bgcolor="#DDEEFF"  width="100%" align='left'>
			<?php
				for($i=0; $i<$count; $i++) // getting data
				{
					echo "<tr><td class='text'><a href='index.php'>".$companies[$i]->getName()."</a></td></tr>\n";
				}
			?>
		  </table>
	  </td>
  </tr>
</table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="7"><tr><td></td></tr></table>
<table cellspacing="1" border="0" cellpadding="0" width="100%" bgcolor="#800000">
	<tr><td>
	  <table cellspacing="0" border="0" cellpadding="1" bgcolor="#FDF4B5"  width="100%" align='left'>
		<tr><td class='text'><font color='#800000' size='2'><b>ABC Consultants</b></font></td></tr>
		<tr><td class='text'><font color='#800000' size='4'><b>We offer training too !!</b></font></td></tr>
		<tr><td class='text'><a href='abcConsultants.php'><font color='#800000' size='2'>Click here for details</font></a></td></tr>
	  </table>
  </td></tr>
</table>
