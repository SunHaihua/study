<?php 
//定义当前页号变量
//测试时可以自己定义页号，
//但是实际程序中要使用$_POST来接收前端传递的页号
//$pageno = 2;
$pageno = $_POST['p'];
//定义每页显示条数变量
$pagesize = 3;
//计算查询起始点
$start = ($pageno - 1) * $pagesize;
//拼接SQL语句
$sql = "select * from ali_article  
          join ali_admin on ali_article.article_adminid=ali_admin.admin_id
          join ali_cate on ali_article.article_cateid=ali_cate.cate_id
          limit  $start, $pagesize";

//链接MySQL并执行SQL语句
include_once '../include/mysql.php';
$result_obj = mysqli_query($conn, $sql);

//将结果对象转为二维数组，再转为json
$arr = [];
while ($row = mysqli_fetch_assoc($result_obj)) {
    array_push($arr, $row);
}

echo json_encode($arr);
?>