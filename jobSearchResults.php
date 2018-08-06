<?php

$jobDAO = new JobDAO(); 
$jobs = null;

if($searchType == "customized"){
	$jobs = $jobDAO->searchJobs($keyword, $options, $experience, $location, $funcArea, $sortBy);
}
else{
	if(!empty($location)){
		$jobs = $jobDAO->getJobsByLocation($location);
	}
	else{
		if(!empty($industry)){
			$jobs = $jobDAO->getJobsByIndustry($industry);
		}
		else{
			if(!empty($designation)){
				$jobs = $jobDAO->getJobsByDesignation($designation);
			}
			else{
				$jobs = $jobDAO->getAllJobs();
			}
		}
	}
}
 
$count = count($jobs);

if($count == 0){
	echo "<table  border='0' cellpadding='0' bgcolor='#6699CC' cellspacing='1' width='100%'>";
	echo "<tr>\n";
	echo "<td>\n";
	echo "<table cellspacing='0' border='0' cellpadding='2' width='100%'>\n";
	echo "<tr align='center' bgcolor='#6699CC'>\n";
	echo "<td class='bluebandheading1'><b>Warning</b></td>\n";
	echo "</tr>\n";
	echo "<tr bgcolor='#FFFFFF' valign='top'>\n";
	echo "<td class='text'>Sorry! no jobs found for the selected conditions. Try different search conditions.</td>\n";
	echo "</tr>";
}
else{
	echo "<table  border='0' cellpadding='0' bgcolor='#6699CC' cellspacing='1' width='100%'>";
	echo "<tr>\n";
	echo "<td>\n";
	echo "<table cellspacing='0' border='0' cellpadding='3' width='100%'>\n";
	echo "<tr align='center' bgcolor='#6699CC'>\n";
	echo "<td class='bluebandheading1' width='5%'><b>No.</b></td>\n";
	echo "<td class='bluebandheading1' width='5%'><b>Apply</b></td>\n";
	echo "<td class='bluebandheading1' width='50%'><b>Job&nbsp;Summary</b></td>\n";
	echo "<td class='bluebandheading1' width='20%'><b>Employer</b></td>\n";
	echo "<td class='bluebandheading1' width='10%'><b>Location</b></td>\n";
	echo "<td class='bluebandheading1' width='10%'><b>Posted&nbsp;on</b></td>\n";
	echo "</tr>\n";
	for($i=0; $i<$count; $i++)
	{
		if ( $i%2 == 0 ) 
		  echo "<tr bgcolor='#DDEEFF' valign='top'>\n";
		else 
		  echo "<tr bgcolor='#FFFFFF' valign='top'>\n";
		echo "<td class='text'>".($i+1)."</td>\n";
		echo "<td class='text'><b><a alt='Apply' href='index.php?update=".$jobs[$i]->getId()."'>>></a></b></td>\n";
		echo "<td class='text'>Ref. Id: ".$jobs[$i]->getRefId();
		echo "<br>".$jobs[$i]->getDesc();
		echo "<br><b>Designation:</b> ".$jobs[$i]->getDesignation();
		echo "<br><b>Experience:</b> ".$jobs[$i]->getMinExp()." to ".$jobs[$i]->getMaxExp()." yrs.\n";
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
