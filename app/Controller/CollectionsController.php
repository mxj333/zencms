<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of CollectionsController
 *
 * @author mxj
 */
App::import('Vendor', 'LIB');
//App::uses('LIB', 'Vendor');
//App::uses('LIB', 'Vendor/LIB');
class CollectionsController extends AppController{
    
    public $theme = 'Admin';
    
    public $uses =array('Collection','Category','Site','TempBook','BookDetail','Author'); //使用的模型
    
    public function index() {
        
    }

    public function jdcate1() {
    @header('Content-type: text/html;charset=UTF8');
//    $this->autoRender = false;
//    echo '你好',"\n";

    require_once(APP . "Vendor/LIB/LIB_http.php");
    require_once(APP . "Vendor/LIB/LIB_parse.php");
    require_once(APP . "Vendor/LIB/LIB_resolve_addresses.php");
    
    # Define the target and referrer web pages
    $target = "http://m.jd.com/category/all.html?resourceType=index_category&resourceValue=";
    $ref    = "http://m.jd.com";

# Request the header
    $return_array = http_get_withheader($target, $ref);

# Display the header
//    echo "FILE CONTENTS \n";
//    var_dump($return_array['FILE']);

//    echo "ERRORS \n";
//    var_dump($return_array['ERROR']);

//    echo "STATUS \n";
//    var_dump($return_array['STATUS']);
//    $content_type = $return_array['STATUS']['content_type'];
//    echo "content_type \n";
//    echo $content_type;
    
//    $downloaded_page_array = file($target);
    // Echo contents of file
//    for($xx=0; $xx<count($downloaded_page_array); $xx++)
//      echo $downloaded_page_array[$xx];

    //下载一个网页
    $web_page = http_get($target, $ref);
    
//    $table_array = parse_array($web_page['FILE'], '<li class="new-category-li">', '</li>');
    $t = return_between($web_page['FILE'], '<ul class="new-category2-lst" id="category1713" style="display:none">', '</ul>', 'EXCL');
    $table_array = parse_array($t, '<li class="new-category2-li" >', '</li>');

    
    $arr = array();
    foreach ($table_array as $key => $value) {
      $href = return_between($value, '<li class="new-category2-li" >', '</li>','EXCL');
      $pattern = "/<a(s*[^>]+s*)href=([\"|']?)([^\"'>\s]+)([\"|']?)/ies";
        preg_match_all($pattern, $href, $matches);
 
        preg_match_all('/>([^<]+)<\/a>/', $href, $_match);  

        $arr[1]['name'][] = trim($_match[1][0]);
        $arr[1]['path'][] = resolve_address($matches[3][0],$ref);
        
         $arr[2]['name'][] = trim($_match[1][1]);
        $arr[2]['path'][] = resolve_address($matches[3][1],$ref);
        
         $arr[3]['name'][] = trim($_match[1][2]);
        $arr[3]['path'][] = resolve_address($matches[3][2],$ref);
    }

    
        if ($this->request->is('post')) {
              try {
                foreach ($arr as $key => $value) {
                    foreach ($value['name'] as $k => $val) {
                        $data['name'] =  $val;
                        $data['path'] = $value['path'][$k];
                        $data['parent_id'] = 0;
                        if(!empty($data)){
                            $this->Category->create();
                            $this->Category->save($data);
                            }
                    }
                }
            }catch (PDOException $e) {
                // logging here
                return false;
           }


        }
        
        
        $this->set(compact('arr'));
    }
    
    public function jdcate2() {
//        $this->autoRender = false;
        $this->Category->recursive = 0;
        $categories = $this->Category->find('list',array(
            'conditions' => array('parent_id'=>0),//,'http_code'=>null
            'order' =>'id asc'
        ));
//        pr(key($categories));
//        echo array_shift(array_values($categories));
        $jdcate = key($categories);
//        pr($this->request->query);
        $ref    = "http://m.jd.com";
//        pr($this->request->pass);
        $msg = '';
        if ($this->request->is('post') || $this->request->pass) {
            
//                if ($this->request->query) {
//                try{
                $jdcate = isset($this->request->data['Collection']['name']) ? $this->request->data['Collection']['name'] : $jdcate;
//                echo $jdcate;
//                $jdcate = $this->request->data['Collection']['name'];
                $id = intval($jdcate);
                if($rtl = $this->Category->find('first',array('conditions'=>array('id'=>$id),'recursive'=>-1))){
                    $data['parent_id'] = $rtl['Category']['id'];
                    $nextpid = $rtl['Category']['parent_id'];
                    $catetwo = $this->Collection->getJdCateTwo($rtl['Category']['path'],$ref);
                    $parent_data['id'] =   $id;  
                    $parent_data['http_code'] =   $catetwo['http_code'];  
                    $parent_data['download_time'] =   $catetwo['download_time'];  
                    if($catetwo['http_code'] == 200){
                        unset($catetwo['http_code']);
                        unset($catetwo['download_time']);
                        foreach ($catetwo as $key => $value) {
                            $data['name']= $value['name'];
                            $data['path']= $value['path'];
                            $is_name = $this->Category->find('first',array('conditions'=>array('name'=>$data['name']),'recursive'=>-1));
//                            pr($is_name);
//                                                        exit();
                            if(!$is_name){
                            
                                $this->Category->create();
    //                            $rtl = $this->Category->save($data);
                                if(!$this->Category->save($data)) {
                                     throw new NotFoundException();
                                }
                            }
                        }
                        if($rtl){
                            if($rtl = $this->Category->save($parent_data)){
                                pr($rtl);
                               $nwearr = $this->Category->find('first',array(
                                    'conditions'=>array('id >'=>$rtl['Category']['id'],'parent_id'=>$nextpid),
                                    'order' =>'id asc',
                                    'recursive'=>-1));
                              
                               if($nwearr){
                                    $url   = Router::fullbaseUrl() . '/collections/jdcate2/jd/' . $nwearr['Category']['id'];
//                                    header("refresh:$ss;url=$url");
//                                    $jdcate = $nwearr['Category']['id'];
                                    sleep(rand(2, 20));
                                    header("Location: $url");
                                    exit();
                               }else{
                                   $msg =  '采集完毕 999！';
                               }
                               
                            }
                        }else{
                            throw new NotFoundException();
                        }
                    }
                }  else {
                    $msg =  '采集完毕 000！';
                }
//            }
           
        }
//       echo $jdcate;
        
        $this->set(compact('categories','jdcate','msg'));
        
    }
    
