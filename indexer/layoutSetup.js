if(window.attachEvent) {
	window.attachEvent('onload', layoutSetup);
	window.attachEvent('onresize', layoutSetup);
}
else if(window.addEventListener) {
	window.addEventListener('onload', layoutSetup, true);
	window.addEventListener('resize', layoutSetup, true);
}

function layoutSetup () {
	if($(window).width() > 500){
		$("#contentLoader").width($(window).width() - $("#content").width() - $("#content").position().left - 70);
		$("#contentLoader").height($("#watermark").position().top - 80);
		$("#copyright").css("right", "");
		$("#copyright").css("top", "");
		$("#copyright").css("left", $("#content").position().left + $("#content").width() - 28);
		$("#copyright").css("bottom", 82);
		$("#copyright").addClass("rotate90CW");
		$("#content").css("right", "70%");
		if($("#copyright").width() + 25 > ($(window).height() - ($("#contentLoader").offset().top + $("#contentLoader").outerHeight()))){
			$("#copyright").removeClass("rotate90CW");
			$("#copyright").css("left", $("#contentLoader").position().left);
			$("#copyright").css("bottom", ($(window).height() - ($("#contentLoader").offset().top + $("#contentLoader").outerHeight())) - 35);
		}
	}
	else{
		$("#copyright").removeClass("rotate90CW");
		$("#copyright").css("left", "");
		$("#copyright").css("bottom", "");
		$("#copyright").css("width", "");
		$("#copyright").css("right", 10);
		$("#copyright").css("top", 55);

		$("#content").css("right", 10);
	}
}