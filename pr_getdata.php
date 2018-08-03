<?php
	include "pr_connect.php";

	$sql = "select ST_asgeojson(geom) AS geometry, gid,status FROM test";
	$result = pg_query($sql);
	$hasil = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);

	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geometry']),
		'properties' => array(
		'gid' => $isinya['gid'],
		'status' => $isinya['status'],


		)
	);
	array_push($hasil['features'], $features);
	}
	$data= json_encode($hasil);

	?>
