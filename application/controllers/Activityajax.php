<?php

/**
 * @author ZXM
 */
class ActivityajaxController extends \BaseController {

    /**
     * @var ActivityModel
     */
    private $activityModel;

    /**
     * @var Convertor_Activity
     */
    private $activityConvertor;

    public function init() {
        parent::init();
        $this->activityModel = new ActivityModel();
        $this->activityConvertor = new Convertor_Activity();
    }

    /**
     * 获取tag列表
     */
    public function getTagListAction() {
        $paramList['page'] = $this->getPost('page');
        $paramList['hotelid'] = $this->getHotelId();
        $result = $this->activityModel->getTagList($paramList);
        $result = $this->activityConvertor->activityTagListConvertor($result);
        $this->echoJson($result);
    }

    /**
     * 新建和编辑tag信息数据
     */
    private function handlerTagSaveParams() {
        $paramList = array();
        $paramList['title_lang1'] = trim($this->getPost("titleLang1"));
        $paramList['title_lang2'] = trim($this->getPost("titleLang2"));
        $paramList['title_lang3'] = trim($this->getPost("titleLang3"));
        $paramList['hotelid'] = intval($this->getHotelId());
        return $paramList;
    }

    /**
     * 新建tag信息
     */
    public function createTagAction() {
        $paramList = $this->handlerTagSaveParams();
        $result = $this->activityModel->saveTagDataInfo($paramList);
        $this->echoJson($result);
    }

    /**
     * 更新tag信息
     */
    public function updateTagAction() {
        $paramList = $this->handlerTagSaveParams();
        $paramList['id'] = intval($this->getPost("id"));
        $result = $this->activityModel->saveTagDataInfo($paramList);
        $this->echoJson($result);
    }

    public function getActivityListAction() {
        $paramList['page'] = $this->getPost('page');
        $paramList['hotelid'] = $this->getHotelId();
        $paramList['id'] = intval($this->getPost('id'));
        $paramList['tagid'] = intval($this->getPost('tag'));
        $paramList['title'] = $this->getPost('title');
        $status = $this->getPost('status');
        $status !== 'all' && !is_null($status) ? $paramList['status'] = intval($status) : false;
        $result = $this->activityModel->getActivityList($paramList);
        $result = $this->activityConvertor->activityListConvertor($result);
        $this->echoJson($result);
    }

    private function handlerActivitySaveParams() {
        $paramList = array();
        $paramList['title_lang1'] = trim($this->getPost("titleLang1"));
        $paramList['title_lang2'] = trim($this->getPost("titleLang2"));
        $paramList['title_lang3'] = trim($this->getPost("titleLang3"));
        $paramList['tagid'] = intval($this->getPost("tagid"));
        $paramList['status'] = intval($this->getPost("status"));
        $paramList['hotelid'] = intval($this->getHotelId());
        $paramList['groupid'] = intval($this->getGroupId());
        return $paramList;
    }

    public function createActivityAction() {
        $paramList = $this->handlerActivitySaveParams();
        $result = $this->activityModel->saveActvityDataInfo($paramList);
        $this->echoJson($result);
    }

    public function updateActivityAction() {
        $paramList = $this->handlerActivitySaveParams();
        $paramList['id'] = intval($this->getPost("id"));
        $result = $this->activityModel->saveActvityDataInfo($paramList);
        $this->echoJson($result);
    }
}
