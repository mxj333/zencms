<?php
    echo $this->Html->css('jquery.treegrid');
?>
<?php  
        $this->Html->addCrumb('Collections ', '/Collections');
        $this->Html->addCrumb(' Books', array('controller' => 'Collections', 'action' => 'books'));
//        $this->Html->addCrumb('jdcate2', array('controller' => 'Collections', 'action' => 'jdcate2'));
?>
<h1>采集预览<small>图书信息</small></h1>

<div class="users form">
    
<?php echo $this->Form->create('Collection'); ?>
    
         <?php
         
//         $options = array(
//            'Group 1' => array(
//               'Value 1' => 'Label 1',
//               'Value 2' => 'Label 2'
//            ),
//            'Group 2' => array(
//               'Value 3' => 'Label 3'
//            )
//         );
         echo $this->Form->select('path', $options);


//          echo $this->Form->input('name',array(
//                                                                            'type'	=> 'select',
////                                                                            'label' => '请选择图书分类：',
//                                                                            'div' => 'form-group',
//                                                                            'class' => "form-control",
////                                                                            'name'	=>"data[1][1][WeekProitemId]",
////                                                                            'selected'=>$jdcate,
////                                                                            'readonly'=>'readonly',
////                                                                            'empty' => '——请选择项目——',
//                                                                            'options' => $categories
//                                                                        ));
     ?>
    
    
        <?php
        $arr = array(1=>'My Books');
        if (!empty($books['info'])):
            ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr ><th>#</th><th>封面</th><th>图书名称</th><th>目标地址</th></tr>
    <?php
//              unset($books['http_code']);
//              unset($books['download_time']);
            foreach ($books['info'] as $key => $value) {
//                foreach ($value['name'] as $k => $val) {
                    echo '<tr><td >'.($key).'</td ><td ><img src="'.$value['thumbnail'].'"></td><td>' . $value['name'] . '</td><td >'.$value['wareid'].'</td ></tr>';
//                }
            }
            
            ?>
                
                 </table>
            </div>
            <!--<button type="submit" class="btn btn-primary">Submit</button>--> 
            <button type="submit" class="btn btn-primary" name='insert' value="1">入库</button>
                <?php 
                        
        else:  
//            echo '一级分类已经采集完毕)！' ;
//            echo $this->Html->link(__('GO >> 采集二级分类'), array('controller' => 'Collections', 'action' => 'jdcate2'));
            ?>
           
            <div class="alert alert-success"><strong>信息提示!</strong><!--一级分类已经采集完毕--></div>
                <p> <button type="submit" class="btn btn-primary">Submit</button> 
                    <!--<a class="btn btn-primary btn-lg" href="/Collections/jdcate2" role="button"><span class="glyphicon glyphicon-hand-right"></span> GO采集二级分类</a>-->
                </p>
                <?php
        endif;
    ?>
                          
<?php ?>
</div>