$(document).ready(function(){
    $('.button-collapse').sideNav();
    $('.materialboxed').materialbox();
    $('select').material_select();


    
    
      $('.collapsible').collapsible();  
      $(".dropdown-button").dropdown({belowOrigin:true}) ;

        $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year


 
  });
  	$( "#telefono" ).on( "input", function() {
		if (this.value.length > 8) {
        this.value = this.value.slice(0,4); 
    }
		});

   
});

   

  