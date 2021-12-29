<?php
// wp
// https://www.cnblogs.com/R-S-PY/p/12095264.html
    highlight_file(__FILE__);
    class emmm
    {
        public static function checkFile(&$page)
        {
            echo $page;
            $whitelist = ["xctf-elem"=>"xctf-elem.php","xctf-adv"=>"xctf-adv.php"];
            if (! isset($page) || !is_string($page)) {
                echo "you can't see it";
                return false;
            }

            if (in_array($page, $whitelist)) {
                echo $page . " in " . $whitelist;
                return true;
            }

            $_page = mb_substr(
                $page,
                0,
                mb_strpos($page . '?', '?')
            );
            if (in_array($_page, $whitelist)) {
                return true;
            }

            $_page = urldecode($page);
            $_page = mb_substr(
                $_page,
                0,
                mb_strpos($_page . '?', '?')
            );
            if (in_array($_page, $whitelist)) {
                return true;
            }
            echo "you can't see it";
            return false;
        }
    }
    if (! empty($_REQUEST['file'])
        && is_string($_REQUEST['file'])
        && emmm::checkFile($_REQUEST['file'])
    ) {
        include $_REQUEST['file'];
        exit;
    } else { 
        echo "<br><img src=\"#\" />";
    }  
?> 