<?php 
// register Services_Airbrake for php errors and raised exceptions
require_once 'Services/Airbrake.php';
Services_Airbrake::installHandlers("YOUR_AIRBRAKE_API_KEY");
?>

<?php 
// register Services_Airbrake for php errors and raised exceptions
// when used in your staging environment
require_once 'Services/Airbrake.php';
Services_Airbrake::installHandlers("YOUR_AIRBRAKE_API_KEY", 'staging');
?>

<?php 
// register Services_Airbrake for php errors and raised exceptions
// when used in production and using the Curl transport
require_once 'Services/Airbrake.php';
Services_Airbrake::installHandlers("YOUR_AIRBRAKE_API_KEY", 'production', 'curl');
?>
 
<?php
// standalone
require_once 'Services/Airbrake.php';
 
Services_Airbrake::$apiKey = "YOUR_AIRBRAKE_API_KEY";
 
$exception = new Custom_Exception('foobar');
Services_Airbrake::handleException($exception);
?>
 
<?php
// use Zend_Http_Client
require_once 'Services/Airbrake.php';
 
Services_Airbrake::$apiKey = "YOUR_AIRBRAKE_API_KEY";
Services_Airbrake::$client = "zend";
 
$exception = new Custom_Exception('foobar');
Services_Airbrake::handleException($exception);
?>

