<?php
session_start();
$Image = $_POST['Image']; //All the required inputs
//echo $Image;
$r=$_POST['band'];
//echo "<br>".$r;
//$FilterType=$_POST['FilterType'];
//echo "<br>".$FilterType;
//$var1=$_POST['var1'];
//echo "<br>".$var1;
//$var2=$_POST['var2'];
//echo "<br>".$var2;

$fname=$_SESSION['fname'];
//echo "<br>".$fname;
$_SESSION['fname']=$fname;
$lname=$_SESSION['lname'];
//echo "<br>".$lname;
$_SESSION['lname']=$lname;
$email=$_SESSION['email'];
//echo "<br>".$email;
$_SESSION['email']=$email;
$folder=$_SESSION['folder'];
//echo "<br>".$folder;
$_SESSION['folder']=$folder;
$_path='../user_data/'.$folder.'/';
//echo "<br>".$_path."<br>";

//echo $fname;
//echo "<br>".$lname;
//echo "<br>".$email;
//echo "<br>user_data/".$folder;

$format=$_POST['format'];
//echo "<br>".$format;
$titre=$_POST['titre'];
//echo "<br>".$titre;
$direction=$_POST['direction'];
//echo "<br>".$ws1;
//echo "<br>Name= ".$format;
//echo "<br>var1= ".$titre;
//echo "<br>var2= ".$titre1;


//$path="/var/www/html/register/user1/";
//check filename
if ($Image == "inputimage" || $Image == "quickbird.jpg") {

    putenv("SCIHOME=/home/Ubuntu/.Scilab/scilab-5.5.0"); //the code from master.sce is written here for the 1st experiment
      $code = "stacksize('max');mode(-1);exec('/usr/share/scilab/contrib/sivp/loader.sce');
getd;
pic='$Image';
RGB=$r;
path='$_path';
edgetype='$format';
thresh=$titre;
direction='$direction';
path='$_path';
[img, RbandVal]=imgdisplay1(pic,RGB,path);
edgeImg = edge2(img,edgetype,thresh,direction);
imwrite(edgeImg,path+'edgeimg.jpg');";
$code = str_replace('\"', '"', $code);
        $code = preg_replace("/[\n\r]/","", $code);
 exec('scilab -nw -nb -e "' . $code . ';exit;"', $output); //send code to scilab for execution
      
   

//display the outputs
 echo "<img src='".$_path."/out_original_img.jpg'>";

echo "<br><br><img src='".$_path."/edgeimg.jpg'>";
 } 
    
else{

print ("Wrong input");

}
 
?> 
    

 
  

