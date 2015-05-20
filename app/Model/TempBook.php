<?php
App::uses('AppModel', 'Model');
App::uses('Category', 'Model');
/**
 * TempBook Model
 *
 * @property Category $Category
 */
require_once(APP . "Vendor/LIB/LIB_download_images.php");
class TempBook extends AppModel {

   
/**
 * getJdCateTwo
 * 
 * 采集京东图书信息
 * 
 * $target 目标地址
 * 
 * $ref  目标域名 
 * 
 * http://m.jd.com/products/1713-3258-3297.html?resourceType=index_category&resourceValue=&sid=7dccb7c9e9507cbc7aa143c3f2b85caf
 * http://m.jd.com/products/1713-3258-3297.html?resourceType=index_category&resourceValue=&sid=a9f9897aefeaba7d9fae856f1e92a270
 * 
 * http://m.jd.com/ware/searchList.action?=&_format_=json&c1=1713&c2=3258&categoryId=3297&page=1&region=&self=0&sort=1&stock=0
 * 
 * http://m.jd.com/products/1713-3258-3297.html?resourceType=index_category&resourceValue=&sid=a9f9897aefeaba7d9fae856f1e92a270
 * 
 * http://m.jd.com/ware/searchList.action?=&_format_=json&c1=1713&c2=3258&categoryId=3297&page=1&region=&self=0&sort=1&stock=0
 * 
 * http://list.jd.com/list.html?cat=1713,3258,3297&area=1,72,4137&page=1&delivery=1&stock=0&sort=sort_totalsales15_desc&plist=1&JL=4_10_0
 *  http://list.jd.com/list.html?cat=1713,3258,3297&area=1,72,4137&page=1&delivery=0&stock=0&sort=sort_totalsales15_desc&plist=1
 * 
 * http://item.m.jd.com/product/11545102.html
 * http://item.jd.com/11545102.html#m
 * 
 * 
 */
    public function getJdBooks($target, $ref=null,$page=1) {
        @header('Content-type: text/html;charset=UTF8');
//        require_once(APP . "Vendor/LIB/LIB_http.php");
//        require_once(APP . "Vendor/LIB/LIB_parse.php");
//        require_once(APP . "Vendor/LIB/LIB_resolve_addresses.php");

        
        $str = split_string($target, '.html', BEFORE, EXCL);
        $str = split_string($str, 'products/', AFTER, EXCL);
        $arr = explode('-', $str, 3);
        $c1 = $arr[0];
        $c2 = $arr[1];
        $categoryId = $arr[2];
       
        
    # Request the header
        $ref    = "http://m.jd.com";
         
        $n_target  = $ref.'/ware/searchList.action?=&_format_=json&c1='.$c1.'&c2='.$c2.'&categoryId='.$categoryId.'&page='.$page.'&region=&self=0&sort=1&stock=0';

        $return_array  = http_get_withheader($n_target, $ref);
        $data['http_code'] =  $return_array['STATUS']['http_code'];
        $data['download_time'] =  $return_array['STATUS']['total_time'];
        //下载一个网页
        $web_page = http_get($n_target, $ref);
//        $array = return_between($web_page['FILE'], '<div id="list">', '</div>', EXCL);
       $_books = json_decode($web_page['FILE']);
       $wareList = json_decode($_books->value,true);
       $books = $wareList['wareList'];
//       echo '/home/mxj/DEV/zencms/public_html/app/webroot<br>';


              
        for ($i =0;$i < count($books); $i++) {
//                 $data['info'][$i]['thumbnail'] = $save_image_url.DS.$image_path; 
                 $data['info'][$i]['thumbnail'] = $books[$i]['imageurl'];
                 $data['info'][$i]['wareid'] = $books[$i]['wareId'];
                 $data['info'][$i]['name'] = $books[$i]['wname'];
        }
        return $data;
    }

    public function getJdSaveBooks($data) {
//        pr($data);exit;
        $save_image_directory = WWW_ROOT.'images'.DS.date("Y").DS.date("m").DS.date("d");
        $save_image_url = DS.'images'.DS.date("Y").DS.date("m").DS.date("d");
        mkpath($save_image_directory);
        $sql = 'TRUNCATE temp_books';
        $this->query($sql);
        foreach ($data['info'] as $k => $val) {
            //下载图片
            $image_url = $val['thumbnail'];
            $image_name =explode('/', $image_url);
            $image_path = $image_name[count($image_name)-1];
            $this_image_file =  download_binary_file($image_url, $ref='');

            # Save the image
            if(stristr($image_url, ".jpg") || stristr($image_url, ".gif") || stristr($image_url, ".png")){
                $fp = fopen($save_image_directory.DS.$image_path, "w");
                fputs($fp, $this_image_file);
                fclose($fp);
                echo "\n"; 
            }

            $data['category_id'] = $data['category_id'];
            $data['cid'] = 1;

            $data['thumbnail'] = $save_image_url.DS.$image_path; 
            $data['name'] = $val['name'];
            $data['wareid'] = $val['wareid'];

//            $n_arr = $this->find('first',array(
//                                    'conditions'=>array('name >'=>$val['name']),
//                                    'order' =>'id asc',
//                                    'recursive'=>-1));
//            if(!$n_arr){
                $this->create();
                $rtl = $this->save($data);
//            }
            
        }

        return $rtl;
    }
    
}
