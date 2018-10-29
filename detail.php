<?php ob_start();?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">

    <?php 
    //1. 接收article_id
    //$id = $_GET['id'];
    if (empty($_GET['id'])) {
      echo "您访问的文章不存在";
      header('refresh:2;url=index.php');
      die();
    } else {
      $id = $_GET['id'];
      include_once 'left.php';
    }

    //2. 拼接SQL语句
    $sql = "select * from ali_article
              join ali_admin on ali_article.article_adminid=ali_admin.admin_id
              join ali_cate on ali_article.article_cateid=ali_cate.cate_id
              where article_id=$id";

    //3. 执行SQL语句
    $result_obj = mysqli_query($conn, $sql);
    $info = mysqli_fetch_assoc($result_obj);

    if (empty($info)) {
      echo "您访问的文章不存在";
      header('refresh:2;url=index.php');
      die();
    }    

    //4. 将查询结果写入文章页
    ?>

    <div class="content">
      <div class="article">
        <div class="breadcrumb">
          <dl>
            <dt>当前位置：</dt>
            <dd><a href="javascript:;"><?php echo $info['cate_name']; ?></a></dd>
            <dd><?php echo $info['article_title']; ?></dd>
          </dl>
        </div>
        <h2 class="title">
          <a href="javascript:;"><?php echo $info['article_title']; ?></a>
        </h2>
        <div class="meta">
          <span><?php echo $info['admin_nickname']; ?> 发布于 <?php echo $info['article_addtime']; ?></span>
          <span>分类: <a href="javascript:;"><?php echo $info['cate_name']; ?></a></span>
          <span>阅读: (<?php echo $info['article_click']; ?>)</span>
          <span>评论: (<?php echo $info['article_cmt']; ?>)</span>
          <div><?php echo $info['article_text']; ?></div>
        </div>

      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_2.jpg" alt="">
              <span>星球大战:原力觉醒视频演示 电影票68</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_3.jpg" alt="">
              <span>你敢骑吗？全球第一辆全功能3D打印摩托车亮相</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_4.jpg" alt="">
              <span>又现酒窝夹笔盖新技能 城里人是不让人活了！</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_5.jpg" alt="">
              <span>实在太邪恶！照亮妹纸绝对领域与私处</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
</body>
</html>
