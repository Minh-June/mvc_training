<?php
$routes['default_controller'] = 'home';

/* Đường dẫn ảo trỏ đến đường dẫn thật */

$routes['san-pham'] = 'product/index';
$routes['trang-chu'] = 'home';
$routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';
?>