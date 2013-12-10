<?php
require_once('includes/checksession.php');
require_once('includes/connection.php');
require_once('includes/template.php');
require_once('includes/func.getUserID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

if (!isset($_GET['id_game']))
	exit();

$id_game = intval($_GET['id_game']);

if(isset($_GET['id_game']) && ($id_game = intval($_GET['id_game'])) != 0
		&& isset($id_user) && ($id_user = intval($id_user)) != 0){

require_once('includes/connection.php');

$query = <<<EOD
INSERT INTO logs
(id_user,id_game,date,status)
VALUES ('{$id_user}','{$id_game}',now(), 1)
EOD;

mysql_query($query, $connection);

$my_error = mysql_error($connection);
if(!empty($my_error)){
	echo mysql_error();
}
else {
	echo " ";
}
}

$code = <<<EOD
$(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "show",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
    
    $( "#dialog2" ).dialog({
      autoOpen: false,
      show: {
        effect: "show",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#reglas" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
    

	//canvas initialization
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	
	//dimensions
	var W = canvas.width;
	var H = canvas.height;
	
	//Variables
	var degrees = 0;
	var new_degrees = 0;
	var difference = 0;
	var color = "lightgreen"; //green looks better to me
	var bgcolor = "#222";
	var text;
	var animation_loop, redraw_loop;

	function init()
	{
		//Clear the canvas everytime a chart is drawn
		ctx.clearRect(0, 0, W, H);
		
		//Background 360 degree arc
		ctx.beginPath();
		ctx.strokeStyle = bgcolor;
		ctx.lineWidth = 30;
		ctx.arc(W/2, H/2, 100, 0, Math.PI*2, false); //you can see the arc now
		ctx.stroke();
		
		//gauge will be a simple arc
		//Angle in radians = angle in degrees * PI / 180
		var radians = degrees * Math.PI / 180;
		ctx.beginPath();
		ctx.strokeStyle = color;
		ctx.lineWidth = 30;
		//The arc starts from the rightmost end. If we deduct 90 degrees from the angles
		//the arc will start from the topmost end
		ctx.arc(W/2, H/2, 100, 0 - 90*Math.PI/180, radians - 90*Math.PI/180, false); 
		//you can see the arc now
		ctx.stroke();
		
		//Lets add the text
		ctx.fillStyle = color;
		ctx.font = "50px bebas";
		text = Math.floor(degrees/360*100) + "%";
		//Lets center the text
		//deducting half of text width from position x
		text_width = ctx.measureText(text).width;
		//adding manual value to position y since the height of the text cannot
		//be measured easily. There are hacks but we will keep it manual for now.
		ctx.fillText(text, W/2 - text_width/2, H/2 + 15);
	}
	
	function draw()
	{
		//Cancel any movement animation if a new chart is requested
		if(typeof animation_loop != undefined)
			clearInterval(animation_loop);
		
		//random degree from 0 to 360
		new_degrees = Math.round(Math.random()*360);
		difference = new_degrees - degrees;
		//This will animate the gauge to new positions
		//The animation will take 1 second
		//time for each frame is 1sec / difference in degrees
		animation_loop = setInterval(animate_to, 1000/difference);
	}
	
	//function to make the chart move to new degrees
	function animate_to()
	{
		//clear animation loop if degrees reaches to new_degrees
		if(degrees == new_degrees) 
			clearInterval(animation_loop);
		
		if(degrees < new_degrees)
			degrees++;
		else
			degrees--;
			
		init();
	}
	
	//Lets add some animation for fun
	draw();
	//redraw_loop = setInterval(draw, 2000); //Draw a new chart every 2 seconds
	
});
EOD;

openHeader('Project XYZ', '/project-xyz/styles/styles.css',$code);
openBody('Juega' , 'mainPage', $connection);

$query = <<<EOD
SELECT *
FROM embeddeds em, games g
WHERE g.id_embedded=em.id_embedded
AND g.id_game={$id_game}
EOD;

$gameCode = '';
$res = mysql_query($query,$connection);
while($game = mysql_fetch_assoc($res)){
	$gameCode .= <<<EOD
	
<div id="info_game">
	<h2 rel="{$game['id_game']}">{$game['name_game']}</h2>
	
	<div id="dialog" title="{$game['name_game']}">
  <p>{$game['description_game']}</p>
	</div>
	
<button id="reglas">Reglas</button>
<a href="estadistics.php?id_game={$id_game}" target="blank"><button id="ranking">Ranking</button></a>
</div>
	{$game['name_embedded']}
EOD;
}
?>

<div id="game_code">
<?php	echo $gameCode;?>

<div id="playGame">
<canvas id="canvas" width="300" height="300"></canvas>
</di>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="https://www.facebook.com/ProjectXYZ3Dimensional" data-send="true" data-width="450" data-show-faces="true" data-colorscheme="dark" data-font="verdana"></div>

</div>
<?php
closeBody();
?>
