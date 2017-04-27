<?php

class Rpc_UrlConfigHotel {

    private static $config = array(
        'GH001' => array(
            'name' => '获取列表',
            'method' => 'getHotelListList',
            'auth' => true,
            'url' => '/hotelList/getHotelListList',
            'param' => array(
                'id' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'name' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'groupid' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'status' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'page' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'limit' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                )
            )
        ),
        'GH002' => array(
            'name' => '更新酒店',
            'method' => 'updateHotelListById',
            'auth' => true,
            'url' => '/HotelList/updateHotelListById',
            'param' => array(
                'id' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'propertyinterfid' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'lng' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'lat' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'cityid' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'tel' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'name_lang1' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'name_lang2' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'name_lang3' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'website' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'logo' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'index_background' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'voice_lang1' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'voice_lang2' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'voice_lang3' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'address_lang1' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'address_lang2' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'address_lang3' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'introduction_lang1' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'introduction_lang2' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'introduction_lang3' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'status' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'lang_list' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'bookurl' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
            )
        ),
    );

    /**
     * 根据接口编号获取接口配置
     *
     * @param string $interfaceId
     * @param string $configKey
     * @return multitype:multitype:string multitype:multitype:boolean string
     *         |boolean
     */
    public static function getConfig($interfaceId, $configKey = '') {
        if (isset(self::$config[$interfaceId])) {
            if (strlen($configKey) && isset(self::$config[$interfaceId][$configKey])) {
                return self::$config[$interfaceId][$configKey];
            } else {
                return self::$config[$interfaceId];
            }
        } else {
            return false;
        }
    }
}
