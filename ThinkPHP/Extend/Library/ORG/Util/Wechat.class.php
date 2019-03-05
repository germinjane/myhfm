<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-05-17
 * Time: 18:10
 */

class Wechat{
    private $wid;
    private $token;
    public function __construct($wid,$token){
        $this->wid = $wid;
        $this->token = $token;

    }

    public function valid(){

        if(isset($_GET['echostr'])){
            if($this->checkSignature()){
                die($_GET['echostr']);
            }
        }else{
            $this->responseMsg();
        }
    }

    //验证签名
    private function checkSignature(){
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $tmpArr = array($this->token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        return $tmpStr == $signature;
    }

    //响应
    private function responseMsg(){
        $postStr = $GLOBALS['HTTP_RAW_POST_DATA'];
        if ($postStr){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $keyword = trim($postObj->Content);
            $msgType = trim($postObj->MsgType);
            $url = 'http://weixingo-online.haipin.com/home/publicapi/add_openid?openid='.$postObj->FromUserName.'&add_time='.time().'&wid='.$this->wid;
            $info   = $this->get_res($url);

            if($msgType=='text'){
                $url1 = 'http://weixingo-online.haipin.com/home/publicapi/send?openid='.$postObj->FromUserName.'&add_time='.time().'&wid='.$this->wid;
                $this->get_res($url1);
                $resultStr = $this->receiveText($postObj,$keyword);
            }else if($msgType=='event'){
                $resultStr = $this->receiveEvent($postObj,$info);
            }

            echo $resultStr;

        }else{
            echo '';
        }

    }

    //关键字回复
    private function receiveText($object,$keyword){
        if($keyword){

            //获取关键字信息
            $url = 'http://weixingo-online.haipin.com/publicapi/get_keyword/kw/'.$keyword.'/openid/'.$object->FromUserName.'/wid/'.$this->wid;
            $res = $this->get_res($url);
            $res = json_decode($res,true);

            if($res['type']=='text'){
                $contentStr=$res['data'];
            }else{
                foreach($res['data'] as $k=>$v){
                    $contentStr[] = array(
                        'title'=>$v['title'],
                        'picurl'=>'http://adweixin-img.zimilan.com/'.trim($v['picurl'],'./Uploads/'),
                        'url'=>$v['url'],
                        'description'=>$v['description'],
                    );
                }
            }


            if($contentStr){//触发关键字
                if (is_array($contentStr)){
                    $resultStr = $this->transmitNews($object, $contentStr);
                }else{
                    $resultStr = $this->transmitText($object, $contentStr);
                }
            }else{//触发多客服模式
                $resultStr = $this->transmitService($object);
            }
        }else{//触发多客服模式
            $resultStr = $this->transmitService($object);
        }

        return $resultStr;
    }

    //事件触发
    private function receiveEvent($object,$userinfo){

        $event = strtolower($object->Event);
        switch ($event){
            case 'subscribe': //关注
                $url = "http://weixingo-online.haipin.com/home/publicapi/c_config/name/weixin_subscribe/type/1/wid/".$this->wid;
                $content    = $this->get_res($url);
                $list = json_decode($content);
                $user   = json_decode($userinfo,true);
                $url = 'http://weixingo-online.haipin.com/home/publicapi/add_openid?openid='.$object->FromUserName.'&add_time='.time().'wid='.$this->wid;
                $info   = $this->get_res($url);
                if($list->nickname == 1){
                    $contentStr = $user['nickname'].'  '. $list->value;
                }else{
                    $contentStr = $list->value;
                }

                $tousername =  $object->ToUserName;//微信公共帐户微信号
                $scene_id = $object->EventKey;//场景值ID
                $scene  = explode('_',$scene_id);
                $scene_id=$scene[1];
                $openid = $object->FromUserName;//OpenID
                $time = $object->CreateTime;//扫描时间
                $ticket = $object->Ticket;//二维码Ticket

                if($scene_id > 0){//存在场景值ID则入库
                    $url = 'http://weixingo-online.haipin.com/home/publicapi/add_code_openid?tousername='.$tousername.'&scene_id='.$scene_id.'&openid='.$openid.'&time='.$time."&ticket=".$ticket.'& wid='.$this->wid;
                    $this->get_res($url);
                }
                break;
            case 'unsubscribe': //取消关注
                $openid = $object->FromUserName;//OpenID
                $url = 'http://weixingo-online.haipin.com/home/publicapi/unsubscribe/openid/'.$openid;
                $res = $this->get_res($url);
                break;
            case 'scan': //扫描
                $tousername =  $object->ToUserName;//微信公共帐户微信号
                $scene_id = $object->EventKey;//场景值ID
                $openid = $object->FromUserName;//OpenID
                $time = $object->CreateTime;//扫描时间
                $ticket = $object->Ticket;//二维码Ticket
                if($scene_id > 0){//存在场景值ID则入库
                    $url = 'http://weixingo-online.haipin.com/home/publicapi/add_code_openid?tousername='.$tousername.'&scene_id='.$scene_id.'&openid='.$openid.'&time='.$time."&ticket=".$ticket.'&wid='.$this->wid;
                    $this->get_res($url);
                }
                break;
            case 'click': //点击
                $click_num = $object->EventKey;
                $url = "http://weixingo-online.haipin.com/home/publicapi/keylist/eventkey/".$click_num.'wid='.$wid;
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                $list = curl_exec($ch);
                curl_close($ch);
                $list = json_decode($list);
                if($list->key == $click_num){
                    $contentStr[] = array(
                        "title" =>$list->keytitle,
                        "description" =>$list->keycontent,
                    );
                }

                break;
        }


        if($contentStr){
            if (is_array($contentStr)){
                $resultStr = $this->transmitNews($object, $contentStr);
            }else{
                $resultStr = $this->transmitText($object, $contentStr);
            }
        }

        return $resultStr;
    }

    //文本显示
    private function transmitText($object, $content, $funcFlag = 0){

        $textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					<FuncFlag>%d</FuncFlag>
					</xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $funcFlag);
        return $resultStr;
    }


    //图文显示
    private function transmitNews($object, $arr_item, $funcFlag = 0){

        if(!is_array($arr_item)) return;

        $itemTpl = "<item>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
					</item>";
        $item_str = '';
        foreach ($arr_item as $v){
            $item_str .= sprintf($itemTpl, $v['title'], $v['description'], $v['picurl'], $v['url']);
        }

        $newsTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[news]]></MsgType>
					<Content><![CDATA[]]></Content>
					<ArticleCount>%s</ArticleCount>
					<Articles>
					$item_str</Articles>
					<FuncFlag>%s</FuncFlag>
					</xml>";


        $resultStr = sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), count($arr_item), $funcFlag);

        return $resultStr;
    }

    //回复多客服消息
    private function transmitService($object){
        $xmlTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[transfer_customer_service]]></MsgType>
				  </xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }

    //curl get取数据
    private function get_res($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}