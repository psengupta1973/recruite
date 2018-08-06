				<table border="0" cellpadding="0" width="100%" cellspacing="0" background="images/bar_bg.gif">
				  <tr>
				   <td align="left">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							  <tr>
		<?php 
							if(strpos($subSelectedTab, "jobSearch") === false)
							{
								echo "<td width='15%' class='off-sub-tab'><a href='index.php?subSelected=jobSearch'>Job&nbsp;Search</a></td>\n";
							}
							else
							{
								echo "<td width='15%' class='on-sub-tab'>Job&nbsp;Search</td>\n";
							}
		?>
								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
		<?php 
							if(strpos($subSelectedTab, "postResume") === false)
							{
								echo "<td width='15%' class='off-sub-tab'><a href='index.php?subSelected=postResume'>Post&nbsp;Resume</a></td>\n";
							}
							else
							{
								echo "<td width='15%' class='on-sub-tab'>Post&nbsp;Resume</td>\n";
							}
		?>

								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
		<?php 
							if(strpos($subSelectedTab, "myJobHouse") === false)
							{
								echo "<td width='15%' class='off-sub-tab'><a href='index.php?subSelected=myJobHouse'>My&nbsp;JobHouse</a></td>\n";
							}
							else
							{
								echo "<td width='15%' class='on-sub-tab'>My&nbsp;JobHouse</td>\n";
							}
		?>
								<td class='off-sub-tab'>&nbsp;|&nbsp;</td>
								<td width="55%">&nbsp;</td>
							  </tr>
						</table>
					</td>
				  </tr>
				 </table>
