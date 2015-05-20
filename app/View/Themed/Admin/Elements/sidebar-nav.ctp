<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
    <div class="list-group">
        <a href="/Posts" class="list-group-item  <?php echo $this->params->params['controller'] == 'Posts' ? 'active' : '' ?>"><span class="glyphicon glyphicon-list-alt"></span> 内容管理</a>
        <a href="/Categories" class="list-group-item <?php echo $this->params->params['controller'] == 'Categories' ? 'active' : '' ?>"><span class="glyphicon glyphicon-list-alt"></span> 分类管理</a>
        <a href="/Collections" class="list-group-item <?php echo $this->params->params['controller'] == 'Collections' ? 'active' : '' ?>"><span class="glyphicon glyphicon-list-alt"></span> 采集管理</a>
        <a href="/Users/" class="list-group-item  <?php echo $this->params->params['controller'] == 'Users' ? 'active' : '' ?>"><span class="glyphicon glyphicon-user"></span> 用户管理</a>
        <a href="/admin/acl" class="list-group-item  <?php echo $this->params->params['controller'] == 'acos' ? 'active' : '' ?>"><span class="glyphicon glyphicon-cog"></span> 权限控制</a>

    </div>
</div>