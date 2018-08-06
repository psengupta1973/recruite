<?php

$jobDAO = new JobDAO(); 
$jobs = null;

if($rSearchType == "customized"){
	$jobs = $jobDAO->searchJobs($rKeyword, $rOptions, $rExperience, $rLocation, $rFuncArea, $rSortBy);
}
else{
	if(!empty($rLocation)){
		$jobs = $jobDAO->getJobsByLocation($rLocation);
	}
	else{
		if(!empty($rIndustry)){
			$jobs = $jobDAO->getJobsByIndustry($rIndustry);
		}
		else{
			if(!empty($rDesignation)){
				$jobs = $jobDAO->getJobsByDesignation($rDesignation);
			}
			else{
				$jobs = $jobDAO->getAllJobs();
			}
		}
	}
}
 
$count = count($jobs);

if($count == 0){
	echo "<table  border='0' cellpadding='0' bgcolor='#558273' cellspacing='1' width='100%'>";
	echo "<tr>\n";
	echo "<td>\n";
	echo "<table cellspacing='0' border='0' cellpadding='2' width='100%'>\n";
	echo "<tr align='center' bgcolor='#558273'>\n";
	echo "<td class='bluebandheading1'><b>Warning</b></td>\n";
	echo "</tr>\n";
	echo "<tr bgcolor='#FFFFFF' valign='top'>\n";
	echo "<td class='text'>Sorry! no candidates found for the selected conditions. Try different search conditions.</td>\n";
	echo "</tr>";
}
else{
	echo "<table  border='0' cellpadding='0' bgcolor='#558273' cellspacing='1'>";
	echo "<tr>\n";
	echo "<td>\n";
	echo "<table cellspacing='0' border='0' cellpadding='3' width='100%'>\n";
	echo "<tr align='center' bgcolor='#558273'>\n";
	echo "<td class='bluebandheading1' width='5%'><b>No.</b></td>\n";
	echo "<td class='bluebandheading1' width='5%'><b>Contact</b></td>\n";
	echo "<td class='bluebandheading1' width='50%'><b>Candidate&nbsp;Profile</b></td>\n";
	echo "<td class='bluebandheading1' width='20%'><b>Company</b></td>\n";
	echo "<td class='bluebandheading1' width='10%'><b>Location</b></td>\n";
	echo "<td class='bluebandheading1' width='10%'><b>Posted&nbsp;on</b></td>\n";
	echo "</tr>\n";
	for($i=0; $i<$count; $i++)
	{
		if ( $i%2 == 0 ) 
		  echo "<tr bgcolor='#DDEEE4' valign='top'>\n";
		else 
		  echo "<tr bgcolor='#FFFFFF' valign='top'>\n";
		echo "<td class='text'>".($i+1)."</td>\n";
		echo "<td class='text'><b><a alt='Contact' href='empHome.php?update=".$jobs[$i]->getId()."'>>></a></b></td>\n";
		echo "<td class='text'>Ref. Id: ".$jobs[$i]->getRefId();
		echo "<br>".$jobs[$i]->getDesc();
		echo "<br>Designation: ".$jobs[$i]->getDesignation();
		echo "<br>Experience: ".$jobs[$i]->getMinExp()." to ".$jobs[$i]->getMaxExp()." yrs.\n";
		echo "<td class='text'>".$jobs[$i]->getEmployer()->getName()."</td>\n";
		echo "<td class='text'>".$jobs[$i]->getLocation()."</td>\n";
		echo "<td class='text'>".$jobs[$i]->getPostDate()."</td>\n";
		echo "</tr>";
	}
}
?>
			</table>
		</td>
	</tr>
</table>
