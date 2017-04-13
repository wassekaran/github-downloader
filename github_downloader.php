<?php

$errors = "";
error_reporting(0);
if(empty($_POST) === false) {
	$url = $_POST["url"];
	$choice = $_POST["choice"];
	if(empty($url) == true) {
	   $errors = "Please enter the URL";
	} else if( preg_match("/https:\/\/github.com\/(.*?)/", $url) == false ) {
	   $errors = "Please enter valid github the URL";
	}else {
	    if(fopen($url,"r")) {
              $download_url = $url . "/archive/master.zip";
			  
			  if($choice == "l") {
			     $errors = "<a href=\"$download_url\">Download ". end(explode("/",$url)) ."</a>";
			  } else {
                 header("location: $download_url");
			  }
		} else {
		     $errors = "File not Exist.";
		
		}
	}
}

?>

<html>
  <head>
     <style>
      .container {  
	     background:#fff; 
		 border:1px solid #293d39;
		 width:720px;
		 margin:0 auto; 
		 margin-top:-1px; 
		 text-align:left; 
		 padding: 10px;
		}
		.error {
   color: red;
   font-weight: bold;
   clear: both;

}
     </style>
	 <title>Githhub Downloader</title>
  </head>
  <body>
      <div class="container">
	     
		   <div style="border: 1px solid black;background-color: thistle;">
		       <h1 align="center">Githhub Downloader</h1>
		   </div>
		   <br>
		   <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		   <div>
		      <label for="url">Enter the URL: </label>
			  <input type="text" id="url" name="url" style="width: 80%;border: 1px solid grey;">
			  
			  <br>
			  <br>
			  
		      <label for="url">Enter the Choice: </label>
			  <input type="radio" name="choice" value="l" checked> Get Download Link
			  <input type="radio" name="choice" value="d"> Direct Download

			  <br>
			  <br>
			  
			  <div align="center"><input type="submit" name="submit" value="submit" style="border: 1px solid brown;"></div>

			  
			  <?php
			  
			  if(empty($errors) == false){
			  ?>
			  <div class="error"><?php echo $errors;?></div>
			  <?php
			  }
			  ?>
			  
		   </div>
          </form>		   
		   <div style="border: 1px solid black;background-color: thistle;">
		       <span align="center">Copyright by -- Md Shahil Ahmed</span>
		   </div>
	  </div>
  </body>
</html>