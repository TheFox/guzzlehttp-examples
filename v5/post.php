<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException as GuzzleRequestException;

$client = new GuzzleClient();

print 'send request ... ';
try{
	$response = $client->post('https://httpbin.org/post', array(
		'body' => 'raw data',
	));
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
