<?php 

if(isset($_POST['pay'])){

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $amount = $_POST['amount'];
    $pay = $_POST['pay'];

   
    function genTxref() {
        $txref = "txref_";
        for ($i = 0; $i < 7; $i++) {
            $txref .= mt_rand(0, 6);
        }
        return $txref;
    }
    // Processing rav payment
    $curl = curl_init();
    
    

    $customer_email = $email;
    $amount = $amount;  
    $currency = "NGN";
    $txref = genTxref(); // ensure you generate unique references per transaction.
    $PBFPubKey = "FLWPUBK_TEST-cf3fce58b0fdc967daf1027e9e6988f0-X"; // get your public key from the dashboard.
    $redirect_url = "https://localhost/FCH/success.php";
    

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'amount'=>$amount,
        'customer_email'=>$customer_email,
        'currency'=>$currency,
        'txref'=>$txref,
        'PBFPubKey'=>$PBFPubKey,
        'redirect_url'=>$redirect_url,
    ]),
    CURLOPT_HTTPHEADER => [
        "content-type: application/json",
        "cache-control: no-cache"
    ],
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if($err){
    // there was an error contacting the rave API
    die('Curl returned error: ' . $err);
    }

    $transaction = json_decode($response);

    if(!$transaction->data && !$transaction->data->link){
    // there was an error from the API
    print_r('API returned error: ' . $transaction->message);
    }


    // redirect to page so User can pay
    // uncomment this line to allow the user redirect to the payment page
    header('Location: ' . $transaction->data->link);
}

?>

