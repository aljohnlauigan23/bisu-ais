<?php

$cmd = 'find . -type f -name "*jpg" ';
$list = array();
exec($cmd, $list);

foreach ($list as $pic) {
    $ext = preg_replace('/\.([a-z])$/i', '$1', basename($pic));
    $pic_name = preg_replace('/\.([a-z])$/i', '', basename($pic));
    $new_name = preg_replace('/^\d+\.\s+/', '', $pic_name);
    $new_name = preg_replace('/\,\s+/', '_', $new_name);
    $new_name = dirname($pic).'/'.preg_replace('/(\s|\.)+/', '', $new_name).'.'.$ext;
    //$new_name = preg_replace('/jpg$/i', '.jpg', $pic); 
    //print "$pic - $new_name\n";
    rename($pic, $new_name);
}

?>
