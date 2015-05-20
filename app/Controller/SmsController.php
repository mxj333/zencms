<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SmsController
 *
 * @author mxj
 */
App::uses('CakeEmail', 'Network/Email');
class SmsController  extends AppController {
    
     public $helpers = array('Html', 'Form', 'Session');
//    public $components = array('Session','globals'); //使用的组件
//    public $components = array('Email');
//    public $uses =array('Sms','User','ZTConfigtcip','ViewEvent','Event','Config'); //使用的模型
    

//     public $theme = "default";
     
    public function massSend(){
        @header('Content-type: text/html;charset=gb2312');
        $this->autoRender = false;
        $ZTConfigtcips = $this->ZTConfigtcip->find('first');
//        pr($ZTConfigtcips);
        

	$name = $ZTConfigtcips['ZTConfigtcip']['name'];
	$pwd  = $ZTConfigtcips['ZTConfigtcip']['password'];
//	$dst  = $_POST["dst"];
//	$msg  = $_POST["msg"];
	$time = date('Y-m-d H:i:s');

           $sms = $this->Sms->find('all',
                     array(
                               'conditions'=>array(
                                         'Sms.messageType'=>1,
                                         'Sms.ifSuccess'=>0
                               ),
                                'recursive' => -1
                     ));
           
           foreach ($sms as $k => $v):
//               pr($v);
               $dst = $v['Sms']['messageAdress'];
               $msg = $v['Sms']['messageBody'];
               $url ="http://203.81.21.34/send/gsend.asp?name=$name&pwd=$pwd&dst=$dst&msg=$msg";
//               $url = iconv('gb2312', 'utf-8', $url);
               $url =  iconv("UTF-8", "GB2312", "$url"); 
//               iconv("UTF-8", "GB2312", "$url"); 
//               $url=mb_convert_encoding($url, 'GB2312', 'UTF-8'); 
//               http://203.81.21.34/send/gsend.asp?dst=13693640316&name=bjzst&pwd=zst123&msg=test&x=40&y=14
//               http://203.81.21.34/send/gsend.asp?name=bjzst&pwd=bjzst&dst=13693640316&msg=%E8%92%99%E6%96%B0%E6%9D%B0,%E4%BD%A0%E5%A5%BD:%E4%BD%A0%E6%9C%892%E6%9D%A1%E8%AE%A1%E5%88%92%E9%9C%80%E8%A6%81%E5%A4%84%E7%90%86%EF%BC%8C%E8%AF%B7%E5%85%B3%E6%B3%A8!&time=201501201401
                   
                   
                   
               pr($url);
//               $fp = fopen($url,"r");
//               $ret= fgetss($fp,255);
               $ret = "num=1&success=13693640316&faile=&err=发送成功&errid=0";
                echo $ret."<br>";
                $str = explode("&",$ret);
                if($str[4] == 'errid=0'){
                    $updataRtl = array(
                           'Sms'=>array(
                                     'ifSuccess'=>1,
                                     'sendTime'=>$time,
                                     'id'=>$v['Sms']['id']
                           )
                    );
                    pr($updataRtl);
                    $this->Sms->save($updataRtl); 
//                    $this->Sms->id = $v['Sms']['id'];
//                    $this->Sms->saveField('title','New Title');


                }
//                fclose($fp);
                
           endforeach;
           
           
//	//备用IP地址为203.81.21.13
//	$fp = fopen("http://203.81.21.34/send/gsend.asp?name=$name&pwd=$pwd&dst=$dst&msg=$msg&time=$time","r");
//	$ret= fgetss($fp,255);
//	echo $ret."<br>";
//	fclose($fp);
           
           
           
           
           
    }
    
    
    
    
    public function sender(){
//        $this->autoRender = false;
        
//            $Email = new CakeEmail('gmail');
//            $Email = new CakeEmail();
            $Email = new CakeEmail();
//            $Email->helpers(array('Html', 'Text'));
            
            $Email->config('smtp');
            
//$Email->template('default')
//    ->emailFormat('both');
                $Email  ->to('xj.meng@oids.cn')
                            ->subject('测试邮件1212')
                            ->from ('263974@163.com');
                if($Email->send("测试邮件内容888888222222222 http://dev.zencms.cn")){
                    
                }

//             pr($Email);
            
    }
    
}
