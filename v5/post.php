<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException as GuzzleRequestException;

$client = new GuzzleClient();

print 'send request ... ';
try{
	// Raw Body
	$response = $client->post('https://httpbin.org/post', array(
		'body' => 'raw data',
	));
	
	// JSON Body
	// $response = $client->post('https://httpbin.org/post', array(
	// 	'json' => array('hello' => 'world'),
	// ));
}
catch(GuzzleRequestException $e){
	if($e->hasResponse()){
		$response = $e->getResponse();
	}
}
print 'done'."\n";

print 'response: '.get_class($response)."\n";
print '  status: '.$response->getStatusCode()."\n";
print '  header: '.$response->getHeader('content-type')."\n";
print '  body:'."\n".(string)$response->getBody()."\n";
// print '  json body:'."\n".(string)$response->json()."\n";
