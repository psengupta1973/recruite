<table border="0" width="100%" cellpadding="0" cellspacing="0" height="5"><tr><td align="center"></td></tr></table>
<?php 
include("jobSearchPanel.php");
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" height="7"><tr><td align="center"></td></tr></table>
<table border="0" cellpadding="0" width="100%" cellspacing="0">
	<tr>
	  <td width="15%" valign="top">
	    <table  border="0" cellpadding="0" cellspacing="0" width="100%">
	       <tr>
	          <td>
<?php 
include("jobSearchLeftPanel.php");
?>
	          </td>
	       </tr>
	    </table>
	  </td>
      <td>
		&nbsp;&nbsp;
      </td>
	  <td width="85%" valign="top">
	    <table  border="0" cellpadding="0" cellspacing="0" width="100%">
	       <tr>
	          <td>
<?php 
include("jobSearchResults.php");
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