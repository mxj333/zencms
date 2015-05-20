<?php
App::uses('AppModel', 'Model');
App::uses('BookDetail', 'Model');
/**
 * Collection Model
 *
 * @property Collection $ParentCategory
 * @property Collection $ChildCategory
 */
require_once(APP . "Vendor/LIB/LIB_http.php");
require_once(APP . "Vendor/LIB/LIB_parse.php");
require_once(APP . "Vendor/LIB/LIB_resolve_addresses.php");
class Collection extends AppModel {
    
    public  $useTable = 'categories';
//    public  $useTable = false;
    
    
/**
 * getJdCateTwo
 * 
 * 采集京东图书二级分类
 * 
 * $target 目标地址
 * 
 * $ref  目标域名 
 * 
 */
    public function getJdCateTwo($target, $ref=null) {
        @header('Content-type: text/html;charset=UTF8');
        require_once(APP . "Vendor/LIB/LIB_http.php");
        require_once(APP . "Vendor/LIB/LIB_parse.php");
        require_once(APP . "Vendor/LIB/LIB_resolve_addresses.php");
    # Request the header
        $ref    = "http://m.jd.com";
        $return_array  = http_get_withheader($target, $ref);
        $data['http_code'] =  $return_array['STATUS']['http_code'];
        $data['download_time'] =  $return_array['STATUS']['total_time'];
        //下载一个网页
        $web_page = http_get($target, $ref);
        $array = return_between($web_page['FILE'], '<div class="mc" >', '</div>', EXCL);
        $link_array = parse_array($array, "<a ", "</a>", EXCL);
        for ($i =0;$i < count($link_array); $i++) {
            $pattern = "/<a(s*[^>]+s*)href=([\"|']?)([^\"'>\s]+)([\"|']?)/ies";
                preg_match_all($pattern, $link_array[$i], $matches);
                 $data[$i]['path'] = $ref. $matches[3][0];
                 $text = return_between($link_array[$i], '<input ', '>', EXCL);
                 $data[$i]['name'] = trim(get_attribute($text, "value"));
        }
        return $data;
    }
    
    
    public function getBookDetails($id) {
        $sid = md5(uniqid());
        
        $target = "http://item.m.jd.com/detail/$id.html?sid=$sid";
//        echo $target."<br>";
         $ref    = "http://m.jd.com";
        $return_array  = http_get_withheader($target, $ref);
        $data['http_code'] =  $return_array['STATUS']['http_code'];
        $data['download_time'] =  $return_array['STATUS']['total_time'];
        //下载一个网页
        $web_page = http_get($target, $ref);
//        $page_price =  http_get("http://p.3.cn/prices/get?skuid=J_$id&type=1&area=1_72_4137&callback=cnp", $ref='');
        
//        $array = return_between($web_page['FILE'], '<div class="book-container">', '</div>', EXCL);
        $array = parse_array($web_page['FILE'],  '<div class="book-container">', '</div>', EXCL);
        unset($array[0]);
        $arr = array();
//        $arr['price'] = $price[0]['m'];
        foreach ($array as $key => $value) {
                   $name = return_between($value,  '<span class="info-title">', '</span>', EXCL);
                   if(trim($name) == '著者'){
                       $arr['author_id'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '译者'){
                       $arr['translator'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '绘者'){
                       $arr['drawing'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '出版社'){
                       $arr['press_id'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == 'ISBN'){
                       $arr['isbn'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '版次'){
                       $arr['revision'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '包装'){
                       $arr['packing'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '开本'){
                       $arr['folio'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '丛书名'){
                       $arr['series_name'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '外文名'){
                       $arr['foreign_name'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '出版时间'){
                       $arr['publication_time'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '印刷时间'){
                       $arr['printing_time'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '用纸'){
                       $arr['paper'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '页数'){
                       $arr['pages'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '印次'){
                       $arr['impression'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '套装数量'){
                       $arr['number_suits'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '字数'){
                       $arr['number_words'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
                   if(trim($name) == '正文语种'){
                       $arr['body_language'] = trim(return_between($value, '<span class="info-content">', '</span>', EXCL));
                   }
       }
         
        $container = parse_array($web_page['FILE'],  '<div class="book-container-item">', '</div>', EXCL);
        foreach ($container as $k => $val) { 
                $name = trim(return_between($val,  '<span class="book-item-title">', '</span>', EXCL));
//                echo $name."<br>";
                if($name =='【编辑推荐】'){
                    $array = trim(strip_tags($val, '<p><br>'));
                    $array = parse_array($array,  '<p class="book-item-content">', '</p>', EXCL);
                    $arr['editor'] = $array[0];
//                    $arr['editor'] = split_string($array[0], '相关好书推荐', BEFORE, EXCL);
                }
                if($name =='【内容简介】'){
                    $array = trim(strip_tags($val, '<p><br>'));
                    $array1 =  parse_array($array,  '<p>', '</p>', EXCL);
                    if(empty($array1)) {
                        $array1 =  parse_array($array,  '<p class="book-item-content">', '</p>', EXCL);
                    }                 
                    $arr['brief_introduction'] = $array1[0];
                }
                if($name =='【作者简介】'){
                    $array = trim(strip_tags($val, '<p><br>'));
                    $array =  parse_array($array,  '<p>', '</p>', EXCL);
                    $arr['author_introduction'] = $array[0];
                }
                if($name =='【精彩书评】'){
                    $array = trim(strip_tags($val, '<p><br>'));
                    $array =  parse_array($array,  '<p class="book-item-content">', '</p>', EXCL);
                    $arr['wonderful_review'] = $array[0];
                }
                if($name =='【目录】'){
                    $array = trim(strip_tags($val, '<p><br>'));
                    $array =  parse_array($array,  '<p class="book-item-content">', '</p>', EXCL);
                    $arr['catalog'] = $array[0];
                }
                if($name =='【精彩书摘】'){
                    $array = trim(strip_tags($val, '<p><br>'));
                    $array =  parse_array($array,  '<p class="book-item-content">', '</p>', EXCL);
                    $arr['digest'] = $array[0];
                }
                if($name =='【前言/序言】'){
                    $array = trim(strip_tags($val, '<p><br>'));
                    $array =  parse_array($array,  '<p class="book-item-content">', '</p>', EXCL);
                    $arr['foreword_preface'] = $array[0];
                }
                if($name =='【前言/序言】'){
                    $array = trim(strip_tags($val, '<p><br>'));
                    $array =  parse_array($array,  '<p class="book-item-content">', '</p>', EXCL);
                    $arr['foreword_preface'] = $array[0];
                }     
        }
//        pr($arr);
        return $arr;
    }
    
    public function getJdPrice($id) {
        $id = intval($id);
         if(!$id) return exit(); 
        $page_price = file_get_contents ("http://p.3.cn/prices/get?skuid=J_$id");
//        $page_price = file_get_contents ("http://p.3.cn/prices/get?skuid=J_$id&type=1&area=1_72_4137&callback=cnp");
        $price = json_decode($page_price,true);
        return $price[0]['m'];       
    }

}
