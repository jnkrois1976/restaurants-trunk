function validate(allInputs, bubblePosition){
	var isValid = true;
	$("span#errorMessage").html('');
	$(allInputs).each(function(){
		var fieldValue = $(this).val(),
			fieldPosition = $(this).offset(),
			fieldPositionLeft = fieldPosition.left,
			fieldPositionTop = fieldPosition.top,
			validationType = $(this).attr("type") || parseInt($(this).attr("rows")),
			fieldError;
		if($(this).attr("id") == "searchWidgetName" && $(this).attr("data-restid") == undefined){
			fieldError = PageModel.GenericErrors.ErrorInputEmpty;
			$("span#errorMessage").html(fieldError);
			showBubble(bubblePosition, fieldPositionLeft, fieldPositionTop);
			isValid = false;
			return false;
		}
		if(fieldValue === null || fieldValue === undefined || fieldValue === ""){
			debugger;
			if(validationType == "text" || 
				validationType == "date" || 
				validationType == "time" || 
				validationType == "email" || 
				validationType == "number" || 
				validationType == "password"){
				fieldError = PageModel.GenericErrors.ErrorInputEmpty;
			}else if(validationType == "select"){
				fieldError = PageModel.GenericErrors.ErrorSelectEmpty;
			}else if(validationType >= 0){
				fieldError = PageModel.GenericErrors.ErrorTextAreaEmpty;
			}else{
				fieldError = undefined;
			}
			$("span#errorMessage").html(fieldError);
			showBubble(bubblePosition, fieldPositionLeft, fieldPositionTop);
			isValid = false;
			return false;
		}else if(fieldValue.length > 0){
			var textRegex = /[a-zA-Z]/gi,
				emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
				numberRegex = /[0-9]/gi,
				dateRegex = /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/,
				timeRegex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
			if(validationType === "text"){
				if(!textRegex.test(fieldValue)){
					$("span#errorMessage").html(PageModel.GenericErrors.ErrorInputTextOnly);
					showBubble(bubblePosition, fieldPositionLeft, fieldPositionTop);
					isValid = false;
					return false;
				}
			}else if(validationType === "date"){
				if(!dateRegex.test(fieldValue)){
					$("span#errorMessage").html(PageModel.GenericErrors.ErrorValidDate);
					showBubble(bubblePosition, fieldPositionLeft, fieldPositionTop);
					isValid = false;
					return false;
				}
			}else if(validationType === "email"){
				if(!emailRegex.test(fieldValue)){
					$("span#errorMessage").html(PageModel.GenericErrors.ErrorValidEmail);
					showBubble(bubblePosition, fieldPositionLeft, fieldPositionTop);
					isValid = false;
					return false;
				}
			}else if(validationType === "number"){
				if(!numberRegex.test(fieldValue)){
					$("span#errorMessage").html(PageModel.GenericErrors.ErrorInputNumbersOnly);
					showBubble(bubblePosition, fieldPositionLeft, fieldPositionTop);
					isValid = false;
					return false;
				}
			}else if(validationType === "time"){
				if(!timeRegex.test(fieldValue)){
					$("span#errorMessage").html(PageModel.GenericErrors.ErrorValidTime);
					showBubble(bubblePosition, fieldPositionLeft, fieldPositionTop);
					isValid = false;
					return false;
				}
			}
		}
	});
	return isValid;
}

function showBubble(bubblePosition, fieldPositionLeft, fieldPositionTop){
	if(bubblePosition == "bottom"){
		$("#bubbleArrow").removeClass("validateArrow").addClass("validateArrowHeader");
		$("div#validateBubble").css({"left": + fieldPositionLeft , "top": + (fieldPositionTop - -40)}).fadeIn("fast").focus();
	}else{
		$("#bubbleArrow").removeClass("validateArrowHeader").addClass("validateArrow");
		$("div#validateBubble").css({"left": + fieldPositionLeft , "top": + (fieldPositionTop - +50)}).fadeIn("fast").focus();
	}
	
}
