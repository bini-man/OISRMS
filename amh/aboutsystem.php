<?php 
include_once 'dbcon.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ስለ ስርዓቱ</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="stylesheet"  href="bootstrap.min.css">
	<?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

	echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
		?>
		<style type="text/css">
			
			#bb{
				border: 3px solid black;
				border-radius: 20px;
				margin: 50px;
				padding: 35px;
				font-weight: bold;
		</style>
</head>
<body>
	
	<?php 
include_once 'header.php';
include_once 'header2.php';
?>

<div  id="bb" class="content">
	<div class="row">
		<div class="col-md-9">
			<h2 style="color: blue">ይጠይቁ<br /></h2>
			
->ለአንድ ነገር የመጠየቅ ፣ ወይም ምኞትን የመግለጽ ተግባር ፤ አቤቱታ ወይም ልመና ፡፡<br />
->አንድ ጥያቄ እንዲቀርብለት ጠይቋል።<br />
->የሚፈለግ ወይም የሚፈለግበት ሁኔታ ፤ ፍላጎት ብዙ የሚጠየቅ።<br />
<h2 style="color: blue">የጥያቄ አመጣጥ<br /></h2>


->ምኞትን ወይም ምኞትን ለመግለጽ ፣ መጠየቅ ፣ በተለይም በትህትና ወይም በመደበኛ መንገድ መጠየቅ-ብዙውን ጊዜ አንድ ነገርን ለማድረግ (አንድ ሰው) የሆነ ነገርን ለመጠየቅ (ሰው) በመጠየቅ<br />
			<h2 style="color: blue">ይህ የጥያቄ ስርዓት ይደግፋል<br /></h2>
			->ቀጣሪዎች ከኮምፒተር ጋር ተያያዥነት ያላቸውን ችግር ለመላክ የቻሉ ነገር እዚያው ቢሮ (ጥያቄ) እንደላኩ ነው ፡፡<br />
			->የዚህ ድርጅት ተቀጣሪ በባለሙያዎች ለማስተካከል የላከው እያንዳንዱ ጥያቄ በቢሮ ኃላፊው እና በቢሮ ኃላፊው የሥርዓት አስተዳዳሪው ይህን ጥያቄ እንዲያስተካክለው የሚጠይቀውን ተቀባዮች ይቀበላል ፡፡<br />
			->ይህን ስርዓት ለመጠቀም ሰራተኞች እና የቢሮ ኃላፊዎች መመዝገብ አለባቸው እና የተጠቃሚ ስም እና የይለፍ ቃል የተጠቃሚ ስም እና የይለፍ ቃል ከአስፈፃሚ ቢሮ ማግኘት አለባቸው።
</div>


</div>
	</div>

</div>
<?php
include_once 'footer.php';
 ?>
</body>
</html>