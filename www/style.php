<?php
header("content-type:text/css;charset:UTF-8");
	$config=parse_ini_file("config.ini",true);
	$col=$config["Main Settings"]["color"];
	$lcol=$config["Main Settings"]["lcolor"];

?>
body {
	background-color:<?php echo "$col" ?>;
	font-size:100%;	

}
.levaya {
	float:left;
	background:<?php echo "$lcol" ?>;
	margin:1% 80% 1% 1%;
	padding:0.5% 0.5% 35% 2%;
}
.subauth input{
	background:<?php echo "$col" ?>;
	padding:1% 10%;
	margin:2% 
}
.reg {
	display:<?php echo "$display" ?>;
	
}