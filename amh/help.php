<!DOCTYPE html>
<html>
<head>
	<title>እገዛ</title>
	<?php 
	include_once 'dbcon.php';
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

	echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
		?>
	<style >
		
		#map{
			border:3px solid black;
			border-radius: 20px;
			margin: 20px;
			padding: 20px;
			align-content: center;
		}
	</style>
</head>
<body>
	<?php
	include_once 'header.php';
	include_once 'header2.php';
	?>
<div id="map" class="container justify-around-center" >
	<div class="row justify-around-center">
		<div class="col-md-6">
<h2>እኛን ለማነጋገር።</h2>
<p>በምስሉ ላይ ያለውን ንቁ አገናኝ (ብርቱካናማ) ማሳያ ላይ ጠቅ ያድርጉ ፡፡ </p>
<img src="contact_am.png" width="500" height="400">
</div>
<div class="col-md-6">
<h2>መጪውን ክስተት ለማየት።</h2>
<img src="news_am.png" width="500" height="400">
</div>
</div>
<div class="row justify-around-center">
	<div class="col-md-6">
<h2>ጥያቄን ለማፅደቅ ፡፡</h2>
<p>የተጋራ ክልል ላይ ጠቅ ያድርጉ።</p>
<img src="approve_am.png" width="500" height="400">
</div>
	<div class="col-md-6">
<h2>የጣቢያ ካርታ ይመልከቱ።</h2>
<p>ከግርጌ በስተቀኝ በኩል ነጭውን ጠቅ ያድርጉ ፡፡</p>
<img src="map_am.png" width="500" height="400">
</div>

</div>	

<div class="row justify-around-center">
	<div class="col-md-6">
<h2>የጥገና ጥያቄ ለመላክ ፡፡</h2>
<p>
ይህንን ቅጽ ሞልተው ለቢሮ ኃላፊው ይሁንታ ጥያቄ ከላኩ እና በመጨረሻም ባለሙያ ችግርዎን መፍትሄ ያገኛል ፡፡</p>
<img src="send_request_am.png" width="500" height="400">
</div>
</div>
</div>
<?php
	include_once 'footer.php';
	?>
</body>
</html>