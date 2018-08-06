<?php 
$rKeyword = null;
if(array_key_exists("rKeyword", $_GET)){
	$rKeyword = trim($_GET['rKeyword']);
}
$rFuncArea = null;
if(array_key_exists("funcArea", $_GET)){
	$rFuncArea = trim($_GET['funcArea']);
}
$rExperience = null;
if(array_key_exists("rExperience", $_GET)){
	$rExperience = $_GET['rExperience'];
}
$rSortBy = null;
if(array_key_exists("rSortBy", $_GET)){
	$rSortBy = $_GET['rSortBy'];
}
$rOptions = null;
if(array_key_exists("rOptions", $_GET)){
	$rOptions = $_GET['rOptions'];
}
$rLocation = null;
if(array_key_exists("rLocation", $_GET)){
	$rLocation = trim($_GET['rLocation']);
}
$rIndustry = null;
if(array_key_exists("rIndustry", $_GET)){
	$rIndustry = $_GET['rIndustry'];
}
$rDesignation = null;
if(array_key_exists("rDesignation", $_GET)){
	$rDesignation = $_GET['rDesignation'];
}
$rSearchType = null;
if(array_key_exists("rSearchType", $_GET)){
	$rSearchType = $_GET['rSearchType'];
}
?>
<table border="0" width="100%" cellpadding="0" cellspacing="1" bgcolor="#558273">
 <tr>
   <td align="center">
	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#DDEEE4">
	 <tr>
		<form method="GET" action="empHome.php" name="resumeSearchForm">
		   <td align="center"><font size="2"><b>&nbsp;Keywords&nbsp;</b></font></td>
<?php 
		   echo "<td align='center'><input class='TextBox' type='text' name='rKeyword' size='10' value='$rKeyword'></td>\n";
?>
		   <td align="center"><font size="2"><b>&nbsp;&nbsp;Options&nbsp;</b></font></td>
		   <td align="center">
			 <select size="1" name="rOptions">
<?php 
			if($rOptions == "any"){
				echo "<option value='all'>All words</option>\n";
				echo "<option selected value='any'>Any word</option>";
			}
			else{
				echo "<option selected value='all'>All words</option>\n";
				echo "<option value='any'>Any word</option>";
			}
?>
			 </select>
		   </td>
		   <td align="center"><font size="2"><b>&nbsp;&nbsp;Experience&nbsp;</b></font></td>
		   <td align="center">
			 <select size="1" name="rExperience">
<?php 
				for($i=0; $i<20; $i++) // getting data
				{
					$selected = "";
					if(intval($rExperience) == $i){
						$selected = "selected";
					}
					if($i == 0){
						echo "<option $selected value='$i'>Select years</option>\n";
					}
					else{
						echo "<option $selected value='$i'>$i</option>\n";
					}
				}
?>
			 </select>
		   </td>
		   <td align="center"><font size="2"><b>&nbsp;&nbsp;Location&nbsp;</b></font></td>
<?php 
		   echo "<td align='center'><input class='TextBox' type='text' name='rLocation' size='10' value='$rLocation'></td>\n";
?>
		   <td align="center"><font size="2"><b>&nbsp;&nbsp;Sort&nbsp;By&nbsp;</b></font></td>
		   <td align="center">
			 <select size="1" name="rSortBy">
<?php 
			if($rSortBy == "Date"){
				echo "<option value='Relevance'>Relevance</option>\n";
				echo "<option selected value='Date'>Date</option>";
			}
			else{
				echo "<option selected value='Relevance'>Relevance</option>\n";
				echo "<option value='Date'>Date</option>";
			}
?>
			 </select>
		   </td>
		   <td align="center">&nbsp;<input class="buttons1" type="submit" value="Search CVs" name="rB1">&nbsp;&nbsp;</td>
		   <input type="hidden" value="resumeSearch" name="subSelected">
		   <input type="hidden" value="customized" name="rSearchType">
		</form>
	 </tr>
	</table>
   </td>
 </tr>
</table>
