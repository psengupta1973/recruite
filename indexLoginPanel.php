				<table width='100%' border='0' cellpadding='0' cellspacing='0'>
				  <tr>
					<td align='center' width='60%'><font color='#003366'>&nbsp;</font></td>
					<td align='center' width='10%' class='text'><font color='#003366'>
<?php 
$userName = &$_SESSION['userName'];
if($userName == NULL || empty($userName)){
	echo "<a href='index.php?subSelected=registration' style='color:#FF0000'><i>New&nbsp;User?</i>&nbsp;Register</a>\n";
}
?>
					</td>
					<td align='center' width='1%' class='text'>&nbsp;</td>
					<td align='center' width='30%' class='text'>
<?php 
if($userName !== NULL && !empty($userName)){
	$userName = str_replace(" ", "&nbsp;", $userName);
	echo "<form method='POST' action='userValidation.php' name='loginForm'>\n";
	echo "<table border='0' cellpadding='1' cellspacing='0' align='right' bgcolor='#436AA5' valign='bottom'>\n";
	echo "<tr>\n";
	echo "<td align='center'>&nbsp;</td>\n";
	echo "<td align='center'>&nbsp;<font size='2' color='#FFFFFF'><b>Welcome&nbsp;</b></font></td>\n";
	echo "<td align='center'>&nbsp;<font size='2' color='#FFFF00'><b>".$userName."</b></font></td>\n";
	echo "<td align='center'>&nbsp;<input type='hidden' name='logout'></td>\n";
	echo "<td align='center'>&nbsp;<input class='buttons1' type='submit' value='Logout' name='logoutButton'></td>\n";
}
else{
	echo "<form method='POST' action='userValidation.php' name='loginForm'>\n";
	echo "<table border='0' cellpadding='1' cellspacing='0' align='right' bgcolor='#436AA5' valign='bottom'>\n";
	echo "<tr>\n";
	echo "<td align='center'><font size='2' color='#FFFFFF'><b>&nbsp;User&nbsp;Id</b></font></td>\n";
	echo "<td align='center'><input class='TextBox' type='text' name='userid' size='6'></td>\n";
	echo "<td align='center'>&nbsp;<font size='2' color='#FFFFFF'><b>Password</b></font></td>\n";
	echo "<td align='center'><input class='TextBox' type='password' name='password' size='6'></td>\n";
	echo "<td align='center'>&nbsp;<input class='buttons1' type='submit' value='Login' name='loginButton'></td>\n";
}
?>
					</tr>
				</table>
			</form>
		</td>
	</tr>
</table>
