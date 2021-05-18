<?php 
include_once 'dbcon.php';
 ?>
 <?php
session_start();
if(!isset($_SESSION['unofficehead']))
{
?>
 <script>
  alert('YOU ARE NOT ALLOWED TO ACCESS!!Please Login to access the page');
  window.location='login.php';
 </script>
 <?php 
}
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>የራስ ጥገና መመሪያ።</title>
  <?php 

$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
    ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<link rel="stylesheet"  href="bootstrap.min.css">
<link rel="stylesheet"  href="bootstrap.min.css">
	<style type="text/css">
    .accordion:after {
    content: '\02795'; /* Unicode character for "plus" sign (+) */
    font-size: 13px;
    color: #777;
    float: right;
    margin-left: 5px;
}

.active:after {
    content: "\2796"; /* Unicode character for "minus" sign (-) */
}
    .accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    background-color: #ccc; 
}

.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
	#box{
    border: 3px solid black;
    border-radius: 20px;
    padding-bottom:  30px;
    width: 100%;
    height: 100%;
  }
  #foot{

    margin: 50px;
 margin-left: 0px;
    margin-right: 0px;
  }
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
	</style>
</head>
<body>
	<?php 
          $username=$_SESSION['unofficehead'];
     ?>
   <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow navbar-fixed-top">
      	  <a href="offichead.php" class="btn btn-info" class="pull-left justify-content-start">መነሻ</a>
        <div class="container d-flex justify-content-end">
        	<?php 
          $sele="SELECT * FROM officehead where username='$username'";
          $exee=mysqli_query($con,$sele);
          $row=mysqli_fetch_array($exee);
          if (empty($row['profilpic'])) {
          
          }else{
          echo '<img style="border-radius: 50%;" style="vertical-align:middle" height="80" width="100" src="data:image/jpeg;base64,'.base64_encode( $row['profilpic'] ).'"/>';
        }
           echo "&nbsp&nbsp&nbsp";
      ?>
<a href="#" class="navbar-brand d-flex align-items-end">
           <strong class="pull-left"><?php echo $username ?></strong>
          </a>
          <div class="pull-right">
            <a href="logoutoffichead.php" class="btn btn-danger my-2">ውጣ</a>
          </div>
        </div>
      </div>
      <?php 
if (empty($row['profilpic'])) {

       ?>
     <br>
     <br>
     <br>
     <br>
      <?php 
}else{
   ?>
    <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <?php 
}
 
       ?>
    </header>

<h3>የራስ ጥገና መመሪያ ፡፡</h3>




<div class="tab">
   <button class="tablinks" onclick="openCity(event, 'general')">አጠቃላይ የችግር መፍትሄ አቀራረብ ፡፡</button>
  <button class="tablinks" onclick="openCity(event, 'software')" id="defaultOpen">ከሶፍትዌር ጋር የተዛመደ።</button>
  <button class="tablinks" onclick="openCity(event, 'printer')">ከአታሚ ጋር የተገናኘ።</button>
   <button class="tablinks"  onclick="openCity(event, 'network')">ከአውታረ መረብ ጋር የተገናኘ።</button>
  <button class="tablinks" onclick="openCity(event, 'hardware')">ከሃርድዌር ጋር የተገናኘ።</button>

</div>

<div id="network" class="tabcontent" >
  <h2>ከአውታረ መረብ ጋር የተገናኘ።</h2>
 <button class="accordion"><h4 style="font-family: algerian">1.የኃይል ዑደት ሁሉንም ነገር ይቆጣጠሩ እና ሌሎች መሣሪያዎችን ይፈትሹ።</h4></button>
 <div class="panel">
 <p>ይቀጥሉ እና ኮምፒተርዎን እንዲሁም ሞደምዎን እና ራውተርዎን እንደገና ያስነሱ። ሞደም እና ራውተር መሸጎጫዎችን ለማፅዳት እንደገና ከማብራትዎ በፊት 60 ሴኮንድ ይጠብቁ ፡፡ ሁሉንም ነገር ወደ ውስጥ ሲሰካ ፣ መጀመሪያ ሞደምዎን ይሰኩ እና ራውተርዎን ከማገናኘትዎ በፊት እስኪበራ ድረስ ይጠብቁ ፡፡</p>
