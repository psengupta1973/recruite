<?php 
$keyword = null;
if(array_key_exists("keyword", $_GET)){
	$keyword = trim($_GET['keyword']);
}
$funcArea = null;
if(array_key_exists("funcArea", $_GET)){
	$funcArea = trim($_GET['funcArea']);
}
$experience = null;
if(array_key_exists("experience", $_GET)){
	$experience = $_GET['experience'];
}
$sortBy = null;
if(array_key_exists("sortBy", $_GET)){
	$sortBy = $_GET['sortBy'];
}
$options = null;
if(array_key_exists("options", $_GET)){
	$options = $_GET['options'];
}
$location = null;
if(array_key_exists("location", $_GET)){
	$location = trim($_GET['location']);
}
$industry = null;
if(array_key_exists("industry", $_GET)){
	$industry = $_GET['industry'];
}
$designation = null;
if(array_key_exists("designation", $_GET)){
	$designation = $_GET['designation'];
}
$searchType = null;
if(array_key_exists("searchType", $_GET)){
	$searchType = $_GET['searchType'];
}
?>
<table border="0" width="100%" cellpadding="0" cellspacing="1" bgcolor="#6699CC">
 <tr>
   <td align="center">
	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#DDEEFF">
	 <tr>
		<form method="GET" action="index.php" name="jobSearchForm">
		   <td align="center"><font size="2"><b>&nbsp;Keywords&nbsp;</b></font></td>
<?php 
		   echo "<td align='center'><input class='TextBox' type='text' name='keyword' size='10' value='$keyword'></td>\n";
?>
		   <td align="center"><font size="2"><b>&nbsp;&nbsp;Options&nbsp;</b></font></td>
		   <td align="center">
			 <select size="1" name="options">
<?php 
			if($options == "any"){
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
			 <select size="1" name="experience">
<?php 
				for($i=0; $i<21; $i++) // getting data
				{
					$selected = "";
					if(intval($experience) == $i){
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
		   echo "<td align='center'><input class='TextBox' type='text' name='location' size='10' value='$location'></td>\n";
?>
		   <td align="center"><font size="2"><b>&nbsp;&nbsp;Sort&nbsp;By&nbsp;</b></font></td>
		   <td align="center">
			 <select size="1" name="sortBy">
<?php 
			if($sortBy == "Date"){
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
		   <td align="center">&nbsp;&nbsp;<input class="buttons1" type="submit" value="Search jobs" name="B1">&nbsp;</td>
		   <input type="hidden" value="jobSearch" name="subSelected">
		   <input type="hidden" value="customized" name="searchType">
		</form>
	 </tr>
	</table>
   </td>
 </tr>
</table>
