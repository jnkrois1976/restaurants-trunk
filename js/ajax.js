(function(){
	
	$.ajax({
		url: "/site_object/provinces",
		success: function(success){
			if(success){
				PageModel.Provinces = $.parseJSON(success);
			}
		}
	});
	
	$.ajax({
		url: "/site_object/error_messages",
		success: function(success){
			if(success){
				PageModel.GenericErrors = $.parseJSON(success);
			}
		}
	});
	
	$.ajax({
		url: "/site_object/server_error_messages",
		success: function(success){
			if(success){
				PageModel.ServerErrors = $.parseJSON(success);
			}
		}
	});
	
	$.ajax({
		url: "/site_object/user_info",
		success: function(success){
			if(success){
				PageModel.UserInfo = $.parseJSON(success);
			}
		}
	});
	
})();


$(document).ready(function(){
	
	$("#mainSearchInput").keyup(function(event){
		event.preventDefault();
		var mainSearchInput = $(this);
		if(mainSearchInput.val().length >= 3){
			var inputValue = mainSearchInput.val(),
				values = {input_value: inputValue},
				resultsList = $(".mainSearchResults"),
				categoryResults = $(".categoryResults");
			$.ajax({
				url: "/ajax/get_search_restaurants",
				type: "POST",
				data: values,
				success: function(success){
					if(success){
						PageModel.SearchSuggestions = $.parseJSON(success);
						resultsList.children().remove();
						categoryResults.children().remove();
						var resultsObj = PageModel.SearchSuggestions;
						var liResult = "";
						var liCategory= "";
						for(var x in resultsObj){
							liResult += "<li class='restName'><a href='/results/restaurant/"+ resultsObj[x].rest_id +"'>"+ PageModel.SearchSuggestions[x].rest_name +"</a></li>"
							liCategory += "<li class='restName'><a href='/results/categories/food/"+ resultsObj[x].rest_cuisine +"'>"+ PageModel.SearchSuggestions[x].rest_cuisine_name +"</a></li>"
						}
						resultsList.append(liResult);
						categoryResults.append(liCategory);
						
						/*var keys = [];
						for (var key in PageModel.SearchSuggestions) {
						  if (PageModel.SearchSuggestions.hasOwnProperty(key)) {
						    keys.push(key);
						  }
						}
						resultsList.children().remove();
						var i = 0;
						for(var x in PageModel.SearchSuggestions){
							resultsList.append("<li class='restName' data-restid='"+ keys[i] +"'>"+ PageModel.SearchSuggestions[x] +"</li>");
							i++;
						}*/
					}else{
						resultsList.children().remove();
						resultsList.append("<li>No tengo nada que sugerir</li>");
					}
					mainSearchInput.addClass("withFlyout");
					$(".mainSearchFlyout").show();
				}
			});
		}else if(mainSearchInput.val().length < 3){
			mainSearchInput.removeClass("withFlyout");
			$(".mainSearchFlyout").hide();
		}
	});
	
	$("select[data-province='update_province']").change(function(){
		var targetCounty = $("select[data-county='update_county']"),
			targetDistrict = $("select[data-district='update_district']"),
			userPreference = $("input[name='setLocation']"),
			selectedValue = $(this).val(),
			values = {user_province: selectedValue},
			x;
			targetCounty.attr('disabled', 'disabled').val("");
			targetCounty.children().remove();
			targetCounty.append("<option value=''>seleccione su cant&oacute;n...</option>");
			targetDistrict.attr('disabled', 'disabled').val("");
			targetDistrict.children().remove();
			targetDistrict.append("<option value=''>seleccione su distrito...</option>");
		if(selectedValue != ""){
			targetCounty.removeAttr('disabled');
			userPreference.removeAttr('disabled');
			$.ajax({
				url: "/ajax/get_counties",
				type: "POST",
				data: values,
				success: function(success){
					if(success){
						targetCounty.children().remove();
						PageModel.Counties = $.parseJSON(success);
						targetCounty.append("<option value=''>seleccione su cant&oacute;n...</option>");
						for(x in PageModel.Counties){
							targetCounty.append("<option value='"+PageModel.Counties[x]+"'>"+PageModel.Counties[x]+"</option>");
						}
					}
				}
			});
			$("input[type='submit']").removeAttr('disabled');
		}else if(selectedValue == ""){
			$("input[type='submit']").attr('disabled', 'disabled');
		}
	});
	
	$("select[data-county='update_county']").change(function(){
		var targetDistrict = $("select[data-district='update_district']"),
			selectedValue = $(this).val(),
			values = {user_county: selectedValue},
			x;
			targetDistrict.attr('disabled', 'disabled').val("");
			targetDistrict.children().remove();
			targetDistrict.append("<option value=''>seleccione su distrito...</option>");
		if(selectedValue != ""){
			targetDistrict.removeAttr('disabled');
			$.ajax({
				url: "/ajax/get_districts",
				type: "POST",
				data: values,
				success: function(success){
					if(success){
						targetDistrict.children().remove();
						PageModel.Districts = $.parseJSON(success);
						targetDistrict.append("<option value=''>seleccione su cant&oacute;n...</option>");
						for(x in PageModel.Districts){
							targetDistrict.append("<option value='"+PageModel.Districts[x]+"'>"+PageModel.Districts[x]+"</option>");
						}
					}
				}
			});
			
		}
	});
	
	$("#setUserLocation").click(function(event){
		event.preventDefault();
		var selectedUserProvince = $("#locationWidgetProvince").val(),
			selectedUserCounty = $("#locationWidgetCounty").val(),
			selectedUserDistrict = $("#locationWidgetDistrict").val(),
			selectedUserPreference = $("input:checked").val(),
			values = {user_province: selectedUserProvince, user_county: selectedUserCounty, user_district: selectedUserDistrict, user_preference: selectedUserPreference};
		$.ajax({
			url: "/ajax/set_location",
			type: "POST",
			data: values,
			success: function(success){
				console.log(success);
				if(success){
					location.reload();
				}
			}
		});
		
	});
	
	$("body").on("click", "a#nextMonth, #prevMonth", function(event){ 
		event.preventDefault();
		var getRestaurant = window.location.pathname.split('/');
		var getURL = $(this).attr("href");
		var breakUrl = getURL.split('/');
		var restId = (getRestaurant[3] != undefined)? getRestaurant[3]: '0';
		var eventType = $(this).attr('data-eventtype');
		var currentDate = new Date();
		var fullMonth = (currentDate.getMonth() < 10)? '0' + (currentDate.getMonth() + 1): (currentDate.getMonth() + 1);
		var currentDay =  '0';
		var values = {rest_id: restId, event_type: eventType, year: breakUrl[5], month: breakUrl[6], day: currentDay};
		$.ajax({
			url: "/ajax/get_ajax_calendar",
			type: "POST",
			data: values,
			success: function(success){
				if(success){
					$("#restCalendar").remove();
					$("#restEventCalendar").append(success);
					if(breakUrl[5] == currentDate.getFullYear() && breakUrl[6] == fullMonth){
						$("#prevMonth").hide();
					}else{
						$("#prevMonth").show();
					}
				}
			}
		});
		$.ajax({
			url: "/ajax/get_ajax_events",
			type: "POST",
			data: values,
			success: function(success){
				if(success){
					console.log("success");
					$(".eventDescription").remove();
					$("#eventDescWrapper").append(success);
				}else{
					console.log("failed");
				}
			}
		});
	}); // body on click ends
		
	$("body").on("click", "a.getEvents", function(event){
		//console.log("clicked events");
		event.preventDefault();
		var getURL = $(this).attr("href");
		var breakUrl = getURL.split('/');
		var restId = $(this).attr('data-restid');
		var eventType = $(this).attr('data-eventtype');
		var values = {rest_id: restId, event_type: eventType, year: breakUrl[5], month: breakUrl[6], day: breakUrl[7]};
		$.ajax({
			url: "/ajax/get_ajax_events",
			type: "POST",
			data: values,
			success: function(success){
				if(success){
					//console.log(success);
					$(".eventDescription").remove();
					$("#eventDescWrapper").append(success);
				}
			}
		});
	});
	
	$("body").on("click", ".rsvpEvent", function(event){
		event.preventDefault();
		if(PageModel.UserInfo.LoggedUser == false){
			$("span#errorMessage").html('');
			var	bubblePosition = $(this).attr('data-bubble-pos');
			var fieldPosition = $(this).offset(),
				fieldPositionLeft = fieldPosition.left,
				fieldPositionTop = fieldPosition.top,
				fieldError = PageModel.GenericErrors.ErrorNotLoggedIn;
			$("span#errorMessage").html(fieldError);
			showBubble(bubblePosition, fieldPositionLeft, (fieldPositionTop - 40));
			return false;
		}else{
			var eventId = $(this).attr("data-eventid");
			var eventValues = {event_id: eventId};
			$.ajax({
				url: "/ajax/get_current_event",
				type: "POST",
				data: eventValues,
				success: function(success){
					if(success){
						PageModel.CurrentEvent = $.parseJSON(success);
						$("#restId").val(PageModel.CurrentEvent.rest_id);
			        	$("#eventId").val(PageModel.CurrentEvent.event_id);
					}
				}
			});
			var restValues = {rest_id: $(this).attr("data-restid")};
			$.ajax({
				url: "/ajax/get_widget_restaurant",
				type: "POST",
				data: restValues,
				success: function(success){
					if(success){
						PageModel.CurrentWidgetRestaurant = $.parseJSON(success);
					}else{
						console.log("failed");
					}
				}
			});
		}
	});
	
	$("body").on("click", ".changeReservation", function(event){
		event.preventDefault();
		if(PageModel.UserInfo.LoggedUser == false){
			$("span#errorMessage").html('');
			var	bubblePosition = $(this).attr('data-bubble-pos');
			var fieldPosition = $(this).offset(),
				fieldPositionLeft = fieldPosition.left,
				fieldPositionTop = fieldPosition.top,
				fieldError = PageModel.GenericErrors.ErrorNotLoggedIn;
			$("span#errorMessage").html(fieldError);
			showBubble(bubblePosition, fieldPositionLeft, (fieldPositionTop - 40));
			return false;
		}else{
			var eventId = $(this).attr("data-eventid");
			var eventValues = {event_id: eventId};
			$.ajax({
				url: "/ajax/get_current_event",
				type: "POST",
				data: eventValues,
				success: function(success){
					if(success){
						PageModel.CurrentEvent = $.parseJSON(success);
			        	$("#changeEventId").val(PageModel.CurrentEvent.event_id);
					}
				}
			});
		}
	});
	
	$("body").on("click", ".cancelReservation", function(event){
		event.preventDefault();
		if(PageModel.UserInfo.LoggedUser == false){
			$("span#errorMessage").html('');
			var	bubblePosition = $(this).attr('data-bubble-pos');
			var fieldPosition = $(this).offset(),
				fieldPositionLeft = fieldPosition.left,
				fieldPositionTop = fieldPosition.top,
				fieldError = PageModel.GenericErrors.ErrorNotLoggedIn;
			$("span#errorMessage").html(fieldError);
			showBubble(bubblePosition, fieldPositionLeft, (fieldPositionTop - 40));
			return false;
		}else{
			var eventId = $(this).attr("data-eventid");
			var eventValues = {event_id: eventId};
			$.ajax({
				url: "/ajax/get_current_event",
				type: "POST",
				data: eventValues,
				success: function(success){
					if(success){
						PageModel.CurrentEvent = $.parseJSON(success);
			        	$("#cancelEventId").val(PageModel.CurrentEvent.event_id);
					}
				}
			});
		}
	});
	
	$(".searchWidgetName").keyup(function(){
		var nameInput = $(this),
			charMin = nameInput.val().length;
		if(charMin >= 3){
			var nameValue = nameInput.val(),
				values = {name_value: nameValue},
				resultsList = nameInput.next().children("ul");
			$.ajax({
				url: "/ajax/get_matched_restaurants",
				type: "POST",
				data: values,
				success: function(success){
					if(success){
						PageModel.SearchSuggestions = $.parseJSON(success);
						var keys = [];
						for (var key in PageModel.SearchSuggestions) {
						  if (PageModel.SearchSuggestions.hasOwnProperty(key)) {
						    keys.push(key);
						  }
						}
						resultsList.children().remove();
						var i = 0;
						for(var x in PageModel.SearchSuggestions){
							resultsList.append("<li class='restName' data-restid='"+ keys[i] +"'>"+ PageModel.SearchSuggestions[x] +"</li>");
							i++;
						}
					}else{
						resultsList.children().remove();
						resultsList.append("<li>No tengo nada que sugerir</li>");
					}
					$(".searchWidgetFlyout").fadeIn("fast");
				}
			});
		}
	});
	
	$("#reservationWidgetSubmit").click(function(event){
		event.preventDefault();
		var searchWidgetName = $("#searchWidgetName").val();
		var verifyAlphaNum = /\d/;
		var verifyRestId = verifyAlphaNum.test($("#searchWidgetName").attr("data-restid"));
		if(verifyRestId == false){
			validateForms($(this).parents("form"));
		}
		var formValidated = validateForms($(this).parents("form"));
		if(formValidated){
			var userInfObj = PageModel.UserInfo,
			restInfObj = PageModel.CurrentWidgetRestaurant,
			values = {
				user_id: userInfObj.UserId, 
				user_fullname: userInfObj.UserFullName,
				user_email: userInfObj.UserEmail,
				user_phone: userInfObj.UserPhone,
				rest_id: restInfObj.rest_id,
				rest_name: restInfObj.rest_name,
				rest_province: restInfObj.rest_province,
				rest_county: restInfObj.rest_county,
				rest_district: restInfObj.rest_district,
				rest_address: restInfObj.rest_address,
				rest_email: restInfObj.rest_email,
				rest_website: restInfObj.rest_website,
				rest_phone: restInfObj.rest_phone,
				rest_hours: restInfObj.rest_hours,
				rest_credit_cards: restInfObj.rest_credit_cards,
				rest_slogan: restInfObj.rest_slogan,
				reservation_date: $("#reservationWidgetDate").val(),
				reservation_time: $("#reservationWidgetTime").val(),
				reservation_party: $("#reservationWidgetParty").val()
			};
			$.ajax({
				url: "/ajax/request_reservation",
				type: "POST",
				data: values,
				success: function(success){
					if(success){
						reservationSuccess(values.rest_name, values.reservation_date, values.reservation_time, values.reservation_party);
						console.log("success");
					}else{
						console.log("failed");
					}
				}
			});
		}
	}); // reservationWidgetSubmit ends
	
	$("#eventReservationRequest").click(function(event){
		event.preventDefault();
		var userInfObj = PageModel.UserInfo,
			eventInfObj = PageModel.CurrentEvent,
			restInfObj = PageModel.CurrentWidgetRestaurant,
			values = {
				user_id: userInfObj.UserId, 
				user_fullname: userInfObj.UserFullName,
				user_email: userInfObj.UserEmail,
				user_phone: userInfObj.UserPhone,
				rest_id: eventInfObj.rest_id,
				rest_name: eventInfObj.rest_name,
				rest_province: restInfObj.rest_province,
				rest_county: restInfObj.rest_county,
				rest_district: restInfObj.rest_district,
				rest_address: restInfObj.rest_address,
				rest_email: restInfObj.rest_email,
				rest_website: restInfObj.rest_website,
				rest_phone: restInfObj.rest_phone,
				rest_hours: restInfObj.rest_hours,
				rest_credit_cards: restInfObj.rest_credit_cards,
				rest_slogan: restInfObj.rest_slogan,
				event_id: eventInfObj.event_id,
				event_name: eventInfObj.event_name,
				reservation_date: eventInfObj.event_fulldate,
				reservation_time: eventInfObj.event_time,
				reservation_party: $("#eventGuests").val()
			};
		$.ajax({
			url: "/ajax/request_reservation",
			type: "POST",
			data: values,
			success: function(success){
				if(success){
					$("#rsvpEvent").modal('hide');
					reservationSuccess(values.rest_name, values.reservation_date, values.reservation_time, values.reservation_party);
					console.log("success");
				}else{
					console.log("failed");
				}
			}
		});
	}); //eventReservationRequest eds
	
	$("#changeReservationRequest").click(function(event){
		event.preventDefault();
		var eventInfObj = PageModel.CurrentEvent,
			values = {
				event_id: eventInfObj.event_id,
				reservation_time: $("#changeEventTime").val(),
				reservation_party: $("#changeEventGuests").val()
			};
		$.ajax({
			url: "/ajax/change_reservation",
			type: "POST",
			data: values,
			success: function(success){
				if(success){
					$("#changeReservationModal").modal('hide');
					changeReservationSuccess(values.event_id);
					console.log("success");
				}else{
					console.log("failed");
				}
			}
		});
	}); //eventReservationRequest eds
	
	$("#cancelReservationRequest").click(function(event){
		event.preventDefault();
		var eventInfObj = PageModel.CurrentEvent,
			values = {event_id: eventInfObj.event_id};
		$.ajax({
			url: "/ajax/cancel_reservation",
			type: "POST",
			data: values,
			success: function(success){
				if(success){
					$("#cancelReservation").modal('hide');
					cancelReservationSuccess();
					console.log("success");
				}else{
					console.log("failed");
				}
			}
		});
	}); //cancelReservationRequest eds
	
	$("#createUserReview").click(function(event){
		event.preventDefault();
		if(validateForms($(this).parents("form"))){
			var foodInt = parseInt($("#rateFood").val());
			var serviceInt = parseInt($("#rateService").val());
			var ambientInt = parseInt($("#rateAmbient").val());
			var pricesInt = parseInt($("#ratePrices").val());
			var cleanInt = parseInt($("#rateClean").val());
			var userInfObj = PageModel.UserInfo,
				values = {
					rest_id: $("#reviewRestId").val(),
					user_id: userInfObj.UserId,
					user_name: userInfObj.MemberName,
					user_province: userInfObj.UserProvince, 
					rating_date: $("#reviewDate").val(),
					user_review: $("#userReview").val(),
					rating_food: foodInt,
					rating_service: serviceInt,
					rating_ambient: ambientInt,
					rating_prices: pricesInt,
					rating_clean: cleanInt,
					rating_average: parseFloat((foodInt+serviceInt+ambientInt+pricesInt+cleanInt) / 5)
				};
			$.ajax({
				url: "/ajax/create_user_review",
				type: "POST",
				data: values,
				success: function(success){
					if(success){
						$("#createReview").modal('hide');
						createReviewSuccess();
						console.log("success");
					}else{
						console.log("failed");
					}
				}
			});
		}
	}); // reservationWidgetSubmit ends

}); // ready ends

function getWidgetRestData(restId){
	var values = {rest_id: restId};
	$.ajax({
		url: "/ajax/get_widget_restaurant",
		type: "POST",
		data: values,
		success: function(success){
			if(success){
				PageModel.CurrentWidgetRestaurant = $.parseJSON(success);
			}else{
				console.log("failed");
			}
		}
	});
}