</div>
 <button class="accordion"><h4 style="font-family: algerian">2. አካላዊ ግንኙነቶችን ይፈትሹ።</h4></button>
 <div class="panel">
 <p>ወደ ራውተርዎ ለማገናኘት የኢተርኔት ገመድ የሚጠቀሙ ከሆኑ የማይነካ ወይም የተጎዳ አለመሆኑን ያረጋግጡ። ላፕቶፕዎ አካላዊ ሽቦ አልባ ሽግግር ካለው ወደ ውጭ ቦታ እንዳልተቀናበረ ያረጋግጡ ፡፡</p>
</div>
 <button class="accordion"><h4 style="font-family: algerian">3. የዊንዶውስ አውታረ መረብ መላ ፍለጋን ያሂዱ።</h4></button>
 <div class="panel">
 <img src="net1.png" width="800" height="300">
 <p>ዊንዶውስ ችግሮችን በራስ-ሰር ማግኘት እና ማስተካከል የሚችሉ አንዳንድ አብሮ የተሰሩ መላ ፍለጋዎችን ያካትታል ፡፡ ለአውታረ መረብ ችግሮች መላ ፈላጊውን ለማሄድ በሲስተም ትሬይዎ ውስጥ ያለውን የኔትወርክ አዶ በቀኝ ጠቅ ያድርጉ እና የችግሮች መላ ችግሮች ይምረጡ። አንዴ መላ ፈላጊ ከሄደ ፣ ጉዳዮችን ሊያስተካክል ፣ ጉዳዮችን ሊያገኝ ይችላል ግን እነሱን ሊያስተካክለው ወይም ምንም ነገር ሊያገኝ ይችላል ፡፡
</p></div>

</div>

<div id="hardware" class="tabcontent">
  <h2>ከሃርድዌር ጋር የተገናኘ።</h2>
<button class="accordion"><h3 style="font-family: algerian">ሀ. የኃይል ቁልፍ ኮምፒተር አይጀምርም።</h3></button>
<div class="panel">
<h4>1.ኮምፒተርዎ የማይጀምር ከሆነ ከኮምፒዩተር መያዣው ጀርባ እና ከኃይል ማውጫው በስተጀርባ ደህንነቱ በተጠበቀ ሁኔታ መሰካቱን ለማረጋገጥ የኃይል ገመዱን በመፈተሽ ይጀምሩ ፡፡</h4>
<h4> 2.ወደ መውጫው ውስጥ ከተሰቀለ የሚሰራ መውጫ መሆኑን ያረጋግጡ ፡፡ መውጫዎን ለመፈተሽ ፣ እንደ መብራት ያለ ሌላ የኤሌክትሪክ መሳሪያ መሰካት ይችላሉ ፡፡</h4>
<h4>ኮምፒተርው ከተሰካ ፣ መብራቱን ያረጋግጡ። በማጥፋት እና ከዚያ እንደገና ማብራት አለብዎት። በትክክል እየሰራ መሆኑን ለማረጋገጥ መብራት ወይም ሌላ መሣሪያ ወደ ውስጥ መሰካት ይችላሉ።</h4>
</div>
<button class="accordion"><h3 style="font-family: algerian">ለ. አንድ መተግበሪያ በቀስታ እየሄደ ነው።</h3></button>
<div class="panel">
<h4>1.መተግበሪያውን ይዝጉ እና እንደገና ይክፈቱ።</h4>
<h4>2.መተግበሪያውን ያዘምኑ። ይህንን ለማድረግ የእገዛ ምናሌውን ጠቅ ያድርጉና ዝመናዎችን ለመፈተሽ አማራጭን ይፈልጉ ፡፡ ይህን አማራጭ ካላገኙ ሌላ ሀሳብ ለመተግበሪያ ዝመናዎች የመስመር ላይ ፍለጋን ማካሄድ ነው።</h4></div>
<button class="accordion"><h3 style="font-family: algerian">ሐ. mouth ወይም ቁልፍ ሰሌዳው መስራቱን አቁሟል።</h3></button>
<div class="panel">
<h4>1.ባለገመድ mouth ወይም ቁልፍ ሰሌዳ እየተጠቀሙ ከሆነ ኮምፒተርዎን በትክክል መሰካቱን ያረጋግጡ።</h4>
<h4>2.ሽቦ አልባ መዳፊት ወይም የቁልፍ ሰሌዳን የሚጠቀሙ ከሆነ መብራቱን እና ባትሪዎቹ እንዲሙሉ ያረጋግጡ።</h4>
</div>
</div>
<div id="software" class="tabcontent">
  <h2 >ከሶፍትዌር ጋር የተዛመደ።</h2>
 <h3  style="font-family: algerian">1. ሌሎች የተከፈቱ ፕሮግራሞችን በመዝጋት ራም ነፃ ያድርጉ ፡፡</h3> 
 <h3  style="font-family: algerian">2. ሶፍትዌሩን እንደገና ያስጀምሩ።</h3> 
 <h3 style="font-family: algerian">3. ዝጋ እና ኮምፒተርዎን እንደገና ያስጀምሩ.</h3> 
 <h3 style="font-family: algerian">4. ማንኛውንም የቅርብ ጊዜ የሃርድዌር ወይም የሶፍትዌር ለውጦች ይቀልብሱ።</h3> 
