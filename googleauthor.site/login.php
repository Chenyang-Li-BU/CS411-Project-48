<?php
session_start();
$end_point = 'https://accounts.google.com/o/oauth2/v2/auth';
$client_id = '1028429234083-qrqd0gigmrctl2jgi9iequms2l3olb1v.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'http://www.googleauthor.site/login.php';
$scope = 'https://www.googleapis.com/auth/drive.metadata.readonly';
$authUrl = $end_point.'?'.http_build_query([
    'client_id'              => $client_id,
    'redirect_uri'           => $redirect_uri,              
    'scope'                  => $scope,
    'access_type'            => 'offline',
    'include_granted_scopes' => 'true',
    'state'                  => 'state_parameter_passthrough_value',
    'response_type'          => 'code',
]);


    
    if ( isset($_GET['code'])){
        $code = $_GET['code'];         // Visit $authUrl and get the authentication code
    }else{
        return;
    } 

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://accounts.google.com/o/oauth2/token");
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type: application/x-www-form-urlencoded']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'code'          => $code,
        'client_id'     => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri'  => $redirect_uri,
        'grant_type'    => 'authorization_code',
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close ($ch);

    file_put_contents('token.json', $response);


$_SESSION['usg']=json_decode($response,true)['access_token'];
echo '   <script>  
    
        window.location="index.php"; 
     
    </script> ';