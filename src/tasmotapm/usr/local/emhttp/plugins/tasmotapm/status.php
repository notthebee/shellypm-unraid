<?php
$tasmotapm_cfg = parse_ini_file( "/boot/config/plugins/tasmotapm/tasmotapm.cfg" );
$tasmotapm_device_ip	= isset($tasmotapm_cfg['DEVICE_IP']) ? $tasmotapm_cfg['DEVICE_IP'] : "";


if ($tasmotapm_device_ip == "") {
	die("Tasmota Device IP missing!");
}

$Url = "http://" . $tasmotapm_device_ip . "/meter/0";

$datajson = file_get_contents($Url);
$data = json_decode($datajson, true); 

$json = array(
		'Power' => $data['power'],
	);

echo json_encode($json);
?>
