<?php

if(isset($_POST['1'], $_POST['imgurl1'], $_POST['imgurl2'], $_POST['imgurl3'], $_POST['imgurl4'], $_POST['imgurl5'])) {

    $selected_badge = $_POST['1'];

    if ($selected_badge == 'preview1'){
        $filename = $_POST['imgurl1'];
    } elseif ($selected_badge == 'preview2'){
        $filename = $_POST['imgurl2'];
    } elseif ($selected_badge == 'preview3'){
        $filename = $_POST['imgurl3'];
    } elseif ($selected_badge == 'preview4'){
        $filename = $_POST['imgurl4'];
    } elseif ($selected_badge == 'preview5'){
        $filename = $_POST['imgurl5'];
    }

    //Read the filename
    //Check the file exists or not
  

        //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: 0");
        header('Content-Disposition: attachment; filename="'.basename($filename).'');
        header('Content-Length: ' . filesize($filename));
        header('Pragma: public');

        //Clear system output buffer
        flush();

        //Read the size of the file
        readfile($filename);

        //Terminate from the script
        die();
}
?>