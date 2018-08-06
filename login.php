<table border="1" bordercolor='#6699CC' cellpadding="0" cellspacing="0" width='100%'>
	<tr>
	  <td width='50%' valign='top'>
		<table cellspacing="0" border="0" cellpadding="1" width="100%">
			<tr>
				<td bgcolor='#6699CC' class="bluebandheading1">Login</td>
			</tr>
		</table>
		<table cellspacing="0" border="0" cellpadding="5" width="100%">
			<form method="POST" action="userValidation.php" name="loginForm">
			<tr><td height='4' align="right"></td></tr>
			<tr>
			   <td align="right"><font size="2"><b>Login&nbsp;Id</b></font></td>
			   <td align='left'>
<?php 
			   echo "<input class='TextBox' type='text' name='userid' size='20' value=''>\n";
?>
			   </td>
			</tr>
			<tr>
			   <td align="right"><font size="2"><b>Password</b></font></td>
			   <td align="left">
<?php 
			   echo "<input class='TextBox' type='password' name='password' size='20'>\n";
?>
			   </td>
			</tr>
			<tr><td height='4' align="right"></td></tr>
			<tr>
				<td align="right" class="text">&nbsp;</td>
				<td align="left" class="text">
					<input class="buttons1" type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;" name="regB1">
					&nbsp;<a href='forgotPassword.php'><i>Forgot&nbsp;your&nbsp;password?</i></a>
				</td>
			</tr>
			   <input type="hidden" value="login" name="subSelected">
			</form>
		</table>
	  </td>
	  <td width='50%' valign='top'>
		<table cellspacing="0" border="0" cellpadding="1" width="100%">
			<tr>
				<td bgcolor='#6699CC' class="bluebandheading1">New&nbsp;Users&nbsp;Please&nbsp;Register</td>
			</tr>
		</table>
		<table  border="0" cellpadding="0" cellspacing="1"  width="100%">
		   <tr>
			  <td>
					<table border='0' cellpadding="0" cellspacing="0">
					<tr >
						<td class="text"><BR><IMG height=4 src="images/blue_bullet.gif" width=4>
						Apply Online to 200,000 jobs daily at the click of a mouse 
						</td>
					</tr>
					<tr >
						<td class="text"><IMG height=4 src="images/blue_bullet.gif" width=4>
						 Get headhunted by over 15,000 recruiters daily  
						</td>
					</tr>
					<tr >
						 <td class="text"><IMG height=4 src="images/blue_bullet.gif" width=4>
						 Get Jobs in your inbox that match your profile 
						</td>
					</tr>
					<tr >
						 <td class="text">&nbsp;</td>
					</tr>
					<tr >
						<form method="POST" action="index.php?subSelected=registration" name="regForm">
						<td align="center">
							<input class="buttons1" type="submit" value="&nbsp;Register&nbsp;Here&nbsp;" name="regB1">&nbsp;&nbsp;
						</td>
						</form>
					</tr>
					<tr><td height='4' align="right"></td></tr>
				</table>
			  </td>
		  </tr>
		</table>
	 </td>
   </tr>
</table>
