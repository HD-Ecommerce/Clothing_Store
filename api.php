<?php
    $ch = curl_init();
    $url = "https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee";
    $data_array = array(
        'from_district_id' => 1454,
        'service_id' => 53320,
        'service_type_id' => null,
        'to_district_id' => 1452,
        'to_ward_code' => '21012',
        'height' => 50,
        'length' => 30,
        'weight' => 200,
        'width' => 20,
        'insurance_value' => 10000,
        'coupon' => null
    );
    $data = json_encode($data_array);

    $header = array(
        'Content-Type: application/json',
        'Token: a102819a-b9ab-11ec-935b-4e3cff801388',
        'ShopId: 2647971',
        'Content-Type: text/plain'
    );
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $header
    );
    curl_setopt_array($ch, $options);

    $resp = curl_exec($ch);
    if($e = curl_error($ch)){
        echo $e;
    }
    else{
        $decoded = json_decode($resp);
        print_r($decoded);
    }
    curl_close($ch);

// $url = "https://reqbin.com/echo/post/json";

// $curl = curl_init($url);
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_POST, true);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// $headers = array(
//    "Content-Type: application/json",
// );
// curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// $data = '{"productId": 123456, "quantity": 100}';

// curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// //for debug only!
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// $resp = curl_exec($curl);
// curl_close($curl);
// var_dump($resp);

?>