    public function books() {
        $this->Category->recursive = 0;
        $categories = $this->Category->find('all');
        $options = array(); 
        foreach ($categories as $key => $value) {
                $labels = $value['ParentCategory']['name'];
                if($value['ParentCategory']['id'] == $value['Category']['parent_id']):
                     $options[$labels][$value['Category']['id']] = $value['Category']['name'];
                endif;
        }

//        pr($options);
        if ($this->request->is('post')) {
            echo @header('Content-type: text/html;charset=UTF8');
            $id = isset($this->request->data['Collection']['path']) ? $this->request->data['Collection']['path'] : '';
            
            
            $categories_first = $this->Category->find('first',array('conditions'=>array('id'=>$id),'recursive'=>-1));
//            if(!$categories_first) echo 'ok88';exit();
            $page = ($categories_first['Category']['pages'] > 0 ) ? $categories_first['Category']['pages'] : 1;
//pr($categories_first['Category']['pages']);exit;
            $path = $categories_first['Category']['path'];
//            echo $path.'<br>';
//            echo '<hr>';
//                        exit();
//            $page = 1;
            if(!empty($path)){
                $books = $this->TempBook->getJdBooks($path,null, $page);
                
                $categories_data['http_code'] = $books['http_code'];
                $categories_data['download_time'] = $books['download_time'];
                $books['pages'] = $page;
              
//                pr($books);
               
//                pr($this->request->data);
//                exit;
                if(isset($this->request->data['insert'])){
                            $books['category_id'] = $id;
                            
                            $rtlbooks = $this->TempBook->getJdSaveBooks($books,$page);

                            $i = 1;
                            while ($rtlbooks):
                                $i++;
                                echo $i."\n";
//                                sleep(rand(20, 50));
                                sleep(10);
                                $books2 = $this->TempBook->getJdBooks($path,null, $i);
                                $books2['category_id'] = $id;
                                if($books2) {
                                    $rtlbooks = $this->TempBook->getJdSaveBooks($books2);
                                    
//                                    pr($books2);
//                                     $id = $data['category_id']; //读取数据
//            $category = $this->Category->read($id = $data['category_id']); //读取数据
                                    $options = array('conditions' => array('Category.id'  => $id),'recursive'=>-1);
                                    $category = $this->Category->find('first', $options);
//                                    pr($category);exit;
                        //            $this->Post->saveField('Post.click', $post['Post']['click']+1); //更新数据
                                    $update = array(
                                        'Category'=>array(
                                            'id'=>$books2['category_id'],
                                            'http_code'=>$books2['http_code'],
                                            'download_time'=>$category['Category']['download_time']+$books2['download_time'],
                                            'pages'=>$i
                                        )
                                    );
//                                    pr($update);exit;
                                    $this->Category->recursive = -1;
                                    $rtl = $this->Category->save($update);           
                                }
                            endwhile;
                }
                
                
            }
        }
        
        $this->set(compact('options','books'));
    }
    
/**
 * index method
 * 图书详情
 * $id 京东图书id
 * @return void 
 */
	public function details($id) {
                $id = intval($id);
                if(!$id) return exit(); 
//                $target = "http://item.m.jd.com/product/$id.html";
//                echo $this->Session->write('Cookie') ;
                $price = $this->Collection->getJdPrice($id);
//                pr($price);
                $details = $this->Collection->getBookDetails($id);
//                pr($details);
                if(isset($details['author_id'])){
                    $this->Author->recursive = -1;
                    $res = $this->Author->find('first',array('conditions'=>array('name'=>$details['author_id'])));
                    pr($res);
                    if(empty($res)){
                            $upAuthorData = array(
                                'Author'=>array(
                                    'name'=>$details['author_id'],
                                    'introduction'=>$details['author_introduction']
                                )
                            );
                             $this->Author->create();
                             $rtl = $this->Author->save($upAuthorData);   
                             $details['author_id'] = $rtl['Author']['id'];
                    }else{
                        $details['author_id'] = $res['Author']['id'];
                    }
                }
                
                
//                pr($upAuthorData);
                 $bds = $this->BookDetail->getColumnTypes();
                pr($bds);
	}    
  
}
