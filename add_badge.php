<?php
// credits to Joe from github for this function
// this is to resize the uploaded image
session_start();
    function resize_image($file, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }
        $src = imagecreatefrompng($file);
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    
        return $dst;
    }
    
    $me = imagecreatefrompng($_SESSION['image_name']);
    
    // call badges
    $badge1 = @imagecreatefrompng('./assets/badge-1.png');
    $badge2 = @imagecreatefrompng('./assets/badge-2.png');
    $badge3 = @imagecreatefrompng('./assets/badge-3.png');
    $badge4 = @imagecreatefrompng('./assets/badge-4.png');
    $badge5 = @imagecreatefrompng('./assets/badge-5.png');
    
    // get width and height of badge
    $badgewidth = imagesx($badge1);
    $badgeheight = imagesy($badge1);
    
    // get width and height of uploaded photo
    $mywidth = imagesx($me);
    $myheight = imagesy($me);
    
    // resize uploaded image to same width as badge.
    $mypic1 = resize_image($_SESSION['image_name'], $badgewidth, $badgeheight);
    $mypic2 = resize_image($_SESSION['image_name'], $badgewidth, $badgeheight);
    $mypic3 = resize_image($_SESSION['image_name'], $badgewidth, $badgeheight);
    $mypic4 = resize_image($_SESSION['image_name'], $badgewidth, $badgeheight);
    $mypic5 = resize_image($_SESSION['image_name'], $badgewidth, $badgeheight);
    
    // set directory for saving badges
    $saveBadgeLoc1 = './uploads/badged/badge1/'.'mybadge'.time().'.png';
    $saveBadgeLoc2 = './uploads/badged/badge2/'.'mybadge'.time().'.png';
    $saveBadgeLoc3 = './uploads/badged/badge3/'.'mybadge'.time().'.png';
    $saveBadgeLoc4 = './uploads/badged/badge4/'.'mybadge'.time().'.png';
    $saveBadgeLoc5 = './uploads/badged/badge5/'.'mybadge'.time().'.png';
    
    renderAll($mypic1, $mypic2, $mypic3, $mypic4, $mypic5, $badge1, $badge2, $badge3, $badge4, $badge5, $mywidth, $badgeheight, $saveBadgeLoc1, $saveBadgeLoc2, $saveBadgeLoc3, $saveBadgeLoc4, $saveBadgeLoc5);
    renderAll($mypic1, $mypic2, $mypic3, $mypic4, $mypic5, $badge1, $badge2, $badge3, $badge4, $badge5, $mywidth, $badgeheight, $saveBadgeLoc1, $saveBadgeLoc2, $saveBadgeLoc3, $saveBadgeLoc4, $saveBadgeLoc5);
    renderAll($mypic1, $mypic2, $mypic3, $mypic4, $mypic5, $badge1, $badge2, $badge3, $badge4, $badge5, $mywidth, $badgeheight, $saveBadgeLoc1, $saveBadgeLoc2, $saveBadgeLoc3, $saveBadgeLoc4, $saveBadgeLoc5);
    renderAll($mypic1, $mypic2, $mypic3, $mypic4, $mypic5, $badge1, $badge2, $badge3, $badge4, $badge5, $mywidth, $badgeheight, $saveBadgeLoc1, $saveBadgeLoc2, $saveBadgeLoc3, $saveBadgeLoc4, $saveBadgeLoc5);
    renderAll($mypic1, $mypic2, $mypic3, $mypic4, $mypic5, $badge1, $badge2, $badge3, $badge4, $badge5, $mywidth, $badgeheight, $saveBadgeLoc1, $saveBadgeLoc2, $saveBadgeLoc3, $saveBadgeLoc4, $saveBadgeLoc5);
    
    // merge uploaded image to badge
    function createBadge($mypic, $badge, $mywidth, $badgeheight, $saveBadgeLoc){
        imagecopyresampled(
            $mypic,
            $badge,
            0,
            0,
            0,
            0,
            $mywidth,
            $badgeheight,
            $mywidth,
            $badgeheight);
    
        imagepng($mypic, $saveBadgeLoc);
    }
    
    // render uploaded picture to all badges
    function renderAll($mypic1, $mypic2, $mypic3, $mypic4, $mypic5, $badge1, $badge2, $badge3, $badge4, $badge5, $mywidth, $badgeheight, $filename1, $filename2, $filename3, $filename4, $filename5){
        createBadge($mypic1, $badge1, $mywidth, $badgeheight, $filename1);
        createBadge($mypic2, $badge2, $mywidth, $badgeheight, $filename2);
        createBadge($mypic3, $badge3, $mywidth, $badgeheight, $filename3);
        createBadge($mypic4, $badge4, $mywidth, $badgeheight, $filename4);
        createBadge($mypic5, $badge5, $mywidth, $badgeheight, $filename5);
    }

    // save all data to sessions
    $_SESSION['img1'] = $saveBadgeLoc1;
    $_SESSION['img2'] = $saveBadgeLoc2;
    $_SESSION['img3'] = $saveBadgeLoc3;
    $_SESSION['img4'] = $saveBadgeLoc4;
    $_SESSION['img5'] = $saveBadgeLoc5;
?>