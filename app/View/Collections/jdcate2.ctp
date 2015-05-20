<?php

    echo $this->Html->css('jquery.treegrid');
?>
<?php  
        $this->Html->addCrumb('Collections', '/Collections');
        $this->Html->addCrumb('jdcate1', array('controller' => 'Collections', 'action' => 'jdcate1'));
        $this->Html->addCrumb('jdcate2', array('controller' => 'Collections', 'action' => 'jdcate2'));
?>
<h1>采集预览<small>二级分类</small></h1>

<?php  if(!empty($msg)): ?>
            <div class="alert alert-success"><strong>信息提示!</strong>二级分类采集完毕</div>
                <!--<p><a class="btn btn-primary btn-lg" href="/Collections/books" role="button"><span class="glyphicon glyphicon-hand-right"></span> GO采集图书</a></p>-->
<?php else: ?>
                <p><a class="btn btn-primary btn-lg" href="/Collections/books" role="button"><span class="glyphicon glyphicon-hand-right"></span> GO采集图书</a></p>
<div class="users form">
    
<?php echo $this->Form->create('Collection');//,array('type' => 'get') ?>
        <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr ><th>#</th><th>分类名称</th><th>目标地址</th></tr>
                        <?php
                            foreach ($categories as $key => $value) {
//                                foreach ($value['name'] as $k => $val) {
                                    echo '<tr><td >'.($key) .'</td ><td >'.$value.'</td><td>' . $value . '</td></tr>';
//                                }
                            }

                        ?>
                </table>
       </div>
     <?php
//          echo $this->Form->input('name',array(
//                                                                            'type'	=> 'select',
//                                                                            'label' => '请选择图书分类：',
//                                                                            'div' => 'form-group',
//                                                                            'class' => "form-control",
//                                                                            'name'	=>"data[1][1][WeekProitemId]",
//                                                                            'selected'=>$jdcate,
//                                                                            'readonly'=>'readonly',
//                                                                            'empty' => '——请选择项目——',
//                                                                            'options' => $categories
//                                                                        ));
     ?>
    <!--<select required="required" id="jd" name="jdcate">-->
        <?php   
//        foreach ($categories as $key => $value) {
//            if($jdcate == $key) $selected = ' selected= "selected" ';
//           else 
//               $selected = '';          
            
//            echo '<option value="'.$key.'"  '.$selected.' >'.$value.'</option>';
//        }
        
//        pr($pass);
        ?> 
        
<!--        <option value="2">managers</option>
        <option value="3">users</option>-->
    <!--</select>-->
    <button type="submit" class="btn btn-primary">Submit</button> 
    <button type="button" class="btn btn-info">正在执行：<?php echo $categories[$jdcate]; ?> ……</button>
    <div class="progress progress-striped active">
        <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
            <span class="sr-only">45% Complete</span>
        </div>
    </div>
    
    
<?php 
//        if($this->request->is('post')){
            echo $this->Form->input('name',array('type'=>'hidden','value'=>49));//$jdcate
            echo $this->Form->end();
//        }
                       
?>
       
</div>
<?php endif; ?>
