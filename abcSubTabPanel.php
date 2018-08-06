				<table border="0" cellpadding="0" width="100%" cellspacing="0" background="images/bar_bg_abc.gif">
				  <tr>
				   <td align="left">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							  <tr>
		<?php 
							if($subSelectedTab == "services")
							{
								echo "<td width='20%' class='on-sub-tab'>Services</td>\n";
							}
							else
							{
								echo "<td width='20%' class='off-sub-tab'><a href='abcConsultants.php?subSelected=services'>Services</a></td>\n";
							}
		?>
								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
		<?php 
							if($subSelectedTab == "aboutUs")
							{
								echo "<td width='20%' class='on-sub-tab'>About&nbsp;Us</td>\n";
							}
							else
							{
								echo "<td width='20%' class='off-sub-tab'><a href='abcConsultants.php?subSelected=aboutUs'>About&nbsp;Us</a></td>\n";
							}
		?>

								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
								<td width="60%">&nbsp;</td>
							  </tr>
						</table>
					</td>
				  </tr>
				 </table>
