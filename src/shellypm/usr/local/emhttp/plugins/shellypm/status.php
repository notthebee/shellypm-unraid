<?php
$shellypm_cfg = parse_ini_file( "/boot/config/plugins/shellypm/shellypm.cfg" );
$shellypm_device_ip	= isset($shellypm_cfg['DEVICE_IP']) ? $shellypm_cfg['DEVICE_IP'] : "";


if ($shellypm_device_ip == "") {
	die("Shelly Device IP missing!");
}

$Url = "http://" . $shellypm_device_ip . "/meter/0";

$datajson = file_get_contents($Url);
$data = json_decode($datajson, true); 

$json = array(
		'Power' => $data['power'],
	);

echo json_encode($json);
?>
