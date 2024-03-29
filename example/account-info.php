<?php
/* 
 * Get account information
 * https://tech.payson.se/
 * 
 */

// Print wrapper
print('<div id="wrapper" style="width:100%;max-width:600px;margin:0 auto;">');
    
try {
    // Include library
    require_once '../paysonpayments/include.php';
    
    // Include TestAccount credentials
    require_once 'test-credentials.php';

    // Init the connector
    $connector = \Payson\Payments\Transport\Connector::init($agentId, $apiKey, $apiUrl);

    // Create the client, getAccountInfo() will also work with \Payson\Payments\RecurringSubscriptionClient and \Payson\Payments\RecurringPaymentClient
    $checkoutClient = new \Payson\Payments\CheckoutClient($connector);

    // Make the call
    $accountInformation = $checkoutClient->getAccountInfo();
    
    // Print the result
    print('<pre>' . print_r($accountInformation, true) . '</pre>');

} catch(Exception $e) {
    // Print error message and error code
    print($e->getMessage() . $e->getCode());
}

// Close wrapper
print('</div>');
