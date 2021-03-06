<?php

/**
 * 体验购物数据转换器
 */
class Convertor_Shopping extends Convertor_Base {

    /**
     * 体验购物标签列表
     */
    public function shoppingTagListConvertor($list) {
        $data = array(
            'code' => intval($list['code']),
            'msg' => $list['msg']
        );
        if (isset($list['code']) && !$list['code']) {
            $result = $list['data'];
            $tmp = array();
            foreach ($result['list'] as $key => $value) {
                $dataTemp = array();
                $children = array();
                $dataTemp['id'] = $value['id'];
                $dataTemp['titleLang1'] = $value['title_lang1'];
                $dataTemp['titleLang2'] = $value['title_lang2'];
                $dataTemp['titleLang3'] = $value['title_lang3'];
                $dataTemp['parentid'] = $value['parentid'];
                $dataTemp['pic'] = $value['pic'];
                $dataTemp['staffList'] = implode(Enum_System::COMMA_SEPARATOR, $value['staff_list']);
                $dataTemp['status'] = $value['status'];
                if ($value['status'] == 0) {
                    $dataTemp['statusShow'] = Enum_Lang::getPageText('shopping', 'enable');
                } else {
                    $dataTemp['statusShow'] = Enum_Lang::getPageText('shopping', 'disable');
                }
                $dataTemp['is_robot'] = $value['is_robot'];
                if ($value['is_robot'] == 0) {
                    $dataTemp['robotShow'] = Enum_Lang::getPageText('shopping', 'enable');
                } else {
                    $dataTemp['robotShow'] = Enum_Lang::getPageText('shopping', 'disable');
                }
                if (is_array($value['children'])) {
                    foreach ($value['children'] as $child) {
                        $childTemp = array();
                        $childTemp['id'] = $child['id'];
                        $childTemp['titleLang1'] = $child['titleLang1'];
                        $childTemp['titleLang2'] = $child['titleLang2'];
                        $childTemp['titleLang3'] = $child['titleLang3'];
                        $childTemp['status'] = $child['status'];
                        $children[] = $childTemp;
                    }
                }
                $dataTemp['children'] = $children;
                $tmp[] = $dataTemp;
            }
            $data['data']['list'] = $tmp;
            $data['data']['pageData']['page'] = intval($result['page']);
            $data['data']['pageData']['rowNum'] = intval($result['total']);
            $data['data']['pageData']['pageNum'] = ceil($result['total'] / $result['limit']);
        }
        return $data;
    }

    /**
     * 体验购物列表
     */
    public function shoppingListConvertor($list) {
        $data = array(
            'code' => intval($list['code']),
            'msg' => $list['msg']
        );
        if (isset($list['code']) && !$list['code']) {
            $result = $list['data'];
            $tmp = array();
            foreach ($result['list'] as $key => $value) {
                $dataTemp = array();
                $dataTemp['id'] = $value['id'];
                $dataTemp['titleLang1'] = $value['title_lang1'];
                $dataTemp['titleLang2'] = $value['title_lang2'];
                $dataTemp['titleLang3'] = $value['title_lang3'];
                $dataTemp['introductLang1'] = $value['introduct_lang1'];
                $dataTemp['introductLang2'] = $value['introduct_lang2'];
                $dataTemp['introductLang3'] = $value['introduct_lang3'];
                $dataTemp['detailLang1'] = $value['detail_lang1'];
                $dataTemp['detailLang2'] = $value['detail_lang2'];
                $dataTemp['detailLang3'] = $value['detail_lang3'];
                $dataTemp['pic'] = Enum_Img::getPathByKeyAndType($value['pic']);
                $dataTemp['tagid'] = $value['tagid'];
                $dataTemp['tagShow'] = $value['tagName'];
                $dataTemp['createtime'] = $value['createtime'] ? date('Y-m-d H:i:s', $value['createtime']) : '';
                $dataTemp['sort'] = $value['sort'];
                $dataTemp['pdf'] = $value['pdf'] ? Enum_Img::getPathByKeyAndType($value['pdf']) : '';
                $dataTemp['videoShow'] = $value['video'] ? Enum_Img::getPathByKeyAndType($value['video']) : '';
                $dataTemp['video'] = $value['video'];
                $dataTemp['price'] = floatval($value['price']);
                $dataTemp['status'] = $value['status'];
                $dataTemp['statusShow'] = $value['status'] ? Enum_Lang::getPageText('news', 'enable') : Enum_Lang::getPageText('news', 'disable');
                $tmp[] = $dataTemp;
            }
            $data['data']['list'] = $tmp;
            $data['data']['pageData']['page'] = intval($result['page']);
            $data['data']['pageData']['rowNum'] = intval($result['total']);
            $data['data']['pageData']['pageNum'] = ceil($result['total'] / $result['limit']);
        }
        return $data;
    }

    /**
     * 体验购物订单列表
     */
    public function orderListConvertor($list) {
        $data = array(
            'code' => intval($list['code']),
            'msg' => $list['msg']
        );
        if (isset($list['code']) && !$list['code']) {
            $result = $list['data'];
            $tmp = array();
            foreach ($result['list'] as $key => $value) {
                $dataTemp = array();
                $dataTemp['id'] = $value['id'];
                $dataTemp['ordersProductsId'] = $value['orders_products_id'];
                $dataTemp['userid'] = $value['userid'];
                $dataTemp['userRoom'] = $value['userInfo']['room'];
                $dataTemp['count'] = $value['count'];
                $dataTemp['createtime'] = $value['createtime'] ? date('Y-m-d H:i:s', $value['createtime']) : '';
                $dataTemp['status'] = $value['statusName'];
                $dataTemp['statusid'] = $value['status'];
                $dataTemp['shopping'] = $value['shoppingName'];
                $dataTemp['admin'] = $value['adminName'];
                $dataTemp['adminid'] = $value['adminid'];
                $dataTemp['memo'] = $value['memo'];
                $dataTemp['robotstatus'] = $value['robotStatus'];
                $dataTemp['robotstatusname'] = $value['robotStatusName'];
                $dataTemp['productstatus'] = $value['productStatus'];
                $dataTemp['productstatusname'] = $value['productStatusName'];
                $tmp[] = $dataTemp;
            }
            $data['data']['list'] = $tmp;
            $data['data']['pageData']['page'] = intval($result['page']);
            $data['data']['pageData']['rowNum'] = intval($result['total']);
            $data['data']['pageData']['pageNum'] = ceil($result['total'] / $result['limit']);
        }
        return $data;
    }
}

?>