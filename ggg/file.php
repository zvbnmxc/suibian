<?php
$arr = $_FILES;
$info=$_REQUEST;
$ext=explode(".",$info['filename'])[1];
$fileName=$info['filename'];
$baseDir="./".date("Y/m/d",time());
if(!is_dir($baseDir)){
    mkdir($baseDir,0,777);
}
$filePath=$baseDir.$fileName;
$tmpName = $arr['data']['tmp_name'];
//$fileName = "BadPerson.jpg";
$content = file_get_contents($tmpName);
file_put_contents($fileName,$content,FILE_APPEND);
$filePath=ltrim($filePath,".");
$filePath="/file/".$filePath; 
$arrReturn = array(
    "error"=>0,
    "data"=>array(
        'path'=>$filePath,
    ),
);
echo json_encode($arrReturn);
?>