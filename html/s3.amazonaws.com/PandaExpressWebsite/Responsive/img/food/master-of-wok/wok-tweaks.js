$(document).ready(function() {
	$('.s1').contents().each(function(){
	    this.textContent = this.textContent.replace('WokSmart','Wok Smart');
	});

	var fi = $("[aira-label='Mushroom Chicken']");
	fi.find("a").css("backgroundImage", "url(https://s3.amazonaws.com/PandaExpressWebsite/Responsive/img/food/thumbnails/grid_MushroomChicken.jpg)");
	fi.removeClass("c12 c12-s").addClass("c4-l c6-m c12-s");
	fi.find("div.five-flavor div.title-new").text("MUSHROOM CHICKEN").removeClass("title-new").addClass("title");
	fi.find("div.five-flavor img").hide();
	fi.find("div.five-flavor").removeClass("five-flavor");
	fi.find("div.file-flavor-details").removeClass("file-flavor-details");
});