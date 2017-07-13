$( function() {
  $( "#dialog" ).dialog({
    autoOpen: false,
    resizable: false,
    draggable: false,
    closeOnEscape: true,
    position: {
      my: "right top",
      at: "right bottom",
      of: $("#basket")
    },
    show: {
      effect: "slideDown" ,
      duration: 500
    },
    hide: {
      effect: "slideUp",
      duration: 500
    }
  });

  $( "#opener" ).on( "click", function() {
    $( "#dialog" ).dialog( "open" );
    $('#options').removeClass('hidden');
  });
} );

//----------------------------- Traitement Panier-----------------------------//
