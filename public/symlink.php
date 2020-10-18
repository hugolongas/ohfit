<?php
$target = '/home/ohfit.barcelona/ohfit/storage/app/public';
$shortcut = '/home/ohfit.barcelona/web/storage';
symlink($target, $shortcut);
echo 'symlink'
?>