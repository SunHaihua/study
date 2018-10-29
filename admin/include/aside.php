<?php 
    $url = explode('/', $_SERVER['PHP_SELF']);
    //print_r($url);
?>

<div class="profile">
      <img class="avatar" src="<?php echo $_SESSION['pic']; ?>">
      <h3 class="name"><?php echo $_SESSION['nickname']; ?></h3>
    </div>
    <ul class="nav">
      <li <?php if($url[2] == 'index.php') echo 'class="active"'; ?>>
        <a href="/admin/index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li <?php if($url[2] == 'cate' || $url[2] == 'article') echo 'class="active"'; ?>>
        <a href="#menu-posts" <?php if ($url[2] != 'cate' && $url[2] != 'article') echo 'class="collapsed"'; ?> data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <!--判断$url中单元2的内容是否为 cate或者article-->
        <ul id="menu-posts" class="collapse <?php if($url[2] == 'cate' || $url[2] == 'article') echo 'in'; ?>">
          <li><a href="/admin/article/posts.php">所有文章</a></li>
          <li><a href="/admin/article/postadd.php">写文章</a></li>
          <li><a href="/admin/cate/categories.php">栏目列表</a></li>
          <li><a href="/admin/cate/addcate.php">添加栏目</a></li>
        </ul>
      </li>
      <li <?php if($url[2] == 'comments') echo 'class="active"'; ?>>
        <a href="/admin/comments/comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li <?php if($url[2] == 'users') echo 'class="active"'; ?>>
        <a href="/admin/users/users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.html">导航菜单</a></li>
          <li><a href="slides.html">图片轮播</a></li>
          <li><a href="settings.html">网站设置</a></li>
        </ul>
      </li>
    </ul>