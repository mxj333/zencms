<?php  
        $this->Html->addCrumb('Posts', '/Posts');
?>
<div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                        <div class="col-lg-10"><h3>Posts</h3></div>
                        <div class="col-lg-2">
                            <a style="margin-top: 15px" class="btn btn-default pull-right" href="/Posts/add">Add Posts</a>  
                        </div>
                </div>
                
              <div class="form-group">
                <span>全选 <input type="checkbox"></span>
                <button class="btn btn-danger">删除</button>
                <ul id="page-right" class="pagination visible-md visible-lg visible-sm">
                    <?php 
		echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled active'));
		echo $this->Paginator->numbers(array(
                                                                                                            'separator' => '',
                                                                                                            'currentClass' => 'active current',
                                                                                                            'currentTag' => 'a',
                                                                                                            'tag'=>'li'
                                                                                                        )
                                                                                                    );
		echo $this->Paginator->next('>>', array(), null, array('class' => 'next disabled'));
	?>
<!--                  <li><a href="#">«</a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">»</a></li>-->
                </ul>
              </div>
            </div>
    
            <div class="panel-body">
              <table class="table table-hover">
                <tbody><tr>
                  <th><?php //echo $this->Paginator->sort('id'); ?></th>
                  <!--<th>审核状态</th>-->
                  <th><?php echo $this->Paginator->sort('title','标题'); ?></th>
                  <th>作者</th>
                  <th><?php echo $this->Paginator->sort('created','创建时间'); ?></th>
                  <th>操作</th>
                </tr>
                <?php foreach ($posts as $k=>$post): ?>
                <tr>
                  <td><input type="checkbox"><?php //echo h($post['Post']['id']); ?></td>
                  <!--<td><span class="label label-default">未审核</span></td>-->
                  <td><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?> &nbsp;</td>
                  <td><?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>&nbsp;</td>
                  <td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
                  <td>
                      <a href="#collapse<?php echo $k;?>" data-parent="#accordion" data-toggle="collapse" class="detail-link">
                      <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                      <!--<i class="icon-pencil icon-large"></i>-->
                      <?php // echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); 
                                echo $this->Html->link(
                                        $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-pencil')),
                                        array('action' => 'edit', $post['Post']['id']),
                                        array('escape'=>false)
                                );
                      ?>
<!--                      <a href="#">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>-->
<!--                      <a href="#">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>-->
                      <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), array(), __('Are you sure you want to delete # %s?', $post['Post']['id'])); 
                      echo $this->Form->postLink(
                              $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash')),
                              array('action' => 'delete', $post['Post']['id']),
                              array('escape'=>false),
                              __('Are you sure you want to delete # %s?', $post['Post']['id']),
                              array('class' => 'btn btn-mini')
                      );
                      ?>
                      
                  </td>
                </tr>
                <tr class="collapse" id="collapse<?php echo $k;?>">
                  <td colspan="10">
                  <?php echo h($post['Post']['body']); ?>&nbsp;
                  </td>
                </tr>
                <?php endforeach; ?>

                
              </tbody></table>
              <div class="visible-xs">
                <ul class="pagination">
                  <li><a href="#">«</a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
            </div>
          </div>