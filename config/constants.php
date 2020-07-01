<?php

return [
        'DEFINE' => array(
            'DELETE'                    => 1,
        //    'CLIENT_IP_ADRS'            => client_adrs_ip(),
            'BACK_LIMIT_PAGE'           => 10, //pagination for backend
            'LIMIT_PAGE'                => 30, //pagination for frontend
            'LIMIT_WORDS'               => 20,
            'LIMIT_NEWS_TOP'            => 3,
            'IS_ADMIN'                  => 1,
            'IP_API_KEY'                => '9b5dda169d134546a351a98a25dfa8bd',

            /*Send mail to host*/
            //'HOST_EMAIL_ADRS_FROM'      => 'tuoi@xanhtuoitropicalfish.com',
            //'HOST_EMAIL_NAME_FROM'      => 'XANH TUOI - AQUARIUM',
            'HOST_EMAIL_ADRS_TO'        => 'tuoi@xanhtuoitropicalfish.com',
            'HOST_EMAIL_NAME_TO'        => 'XANH TUOI - AQUARIUM',
            'HOST_EMAIL_SUBJECT'        => 'XANH TUOI - AQUARIUM',

            /*Send mail to guest*/
            'GUEST_EMAIL_ADRS_FROM'     => 'phuongnd360@gmil.com',
            'GUEST_EMAIL_NAME_FROM'     => 'XANH TUOI - AQUARIUM',
            'GUEST_EMAIL_SUBJECT'       => 'XANH TUOI - AQUARIUM',
            
        )
];


    // function client_adrs_ip() {
    //     $ipaddress = '';
    //     if (getenv('HTTP_CLIENT_IP'))
    //         $ipaddress = getenv('HTTP_CLIENT_IP');
    //     else if(getenv('HTTP_X_FORWARDED_FOR'))
    //         $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    //     else if(getenv('HTTP_X_FORWARDED'))
    //         $ipaddress = getenv('HTTP_X_FORWARDED');
    //     else if(getenv('HTTP_FORWARDED_FOR'))
    //         $ipaddress = getenv('HTTP_FORWARDED_FOR');
    //     else if(getenv('HTTP_FORWARDED'))
    //        $ipaddress = getenv('HTTP_FORWARDED');
    //     else if(getenv('REMOTE_ADDR'))
    //         $ipaddress = getenv('REMOTE_ADDR');
    //     return $ipaddress;
    // }

