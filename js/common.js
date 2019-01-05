var inputTypeDate;
(function(){ // determine support for input type date
	inputTypeDate = document.createElement("input");
	inputTypeDate.setAttribute("type", "date");
	inputTypeDate = inputTypeDate.type == "date";
	//console.log(inputTypeDate);
})();

$(document).ready(function(){
	
	if(window.location.hash != ""){
		var tabId = window.location.hash;
		$("a[href='"+tabId+"']").trigger("click");
	}
	
	$("body").on("click", ".scoreCat", function(){
		var getScoreCat = "."+$(this).attr("data-scorecat");
		$(".userRating").each(function(){
			var hideReview = ($(this).has(getScoreCat).length)? true: false;
			if(!hideReview){
				$(this).hide();
			}else if(hideReview){
				$(this).show();
			}
		});
	});
	
	$("body").on("click", ".scoreCatShowAll", function(){
		$(".userRating").show();
	});
	
	$("body").on("click", ".jumpToReviews", function(event){
		var setReviewCat = $(this).attr("data-review");
		event.stopImmediatePropagation();
		$("a[href='#restReviews']").on("click");
		
		$("button[data-scorecat='"+setReviewCat+"']").trigger("click");
	});
	
	$(".preventDefault").click(function(event){
		event.preventDefault();
	});
	
	$("input").focus(function(){
		$(this)[0].select();
	});
	
	$('.carousel').carousel({
		interval: 5000,
		pause: 'hover'
	});
	
	$('#toolSessionExpired, #toolTipLocation').tooltip({
		placement: 'right'
	});
	
	$('#locationActive, #toolTipAccount').tooltip({
		placement: 'bottom'
	});
	
	$("div#validateBubble").blur(function(){
		$("div#validateBubble").hide("fast");
	});
		
	/* normal jquery components */
	
	$('#loginLink').click(function(){
		$('.loginBox > div').animate({top: '0px'}, {duration: 'fast'});
		$('#loginEmail').focus();
		console.log("login link");
	});
	
	$('#closeLogin').click(function(){
		$('.loginBox > div').animate({top: '-100px'}, {duration: 'fast'});
	});
	
	$("form").submit(function(){
		var loginRequired = $(this).attr('data-required-login');
		var	bubblePosition = $(this).attr('data-bubble-pos');
		if(loginRequired == 'true' && PageModel.UserInfo.LoggedUser == false){
			$("span#errorMessage").html('');
			var fieldPosition = $(this).find("input[type='submit']").offset(),
				fieldPositionLeft = fieldPosition.left,
				fieldPositionTop = fieldPosition.top,
				fieldError = PageModel.GenericErrors.ErrorNotLoggedIn;
			$("span#errorMessage").html(fieldError);
			showBubble(bubblePosition, fieldPositionLeft, (fieldPositionTop - 40));
			return false;
		}else{
			var allInputs = $(this).find('input[required="required"]');
			var	validationPassed = validate(allInputs, bubblePosition);
			if(validationPassed){
				console.log('validation passed');
				return true;
			}else{
				return false;
			}
		}
	});
	
	$(".clear_values").click(function(){
		$(this).siblings("input[type='submit']").attr("disabled", "disabled");
	});
	
	$("body").on("click", ".restName", function(){
		var restName = $(this).text();
		var restId = $(this).attr("data-restid");
		$("input.searchWidgetName").val(restName).attr('data-restid', restId);
		getWidgetRestData(restId);
		$(".searchWidgetFlyout").hide();
	});
	
	if(inputTypeDate){
		return;
	}
	
	$(document).on('click', '.skuPageSmoothScroll', function(){
		if (location.pathname.replace(/\//, '') == this.pathname.replace(/\//, '') && location.hostname == this.hostname){
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop : target.offset().top
				}, 300);
				return false;
			}
		}
	});
	
}); // ready ends

function sessionExpire(){
	$("#sessionExpired").modal({
		keyboard: false,
		backdrop: 'static'
	});
}

setTimeout(sessionExpire, 7200000);

function reservationSuccess(name,date,time,party){
	var breakDate = date.split("-");
	var breakTime = time.split(":");
	var date = new Date(Date.UTC(breakDate[0], parseInt(breakDate[1]) - 1, parseInt(breakDate[2]) + 1, 3, 0, 0));
	var time = new Date(0, 0, 0, breakTime[0], breakTime[1], 0);
	var modalElem = $("#reservationSuccess");
	modalElem.find("#restName").text(name);
	modalElem.find("#party").text(party);
	modalElem.find("#time").text(time.toLocaleTimeString(navigator.language, {hour: '2-digit', minute:'2-digit'}));
	modalElem.find("#date").text(date.toLocaleString('es-ES', { year: 'numeric', month: 'long', day: 'numeric' }));
	$("#reservationSuccess").modal({
		backdrop: 'static'
	});
}

function changeReservationSuccess(event_id){
	$("#viewChangedReservation").attr("href", "/profile/reservations/"+event_id);
	$("#changeReservationSuccess").modal({
		backdrop: 'static'
	});
}

function cancelReservationSuccess(){
	$("#cancelReservationSuccess").modal({
		backdrop: 'static'
	});
}
function createReviewSuccess(){
	$("#createReviewSuccess").modal({
		backdrop: 'static'
	});
}


function validateForms(formElem){
	var loginRequired = $(formElem).attr('data-required-login');
	var	bubblePosition = $(formElem).attr('data-bubble-pos');
	if(loginRequired == 'true' && PageModel.UserInfo.LoggedUser == false){
		$("span#errorMessage").html('');
		var fieldPosition = $(formElem).find("input[type='submit']").offset(),
			fieldPositionLeft = fieldPosition.left,
			fieldPositionTop = fieldPosition.top,
			fieldError = PageModel.GenericErrors.ErrorNotLoggedIn;
		$("span#errorMessage").html(fieldError);
		showBubble(bubblePosition, fieldPositionLeft, (fieldPositionTop - 40));
		return false;
	}else{
		var allInputs = $(formElem).find('[required="required"] ');
		var	validationPassed = validate(allInputs, bubblePosition);
		if(validationPassed){
			console.log('validation passed');
			return true;
		}else{
			return false;
		}
	}
}

