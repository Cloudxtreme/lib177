<?php
$sizeC1 = count();
$sizeC2 = count();
if(sizeof($sizeC1) == sizeof($sizeC2))
{
	for($i = 0; $i <= sizeof($sizeC1); $i++){
		if($sizeC1[$i] == $sizeC2[$i])
			echo "Youpi";
		else
			echo "Pas youpi";
	}
}
?>