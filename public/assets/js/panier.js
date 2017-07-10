$( function() {
  $( "#dialog" ).dialog({
    autoOpen: false,
    resizable: false,
    draggable: false,
    closeOnEscape: true,
    show: {
      effect: "slide",
      duration: 500
    },
    hide: {
      effect: "explode",
      duration: 1000
    }
  });

  $( "#opener" ).on( "click", function() {
    $( "#dialog" ).dialog( "open" );
  });
} );
