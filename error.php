<?php 

//容错模块（容错页面）

$errno = $_GET['errno'];

switch ($errno) {
    case '303':
        echo "您访问的文章不存在";
        header();
        break;
    
    default:
        # code...
        break;
}

?>