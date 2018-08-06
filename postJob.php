<table border="0" cellpadding="0" cellspacing="0" width='100%'>
   <tr>
	  <td>
		<table  border="1" bordercolor='#6699CC' cellpadding="0" cellspacing="0">
			<tr>
			  <td width='80%'>
				<table cellspacing="0" border="0" cellpadding="2" width='100%' bgcolor='#6699CC'>
					<tr align='left'>
						<td class="bluebandheading1"><b>Registration</b></td>
					</tr>
				</table>
				<table cellspacing="0" border="0" cellpadding="2" width="100%">
					<form method="POST" action="userEntry.php" name="registrationForm">
					<tr bgcolor='#EFEFEF'>
						<td>&nbsp;</td>
						<td class="newuserheading1" align='right'>Login</td>
						<td class="newuserheading1" align='left'>Information</td>
						<td>&nbsp;</td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="right" class='text'><b><font class='redbold1'>*</font>Login&nbsp;Id</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='userid' size='20' value=''>\n";
?>
					   </td>
					   <td align="right" class='text'><b>&nbsp;Secret&nbsp;Ques.</b></td>
					   <td align='left'>
						 <select size="1" name="secretq">
							<option value='mother'>Mother's maiden name?</option>
							<option value='pet'>Pet's name?</option>
							<option value='school'>First school?</option>
						 </select>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Password</b></td>
					   <td align="left">
<?php 
					   echo "<input class='TextBox' type='password' name='password1' size='20'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>&nbsp;Secret&nbsp;Ans.</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='secreta' size='20' value=''>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Re-enter&nbsp;Password</b></td>
					   <td align="left">
<?php 
					   echo "<input class='TextBox' type='password' name='password2' size='20'>\n";
?>
					   </td>
<?php 
					   echo "<td align='right' class='text'>Recruiter<input class='select' type='radio' name='type' value='".User::$RECRUITER."'></td>\n";
					   echo "<td align='left' class='text'>&nbsp;Job&nbsp;Seeker<input class='select' type='radio' name='type' value='".User::$JOB_SEEKER."'></td>\n";
?>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr bgcolor='#EFEFEF'>
						<td>&nbsp;</td>
						<td class="newuserheading1" align='right'>Personal</td>
						<td class="newuserheading1" align='left'>Information</td>
						<td>&nbsp;</td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="right" class='text'><b>First&nbsp;Name</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='fname' size='30' value=''>\n";
?>
					   </td>
					   <td align="right" class='text'><b>&nbsp;Date&nbsp;Of&nbsp;Birth</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='dob' size='20' value=''>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Last&nbsp;Name</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='lname' size='30' value=''></td>\n";
?>
					   </td>
					   <td align="left" class='text'><b>Gender</b>
						 <select size="1" name="gender">
<?php 
						if($gender == "f"){
							echo "<option value='#'>Select</option>\n";
							echo "<option value='m'>Male</option>\n";
							echo "<option selected value='f'>Female</option>";
						}
						else{
							if($gender == "m"){
								echo "<option value='#'>Select</option>\n";
								echo "<option selected value='m'>Male</option>\n";
								echo "<option value='f'>Female</option>";
							}
							else{
								echo "<option value='#'>Select</option>\n";
								echo "<option value='m'>Male</option>\n";
								echo "<option value='f'>Female</option>";
							}
						}
?>
						 </select>
					   </td>
					   <td align="left" class='text'><b>Marital&nbsp;Status</b>
						 <select size="1" name="marital">
							<option value='#'>Select</option>
							<option value='u'>Unmarried</option>
							<option value='m'>Married</option>
							<option value='w'>Widowed</option>
							<option value='d'>Divorced</option>
							<option value='o'>Other</option>
						 </select>
					   </td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr bgcolor='#EFEFEF'>
						<td>&nbsp;</td>
						<td class="newuserheading1" align='right'>Contact</td>
						<td class="newuserheading1" align='left'>Information</td>
						<td>&nbsp;</td>
					</tr>
					<tr><td height='10' align="right"></td></tr>
					<tr>
					   <td align="right" class='text'><b>Address</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='address' size='30' value=''>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Work&nbsp;Phone</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='wphone' size='25' value=''>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>City</b></td>
					   <td align="left">
<?php 
					   echo "<input class='TextBox' type='text' name='city' size='20' value=''>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Home&nbsp;Phone</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='hphone' size='25' value=''>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>State</b></td>
					   <td align="left">
<?php 
					   echo "<input class='TextBox' type='text' name='state' size='20'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Mobile&nbsp;No.</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='mobile' size='25' value=''>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Country</b></td>
					   <td align="left">
<?php 
					   echo "<input class='TextBox' type='text' name='country' size='20'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Fax</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='fax' size='25' value=''>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>Zip/Pin</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='zip' size='20'>\n";
?>
					   </td>
					   <td align="right" class='text'><b>Email</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='email' size='30' value=''>\n";
?>
					   </td>
					</tr>
					<tr>
					   <td align="right" class='text'><b>URL</b></td>
					   <td align='left'>
<?php 
					   echo "<input class='TextBox' type='text' name='url' size='30' value=''></td>\n";
?>
					   </td>
					   <td align="left">&nbsp;</td>
					   <td align="left" class="text" >I accept the <a href='termsOfUse.php'>terms of use</a><input class="select" type="checkbox" name="terms" value='y'></td>
					</tr>
					<tr>
					   <td align="left">&nbsp;</td>
					   <td align="left">&nbsp;</td>
					   <td align="center"><input class="buttons1" type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;" name="regB1">&nbsp;&nbsp;</td>
					   <td align="left">&nbsp;</td>
					</tr>
					<tr><td height='5' align="right"></td></tr>
					   <input type="hidden" value="registration" name="subSelected">
					</form>
		</table>
	 </td>
	 <td width='20%' valign='top'>
		<table  border="0" cellpadding="0" cellspacing="1"  width="100%">
		   <tr>
			  <td>
				<table cellspacing="0" border="0" cellpadding="2" align='left' width="100%">
					<tr >
						<td class="text"><b>Registration&nbsp;Help</b></td>
					</tr>
					<tr >
						<td class="text">User name is subject to availability of login ID on JobHouse.com</td>
					</tr>
				</table>
			  </td>
		  </tr>
		</table>
	 </td>
   </tr>
</table>
