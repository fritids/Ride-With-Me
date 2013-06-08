<?php
include_once ("classes/User.class.php");
session_start();

$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);
if (!isset($_SESSION["username"])) {

	header("Location: index.php");
}

$user = new User();
$id = $_GET['user_id'];
$details = $user->getUserById($id);
$username = $_SESSION["username"];
$number = $user->getUserByName($username);

?><!doctype html>
<html lang="en">
	<head>
		<?php include_once("includes/head.php");?>
		<script src="js/jquery.mobile-menu.js"></script>
	
	<script>
		$(function(){
			$("body").mobile_menu({
				menu: ['#main-nav ul', '#secondary-nav ul'],
  		menu_width: 200,
  		prepend_button_to: '#mobile-bar'
			});
		});
	</script>
	

	</head>
	<body>
		
       <!-- onclick="location.href='javascript:history.go(-1)'"> -->
        <div data-role="page">

			 <div data-theme="a" data-role="header"><div id="sidebar">
	<div data-theme="a" data-role="header">    
        <h3>
            Ride with.me
       
        </h3>
        <header>
			<nav id="mobile-bar"></nav>
				
			<nav id="main-nav">
			
				<ul>
					<li><a id="you" href="profile.php?user_id=<?php echo $number ?>"><?php echo "Hello " . $username ?></a></li>
				
				
					<li><a <?php if($page == "searchRides.php"){echo 'class="active"';}?> href="searchRides.php" >&nbsp Search ride</a></li>
					<li><a <?php if($page == "createRide.php"){echo 'class="active"';}?> href="createRide.php">&nbsp Create ride</a></li>
					<li><a <?php if($page == "yourRides.php"){echo 'class="active"';}?> href="yourRides.php">&nbsp Your rides</a></li>
					<li><a <?php if($page == "settings.php"){echo 'class="active"';}?> href="settings.php"><img  src="img/Settings.png" img style="width: 15px;"/>&nbsp&nbspSettings</a></li>

				</ul>
			</nav>
		</header>
	</div>
</div>
        
       
      
    </div>
    
<div id='mySwipe'  class='swipe'>
  <div class='swipe-wrap'>
    <div ><b><img  src="uploads/<?php echo $details['avatar']?>"/><br/><br/></br><p id="username"><?php echo $details['fullname'] . " (" . $details['username'] . ")" ?></p><br/><p><span>Birthday</span></p></b></div>
        <div><b><p id="slide2"><?php echo $details['bio']?></p></b></div>

    <div><b><p id="slide3"><?php echo $details['street'] . ", " . $details['city'] . " (<span>" . $details['state'] . ", " . $details['country'] . ")</span>" ?></p><br/><p><span><?php echo $details['email'] . ", " . $details['phone'] ?></span></p></b></div>
	
  
</div>
<div onclick='mySwipe.prev()' id="left"></div>
<div onclick='mySwipe.next()' id="right"></div>
<div id="saved">Saved about <span>$99,99</span> last month</div>

</div>
<div id="profile_links"><a href="#" ><img src="img/trips.png"/></a>
<a href="#" ><img src="img/friends.png"/></a></div>

		</div>
	</body>

<script src='js/swipe.js'></script>
<script src='js/swiper.js'></script>
</html>