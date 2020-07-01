<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "XANH TUOI TROPICAL FISH CO ., LTD | Xanh Tuoi Aquarium VN | XANHTUOI.COM | XANHTUOITROPICALFISH.COM", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, Dashboard'
            'description'  => 'xanh tuoi xanh tuoi aquarium, xanh tuoi tropicalfish, xanhtuoi.com, xanhtuoitropicalfish.com', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['XANHTUOI', 'XANHTUOITROPICALFISH', 'FISH', 'AQUARIUM', 'CÁ CẢNH'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => 'XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM',
            'bing'      => 'XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM',
            'alexa'     => 'XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM',
            'pinterest' => 'XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM',
            'yandex'    => 'XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM',
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'XANH TUOI TROPICAL FISH CO ., LTD | Xanh Tuoi Aquarium VN | XANHTUOI.COM | XANHTUOITROPICALFISH.COM', // set false to total remove
            'description' => 'xanh tuoi xanh tuoi aquarium, xanh tuoi tropicalfish, xanhtuoi.com, xanhtuoitropicalfish.com', // set false to total remove
            'url'         => 'https://xanhtuoitropicalfish.com', // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'www.xanhtuoitropicalfish.com',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            'site'        => '@xanhtuoi',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'XANH TUOI TROPICAL FISH CO ., LTD | Xanh Tuoi Aquarium VN | XANHTUOI.COM | XANHTUOITROPICALFISH.COM', // set false to total remove
            'description' => 'xanh tuoi xanh tuoi aquarium, xanh tuoi tropicalfish, xanhtuoi.com, xanhtuoitropicalfish.com', // set false to total remove
            'url'         => 'https://xanhtuoitropicalfish.com', // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
