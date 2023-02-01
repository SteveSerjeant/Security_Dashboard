<?php

//$handle = popen('start /B C:\Users\sarge\source\scan230131.bat >nul 2.&1', 'r');
//pclose($handle);
//header("Location: inProgress.php");

echo "in progress"."<br>";
//exec('c:\WINDOWS\system32\cmd.exe /c START C:\Program Files\VideoLAN\VLC\vlc.bat');

exec('c:\WINDOWS\system32\cmd.exe /c START C:\Users\sarge\source\scan230131.bat');

echo "finished";


