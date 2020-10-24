<?php
  /* remember to set localhost to domain when hosted*/
  if(isset($_GET['q'])){
  $fileName = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $_GET['q']);
  $fileName = filter_var($fileName, FILTER_SANITIZE_URL); // Remove (more) invalid characters
  $path = "apk/";
  $fullP = $path.$fileName;
  if($fo = fopen($fullP, 'r')){
    $fileSize = filesize($fullP);
    $file_part = pathinfo($fullP);
    $ext = strtolower($file_part["extenstion"]);
    switch($ext){
      case "pdf": header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=\"".$file_part["basename"]."\""); // use 'attachment' to force a file download
        break;
        // add more headers for other content types here
        default:
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$file_part["basename"]."\"");
        break;
    }
    header("Content-length: $filesize");
    header("Cache-control: private");
    while(!feof($fo)){
      $buffer = fread($fo, 2048);
      echo $buffer;
    }

}
  fclose($fo);
}
 exit;
?>
