<?php

    echo $this->Html->css('jquery.treegrid');
?>
<?php  
        $this->Html->addCrumb('Collections', '/Collections');
        $this->Html->addCrumb('一级分类', array('controller' => 'Collections', 'action' => 'jdcate1'));
//        echo $this->Html->getCrumbs(' / ', array (
//            'text'   => $this->Html->image('home.png'),
//            'url'    => array ('controller' => 'pages', 'action' => 'display', 'home'),
//            'escape' => false
//        ));
?>
<h1>h1. Bootstrap heading <small>Secondary text</small></h1>
<div class="users form">
    
<?php echo $this->Form->create('Collection'); ?>
        <?php
        if (!empty($arr)):
            ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr ><th>#</th><th>分类名称</th><th>目标地址</th></tr>
    <?php
            foreach ($arr as $key => $value) {
                foreach ($value['name'] as $k => $val) {
                    echo '<tr><td >'.($key).'-'.$k .'</td ><td >'.$val.'</td><td>' . $value['path'][$k] . '</td></tr>';
                }
            };
            
            ?>
                
                 </table>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
                <?php 
                        $options = array(
                            'label' => 'Submit',
                            'div' => array(
                                'class' => 'btn btn-primary btn-lg',
                            )
                        );
                        echo $this->Form->end(); 
        else:  
//            echo '一级分类已经采集完毕)！' ;
//            echo $this->Html->link(__('GO >> 采集二级分类'), array('controller' => 'Collections', 'action' => 'jdcate2'));
            ?>
            <div class="alert alert-success"><strong>信息提示!</strong>一级分类已经采集完毕</div>
                <p><a class="btn btn-primary btn-lg" href="/Collections/jdcate2" role="button"><span class="glyphicon glyphicon-hand-right"></span> GO采集二级分类</a></p>
                <?php
        endif;
    ?>
                          
<?php ?>
</div>

