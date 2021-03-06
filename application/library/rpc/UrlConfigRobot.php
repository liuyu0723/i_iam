<?php

class Rpc_UrlConfigRobot
{

    private static $config = array(

        'RT001' => array(
            'name' => '新建地点',
            'method' => 'addPosition',
            'auth' => true,
            'url' => '/Service/addPosition',
            'param' => array(
                'hotelid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'userid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'type' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'position' => array(
                    'required' => true,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'robot_position' => array(
                    'required' => true,
                    'format' => 'string',
                    'style' => 'interface'
                ),
            )
        ),
        'RT002' => array(
            'name' => '更新地点',
            'method' => 'updatePositionById',
            'auth' => true,
            'url' => '/Service/updatePositionById',
            'param' => array(
                'id' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'userid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'type' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'position' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
                'robot_position' => array(
                    'required' => false,
                    'format' => 'string',
                    'style' => 'interface'
                ),
            )
        ),
        'RT003' => array(
            'name' => '获取点位列表',
            'method' => 'getPositionList',
            'auth' => true,
            'url' => '/Service/getPositionList',
            'param' => array(
                'hotelid' => array(
                    'required' => true,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'id' => array(
                    'required' => false,
                    'format' => 'int',
                    'style' => 'interface'
                ),
                'type' => array(
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
                ),

            )
        ),
    );


    /**
     * Get interface config by $interfaceId
     *
     * @param $interfaceId
     * @param string $configKey
     * @return bool|mixed
     */
    public static function getConfig($interfaceId, $configKey = '')
    {
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
