<?php
header('Content-type: text/cache-manifest');

$x = array_merge(
	explode("\n",`ls -al *.html`),
	explode("\n",`ls -al images/*`),
	explode("\n",`ls -al js/*`),
	explode("\n",`ls -al css/*`)
);
echo "CACHE MANIFEST\n";
for ($i=0; $i<sizeof($x); $i++) {
	if ($x[$i] != "") {
		$words = explode(" ",$x[$i]);
		echo "#".$x[$i]."\n";
		echo $words[count($words)-1]."\n";
	}
}
echo "NETWORK:\n*\n"
?>