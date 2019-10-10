<?php 

return [ 
'client_id' => env('PAYPAL_CLIENT_ID','AduaRknJ7TaDu9h90gmzY9Yby0CACR0ad74fEkj97i5aNkM_Wha6w-yiOs05kjtKV9EUNqbWKjSJTknl'),
'secret' => env('PAYPAL_SECRET','ENl9UFfxB_557Z4HZidzaoUOQIiv0mp5I_qjwL2pyI8p2ws534kXWnwtLMwQ5b5ERVxCX092jA6YRgK_'),
'settings' => array(
'mode' => env('PAYPAL_MODE','sandbox'),
'http.ConnectionTimeOut' => 30,
'log.LogEnabled' => true,
'log.FileName' => storage_path() . '/logs/paypal.log',
'log.LogLevel' => 'ERROR'
),
];