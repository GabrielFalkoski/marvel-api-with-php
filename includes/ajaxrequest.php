<?php
require_once './MarvelApi/MarvelApi.php';

$method = !empty($_REQUEST['method']) ? $_REQUEST['method'] : false;
$params = !empty($_REQUEST['params']) ? $_REQUEST['params'] : array();

if ($method == 'getCharacter') {
	$characterId = isset($params['characterId']) ? $params['characterId'] : '';
	$params = $characterId;
}

$response = array('code' => 0, 'status' => 'error', 'message' => '');

$marvelApi = new MarvelApi();

if (!$method || !method_exists($marvelApi, $method)) {
	$response['message'] = "Call to undefined method {$method}() in MarvelApi.";
	echo json_encode($response);
	return;
}
try {
	$call = $marvelApi->$method($params);
	$data = json_decode($call, true);

	$response = array_merge($response, $data);
} catch (\Exception $e) {
	$response['message'] = $e->getMessage();
}

echo json_encode($response);
?>