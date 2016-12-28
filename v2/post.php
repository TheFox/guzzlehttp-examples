<?php

require_once __DIR__.'/vendor/autoload.php';

use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Exception\ClientErrorResponseException as GuzzleRequestException;

$client = new GuzzleClient();

print 'send request ... ';
$request = $client->post('https://httpbin.org/post', null, array('x' => 'y'));
try{
	$response = $client->send($request);
}
catch(GuzzleRequestException $e){
	$response = $e->getResponse();
}
print 'done'."\n";

print 'response: '.get_class($response)."\n";
print '  status: '.$response->getStatusCode()."\n";
print '  header: '.$response->getHeader('content-type')."\n";
print '  body:'."\n".$response->getBody()."\n";
