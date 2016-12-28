<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException as GuzzleRequestException;

$client = new GuzzleClient();

print 'send request ... ';
try{
	// $response = $client->get('https://httpbin.org/get');
	$response = $client->get('https://httpbin.org/status/404');
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
print '  body:'."\n".$response->getBody()."\n";
