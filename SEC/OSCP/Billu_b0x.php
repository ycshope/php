<?php
    if(isset($_GET['file']))
    {
        $file=$_GET['file'];
        echo "file=" . $file;
        if(file_exists($file))
        {
            echo "file found";
            ob_clean();
            flush();
            readfile($file);
        }
        else
        {
            echo "file not found";
        }
    }
    else{
        echo "file parameter is empty.";
    }
?>