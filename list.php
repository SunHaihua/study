<?php ob_start(); ?>
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

    <?php include_once 'left.php';?>

    <div class="content">
      <div class="panel new">
        <?php 
        //防止用户直接操作url地址产生的错误
        //思路: 如果栏目名或者id为空，则跳转回首页
        /*if (empty($_GET['name']) || empty($_GET['id'])) {
          echo "您访问的地址有误，2秒后跳转回首页";
          header('refresh:2;url=index.php');
          die();
        }*/

        //思路: 如果栏目名或者id为空，设置一个默认值，默认访问潮科技
        if (empty($_GET['name']) || empty($_GET['id'])) {
          $cate_id = 1;
          $cate_name = '潮科技';
        } else {
          $cate_id = $_GET['id'];
          $cate_name = $_GET['name'];
        }
        ?>

        <h3><?php echo $cate_name; ?></h3>
        <?php 
        
        //2. 拼接SQL语句
        $sql = "select * from ali_article
                  join ali_admin on ali_article.article_adminid=ali_admin.admin_id
                  where article_cateid=$cate_id";
        //3. 查询
        $result_obj = mysqli_query($conn, $sql);
        ?>

        <?php while ($row = mysqli_fetch_assoc($result_obj)) {?>
        <div class="entry">
          <div class="head">
            <a href="detail.php?id=<?php echo $row['article_id']; ?>"><?php echo $row['article_title']; ?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $row['admin_nickname']; ?> 发表于 <?php echo $row['article_addtime']; ?></p>
            <p class="brief"><?php echo $row['article_desc']; ?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $row['article_click']; ?>)</span>
              <span class="comment">评论(<?php echo $row['article_cmt']; ?>)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $row['article_good']; ?>)</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="/admin/upload/<?php echo $row['article_file']; ?>" alt="">
            </a>
          </div>
        </div>
        <?php } ?>

      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
</body>
</html>
