<?php 
include 'Translator.class.php';
$output = "";
$arr1 = "";

if(isset($_POST["en"]))
{
  $do = new Translator();
  $output = $do->translate($_POST["en"]);
    
}
?>
<head>
<title>Arabic Letters to English letters convertor</title>  
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>
<form action='example.php' method="post">
  text : <input type="text" name="en">
<input type="submit" value="enter">
</form>
<hr>
result:
 <section><?php echo $output; ?></section>

