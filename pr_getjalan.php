<?php
	include "pr_connect.php";

	$sql = "select ST_MakeLine(geom) AS geometry, gid FROM jalan";
	$result = pg_query($sql);
	$hasil1 = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);

	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geometry']),
		'properties' => array(
		'gid' => $isinya['gid'],
		)
	);
	array_push($hasil1['features'], $features);
	}
	echo $data= json_encode($hasil1);

	?>
