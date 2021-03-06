<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;

$client = new GuzzleClient();

print 'send request ... ';
try{
    $response = $client->request('POST', 'https://httpbin.org/post', array(
    	// 'body' => 'raw data',
    	'form_params' => array('x' => 'y'),
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
print '  header: '.join(', ', $response->getHeader('content-type'))."\n";
print '  body:'."\n".$response->getBody()."\n";
