<?php header("Content-type: text/css; charset: UTF-8"); ?>

@font-face{
	font-family: Agency;
	src: url('/indexer/resources/agency.ttf')
		,url('/indexer/resources/agency.eot'); /* IE9+ */
}


@media screen and (max-width:500px){
	.contentLoader { display: none; }
}


body{
	font-family:Agency;
	font-size:18px;
	color:<?php getFontMainColor(); ?>;
	/*text-shadow:1px 2px 3px rgba(255,255,255,0.8),
			0px 0px 1px rgba(0,0,0,.7);*/
	background-color:<?php getMainColor(); ?>;
	background-image: url("/indexer/resources/stripe.png");
}
a{
	color:<?php getFontMainColor(); ?>;

	transition:color .3s;
	-moz-transition:color .3s;
	-webkit-transition:color .3s;
	-o-transition:color .3s;
}
a:hover{
	color:<?php getFontSecondaryColor(); ?>;
}
header {
	position: absolute;
	top:0px;
	left:0px;
	right:0px;
	height: 50px;
}
a img {
	border: none;
}

.content{
	position: absolute;
	top: 90px;
	bottom: 10px;
	left: 25px;
	right: 70%;

	overflow: auto;
}
.content .deleteBtn{
	position: relative;
	left: 5px;
	top: -2px;
	height: 18px;
	width: 18px;

	background-image: url("/indexer/resources/trashCan.svg");
	background-position: center;
	background-repeat: no-repeat;
	display: inline-block;	
	margin: 4px auto;
	vertical-align: middle;
}
.content .confirmDeleteControls{
	display: none;
}
.copyright{
	position: absolute;

	font-size: 25px;
	text-decoration:none;
}
.headBar{
	height: 30px;

	background-color: <?php getSecondaryColor(); ?>;
	box-shadow: 0px 0px 10px rgba(0,0,0,.7);
}
.headBar .currentLocation{
	position: relative;
	top: 3px;
	left: 3px;
}
.headBar .siteName{
	position: absolute;
	top: 3px;
	right: 5px;
}
.title{
	position: absolute;
	top: 33px;
	left: 20px;

	font-size: 50px;
}
.leftNav{
	position: absolute;
	top:30px;
	left:-250px;
	bottom:0px;
	width:270px;

	z-index: 999;

/*	display: none;
*/
	transition:left .3s;
	-moz-transition:left .3s;
	-webkit-transition:left .3s;
	-o-transition:left .3s;
}
.leftNav:hover{
	left:0px;
}
.leftNav .menu{
	position: absolute;
	top:0px;
	left:0px;
	bottom:0px;
	right:10px;

	padding: 10px;

	box-shadow: 0px 0px 10px rgba(0,0,0,0.7);
	background-color: <?php getSecondaryColor(); ?>;
}
.leftNav .menu .links{
	position: absolute;
	top: 5px;
	bottom: 200px;
	width: 250px;
	font-size: 30px;
	overflow-y: auto;
}
.leftNav .menu .bottom{
	position: absolute;
	bottom: 5px;

	font-size: 30px;
}
.leftNav .menu .bottom legend{
	font-weight: bold;
	color: <?php getFontMainColor(); ?>;
}
.leftNav .menu .bottom fieldset{
	width: 185px;
	border-radius: 8px;
	border-width: 2px;
	border-style: dashed;
	border-color:rgb(255,255,255);
	overflow: hidden;
}
.leftNav .menu .bottom #filedrag{
	font-weight: bold;
	text-align: center;
	padding: 1em 0;
	margin: 1em 0;
	color: #555;
	border: 2px dashed #555;
	border-radius: 7px;
	cursor: default;
}
.leftNav .menu .bottom #filedrag.hover{
	color: #f00;
	border-color: #f00;
	border-style: solid;
	box-shadow: inset 0 3px 4px #888;
}
.leftNav .menu .bottom pre{
	width: 95%;
	height: 8em;
	font-family: monospace;
	font-size: 0.9em;
	padding: 1px 2px;
	margin: 0 0 1em auto;
	border: 1px inset #666;
	background-color: #eee;
	overflow: auto;
}
.leftNav .menu .bottom #progress p{
	display: block;
	width: 240px;
	padding: 2px 5px;
	margin: 2px 0;
	border: 1px inset #446;
	border-radius: 5px;
	background: #eee url("/indexer/resources/progress.png") 100% 0 repeat-y;
}
.leftNav .menu .bottom #progress p.success{
	background: #0c0 none 0 0 no-repeat;
}
.leftNav .menu .bottom #progress p.failed{
	background: #c00 none 0 0 no-repeat;
}
.leftNav .leftNavTab{
	position: absolute;
	top: 48%;
	right: -2px;
	height: 40px;
	width: 20px;

	font-size: 30px;
	text-align: center;

	box-shadow: 3px 0px 10px rgba(0,0,0,0.5);
	border-top-right-radius: 7px;
	border-bottom-right-radius: 7px;

	background-color: <?php getSecondaryColor(); ?>;
}
.contentLoader{
	position: fixed;
	top: 50px;
	right: 10px;
	width: 65%;
	height: 70%;
	z-index: 1;

	overflow: hidden;
	overflow-y: auto;
}
.contentLoader .imgContent{
	position: relative;
	width: 100%;
	display: none;
}
.contentLoader .vidContent{
	position: relative;
	width: 100%;
	display: none;
}
.contentLoader .audContent{
	position: relative;
	width: 100%;
	display: none;
}
.imageIcon{
	position: fixed;
	right: 5px;
	bottom: 5px;
	height: 18%;
	z-index: 2;

	padding: 10px;
	background: <?php getMainColor(); ?>;
	background-image: url("/indexer/resources/stripe.png");
	background-position: 2px 0px;

	display: none;
}
.watermark{
	position: fixed;
	right: 15px;
	bottom: 15px;
	height: 18%;
	z-index: -5;
}



.insetBox{
	padding: 10px;

	border-radius: 10px;

	background-color: <?php getSecondaryColor(); ?>;
	box-shadow: 2px 2px 10px rgba(0,0,0,.5) inset, 2px 2px 10px rgba(255,255,255,.5);
}
.rotate90CW{
	transform: rotate(90deg);
	-webkit-transform: rotate(90deg);
	-moz-transform: rotate(90deg);
	-o-transform: rotate(90deg);
	-ms-transform: rotate(90deg);
}