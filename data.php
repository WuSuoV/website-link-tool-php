<?php
header('Content-type:application/json; charset=utf-8');
$urls = file('links.txt');
$count = count($urls);
$page = 1;
$num = 15;

if ($_REQUEST['page'] && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
}
if ($_REQUEST['num'] && $_REQUEST['num'] <= 30 && is_numeric($_REQUEST['num'])) {
    $num = $_REQUEST['num'];
}
$maxpage = ceil($count / $num);
if ($num > $maxpage) {
    echo json_encode([
        'code' => 1,
        'msg' => '已刷完!'
    ], 320);
} else {
    foreach (array_slice($urls, $page * $num, $num) as $value) {
        $data[] = trim($value);
    }
    echo json_encode([
        'code' => 0,
        'data' => $data,
        'count' => $count
    ], 320);
}
