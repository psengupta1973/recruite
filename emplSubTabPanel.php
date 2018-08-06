				<table border="0" cellpadding="0" width="100%" cellspacing="1" background="images/bar_bg.gif">
				  <tr>
				   <td align="left">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							  <tr>
		<?php 
							if($selectedTab == "resumeSearch")
							{
								echo "<td width='15%' class='on-sub-tab'>Resume&nbsp;Search</td>\n";
							}
							else
							{
								echo "<td width='15%' class='off-sub-tab'><a href='resumeSearch.php?selected=jobSearch'>Resume&nbsp;Search</a></td>\n";
							}
		?>
								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
		<?php 
							if($selectedTab == "postJob")
							{
								echo "<td width='15%' class='on-sub-tab'>Post&nbsp;Job</td>\n";
							}
							else
							{
								echo "<td width='15%' class='off-sub-tab'><a href='postJob.php?selected=postResume'>Post&nbsp;Job</a></td>\n";
							}
		?>

								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
		<?php 
							if($selectedTab == "manageProfile")
							{
								echo "<td width='15%' class='on-sub-tab'>Manage&nbsp;Profile</td>\n";
							}
							else
							{
								echo "<td width='15%' class='off-sub-tab'><a href='manageProfile.php?selected=manageProfile'>Manage&nbsp;Profile</a></td>\n";
							}
		?>
								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
								<td width="55%">&nbsp;</td>
							  </tr>
						</table>
					</td>
				  </tr>
				 </table>
