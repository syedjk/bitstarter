<?php
 echo '<table border="1" width="2010px"><tr><td colspan="2"><input id="buttonPrevious" type="button" onclick="nextImage(\'previous\')" value="Previous"><div id="imageNumber"></div><input id="buttonNext" type="button" onclick="nextImage(\'next\')" value="Next"></td></tr><tr><td style="width: 80px; text-align: center; vertical-align: text-top;">';
 $folderName = $_GET["image"];
 $imageList = array();
 $i = 1;
 
foreach(glob("images/".$folderName."/*.{jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG}",
 GLOB_BRACE) as $images)
 {
	array_push($imageList, $images);
	echo '<a href="javascript:loadImage(\''.$images.'\')">Image '.$i.'</a><br/>';
	$i = $i +1;

 }
 
 
echo '</td><td id="imageAdjustBorder"><img id="imageLoad" style="display:none;"></td></tr></table>';

/*
print '<script type="text/javascript">';
print 'alert("sadfsdf: '.$imageList[0].'")';
print '</script>';
*/
?>
 
<script type="text/javascript">

	var imageList = <?php echo json_encode($imageList);?>;
	
	document.getElementById("imageLoad").style.display="";
	document.getElementById("imageLoad").src=imageList[0];
	
	function nextImage(direction)
	{
		var curImageFull = document.getElementById("imageLoad").src;
		var curImageIndex = curImageFull.indexOf("/images") + 1;
		var curImage = curImageFull.substr(curImageIndex);
		
		var index = -1;
		for(var i=0; i<imageList.length; i++){
			if(imageList[i] == curImage){
				index = i;
				break;
			}
		}
		
		if(direction == "next"){
			if(imageList.length> index+1){
				document.getElementById("imageLoad").src=imageList[index+1];
				document.getElementById("imageNumber").innerHTML = "" + (index+2) + " of " + imageList.length;
			}
			else{
				document.getElementById("imageLoad").src=imageList[0];
				document.getElementById("imageNumber").innerHTML = "1 of " + imageList.length;
			}
		}
		else{
			if(index>0){
				document.getElementById("imageLoad").src=imageList[index-1];
				document.getElementById("imageNumber").innerHTML = "" + index + " of " + imageList.length;
			}
			else{
				document.getElementById("imageLoad").src=imageList[imageList.length-1];
				document.getElementById("imageNumber").innerHTML = "" + imageList.length + " of " + imageList.length;
			}
		}
		
		
	}
	
	function loadImage(source)
	{
		document.getElementById("imageLoad").src=source;
		document.getElementById("imageAdjustBorder")
	} 
</script>
 
