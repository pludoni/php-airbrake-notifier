<?php
require_once('php-hoptoad-notifier/Services/Hoptoad.php');
require_once('pheanstalk/pheanstalk_init.php');

$hoptoad = new Services_Hoptoad(HOPTOAD_API_KEY);

$k = array_rand($BEANSTALK_SERVERS);
$pheanstalk = new Pheanstalk($BEANSTALK_SERVERS[$k]['host'], $BEANSTALK_SERVERS[$k]['port']);

$pheanstalk->watch('hoptoad')->ignore('default');
while($job = $pheanstalk->reserve())
{
	$data = json_decode($job->getData());

	echo date('Y-m-d H:i:s') . ' Processing Error: ' . $data->url . "\n";
	$hoptoad->curlRequest($data->url, $data->headers, $data->body);
	
	$pheanstalk->delete($job);
}