<h3 style="font-family: algerian"> 5. ሶፍትዌሩን ሰርዝ እና እንደገና ይጫኑት።</h3> 
</div>
<div id="printer" class="tabcontent">
  <h2 >ከአታሚ ጋር የተገናኘ።</h2>
  <h3  style="font-family: algerian">1. ኃይሉን ይፈትሹ።</h3>
 <h3  style="font-family: algerian"> 2. ወረቀቱን ይፈትሹ::</h3>
 <h3  style="font-family: algerian"> 3. ግንኙነቱን ይፈትሹ።</h3>
<h3  style="font-family: algerian">  4. ምን እንደተመረጠ ያረጋግጡ።</h3>
<h3  style="font-family: algerian">  5. የቀለም ጉዳዮችን ይፈትሹ ፡፡</h3>
</div>
<div id="general" class="tabcontent">
  <h2>አጠቃላይ የችግር መፍትሄ አቀራረብ ፡፡</h2>

<h3  style="font-family: algerian">1.ችግሩን መለየት ፡፡</h3>
<h3  style="font-family: algerian">2.ሊሆኑ የሚችሉ ሊሆኑ የሚችሉ ጽንሰ-ሀሳቦችን ያቋቁሙ።</h3>
<h3  style="font-family: algerian">3.ምክንያቱን ለማወቅ ንድፈ ሃሳቡን ይፈትሹ።</h3>
<h3  style="font-family: algerian">4.ችግሩን ለመፍታት እና መፍትሄውን ለመተግበር የድርጊት መርሃ ግብር ያዘጋጁ ፡፡</h3>
<h3  style="font-family: algerian">5.የሙሉ ስርዓት ተግባርን ያረጋግጡ እና የሚመለከታቸው የመከላከያ እርምጃዎችን ይተግብሩ።</h3>
<h3  style="font-family: algerian">6.የሰነድ ግኝቶችን ፣ እርምጃዎችን እና ውጤቶችን በሰነድ ያቅርቡ ፡፡</h3>
</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
document.getElementById("defaultOpen").click();
</script>
</body>
<?php 
echo "<div id='foot'>";
include_once 'footer.php';
echo "</div>";
 ?>
</html>
