<?php 
session_start();
include("abcHeader.php");
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="7"><tr><td align="center"></td></tr></table>
<?php 
include("indexTabPanel.php");
include("abcSubTabPanel.php");
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="2"><tr><td align="center"></td></tr></table>
<?php 
include("abcSplashPanel.php");
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="7"><tr><td align="center"></td></tr></table>
<table border="0" cellpadding="0" width="100%" cellspacing="0">
	<tr>
	  <td width="75%" valign="top">
	    <table  border="0" cellpadding="0" cellspacing="0" width="100%">
	       <tr>
	          <td>
<?php 
include("abcMiddlePanel.php");
?>
	          </td>
	       </tr>
	    </table>
	  </td>
      <td>
		&nbsp;&nbsp;
      </td>
	  <td width="25%" valign="top">
	    <table  border="0" cellpadding="0" cellspacing="0" width="100%">
	       <tr>
	          <td>
<?php 
include("abcRightPanel.php");
?>
	          </td>
	       </tr>
	    </table>
	  </td>
	</tr>
</table>
<?php 
include("indexFooter.php");
?>