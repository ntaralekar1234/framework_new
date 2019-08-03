<?php 
class Sendnotifications {    
    //private static $API_SERVER_KEY = 'AIzaSyCCuRn-TTHPhamd73H4m9YGghs3uzKj7GE';
    private static $API_SERVER_KEY = 'AIzaSyDu0mGbpG0fN2k19Jc-eeA_hBaP-EONYEg';
    private static $is_background = "TRUE";
    public function __construct() {     
     
    }
    public function sendPushNotificationToFCMSever($fields) {
       //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';
        $headers = array(
            'Authorization:key=' . self::$API_SERVER_KEY,
            'Content-Type:application/json'
        );  
         
        $curl = curl_init();

          curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>  json_encode($fields),
          CURLOPT_HTTPHEADER =>  $headers,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          return $err;
        } else {
          return $response;
        }
    }
 }


