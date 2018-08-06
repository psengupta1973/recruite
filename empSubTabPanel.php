				<table border="0" cellpadding="0" width="100%" cellspacing="0" background="images/bar_bg_emp.gif">
				  <tr>
				   <td align="left">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							  <tr>
		<?php 
							if($subSelectedTab == "resumeSearch")
							{
								echo "<td width='15%' class='on-sub-tab'>Resume&nbsp;Search</td>\n";
							}
							else
							{
								echo "<td width='15%' class='off-sub-tab'><a href='empHome.php?subSelected=resumeSearch'>Resume&nbsp;Search</a></td>\n";
							}
		?>
								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
		<?php 
							if($subSelectedTab == "postJob")
							{
								echo "<td width='15%' class='on-sub-tab'>Post&nbsp;Job</td>\n";
							}
							else
							{
								echo "<td width='15%' class='off-sub-tab'><a href='empHome.php?subSelected=postJob'>Post&nbsp;Job</a></td>\n";
							}
		?>

								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
		<?php 
							if($subSelectedTab == "myJobHouse")
							{
								echo "<td width='15%' class='on-sub-tab'>Manage&nbsp;Profile</td>\n";
							}
							else
							{
								echo "<td width='15%' class='off-sub-tab'><a href='empHome.php?subSelected=myJobHouse'>My&nbsp;JobHouse</a></td>\n";
							}
		?>
								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
								<td width="55%">&nbsp;</td>
							  </tr>
						</table>
					</td>
				  </tr>
				 </table>
