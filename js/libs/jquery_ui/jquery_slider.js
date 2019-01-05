$(function() {
    $( "#sliderFood" ).slider({
      value:0,
      min: 1,
      max: 5,
      step: 1,
      slide: function( event, ui ) {
        $("#rateFood").val(ui.value);
      }
    });
    $("#rateFood").val($( "#sliderFood" ).slider("value"));
    
    $( "#sliderService" ).slider({
        value:0,
        min: 1,
        max: 5,
        step: 1,
        slide: function( event, ui ) {
          $("#rateService").val(ui.value);
        }
      });
      $("#rateService").val($( "#sliderService" ).slider("value"));
      
      $( "#sliderAmbient" ).slider({
          value:0,
          min: 1,
          max: 5,
          step: 1,
          slide: function( event, ui ) {
            $("#rateAmbient").val(ui.value);
          }
        });
        $("#rateAmbient").val($( "#sliderAmbient" ).slider("value"));
        
        $( "#sliderPrices" ).slider({
            value:0,
            min: 1,
            max: 5,
            step: 1,
            slide: function( event, ui ) {
              $("#ratePrices").val(ui.value);
            }
          });
          $("#ratePrices").val($( "#sliderPrices" ).slider("value"));
          
          $( "#sliderClean" ).slider({
              value:0,
              min: 1,
              max: 5,
              step: 1,
              slide: function( event, ui ) {
                $("#rateClean").val(ui.value);
              }
            });
            $("#rateClean").val($( "#sliderClean" ).slider("value"));
  });