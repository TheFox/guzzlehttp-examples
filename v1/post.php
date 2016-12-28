<?php

require_once __DIR__.'/vendor/autoload.php';

use Guzzle\Service\Client as GuzzleClient;
use Guzzle\Http\Message\BadResponseException as GuzzleRequestException;

$client = new GuzzleClient();

print 'send request ... ';
$request = $client->post('https://httpbin.org/post', null, array('x' => 'y'));
try{
	$response = $request->send();
}
catch(GuzzleRequestException $e){
	$response = $e->getResponse();
}
print 'done'."\n";

print 'response: '.get_class($response)."\n";
print '  status: '.$response->getStatusCode()."\n";
print '  header: '.$response->getHeader('Content-Type')."\n";
print '  body:'."\n".$response->getBody()."\n";
