<?php
class ChatroomTableHandle
{
    static function info($room_id)
    {
        global $_W;
        static $infos = array();
        if (!isset($infos[$room_id])) {
            $info = pdo_fetch("select * from " . tablename('intelligent_kindergarten_chatroom') . " where uniacid={$_W['uniacid']} and id={$room_id}");
            $infos[$room_id] = $info;
        }
        return $infos[$room_id];
    }
    static function isCreator($openid, $room_id)
    {
        $roominfo = self::info($room_id);
        if ($roominfo && $roominfo['creator'] == $openid) {
            return true;
        }
        return false;
    }
    static function getList($is_approve = 'allow')
    {
        global $_W;
        return pdo_fetchall('select * from ' . tablename('intelligent_kindergarten_chatroom') . " where room_status='normal' and uniacid={$_W['uniacid']} and is_approve='{$is_approve}'");
    }
    static function getListByStatus($status = 'normal')
    {
        global $_W;
        return pdo_fetchall('select * from ' . tablename('intelligent_kindergarten_chatroom') . " where room_status='{$status}' and uniacid={$_W['uniacid']}");
    }
    static function getFrontList($schoolid)
    {
	
        global $_W;
        return pdo_fetchall("select * from " . tablename('intelligent_kindergarten_chatroom') . " where room_status='normal' and room_schoolid={$schoolid} and uniacid={$_W['uniacid']} and is_approve='allow' and is_public='y'");
    }
    static function createChatRoom($name, $desc, $logo, $creator = 'system', $is_public = 'y', $is_secret = 'n', $room_secret = 'n')
    {
        global $_W;
        if (!$name || !$desc || !$logo || !$creator) {
            return array('res' => '101', 'msg' => '参数错误');
        }
        $info = pdo_fetch("select * from " . tablename('intelligent_kindergarten_chatroom') . " where room_name = :room_name and uniacid={$_W['uniacid']}", array(':room_name' => $name));
        if ($info) {
            return array('res' => '101', 'msg' => '该聊天室已存在');
        }
        $data = array();
        $data['uniacid'] = $_W['uniacid'];
        $data['creator'] = $creator;
        $data['room_name'] = $name;
        $data['room_desc'] = $desc;
        $data['room_logo'] = $logo;
        $data['is_public'] = $is_public;
        $data['is_secret'] = $is_secret;
        $data['room_secret'] = $room_secret;
        $data['is_approve'] = $creator == 'system' ? 'allow' : 'wait';
        $data['add_date'] = date("Y-m-d");
        $data['add_time'] = date("Y-m-d H:i:s");
        $res = pdo_insert('intelligent_kindergarten_chatroom', $data);
        if ($res) {
            return array('res' => '100', 'msg' => '添加成功');
        }
        return array('res' => '101', 'msg' => '添加失败');
    }
    static function setRobot($id, $is_robot)
    {
        global $_W;
        return pdo_update("intelligent_kindergarten_chatroom", array('is_robot' => $is_robot), array('id' => $id, 'uniacid' => $_W['uniacid']));
    }
}