// $( function() {
//   $( "#dialog" ).dialog({
//     autoOpen: false,
//     resizable: false,
//     draggable: false,
//     closeOnEscape: true,
//     position: {
//       my: "right top",
//       at: "right bottom",
//       of: $("#basket")
//     },
//     show: {
//       effect: "slideDown" ,
//       duration: 500
//     },
//     hide: {
//       effect: "slideUp",
//       duration: 500
//     }
//   });
//
//   $( "#opener" ).on( "click", function() {
//     $( "#dialog" ).dialog( "open" );
//     $('#options').removeClass('hidden');
//   });
// } );

//----------------------------- Traitement Panier-----------------------------//
//-------------------------- desactivation du lien ---------------------------//
// $(document).ready(function() {
//   $(".btn_basket").on('click',function(event) {
//     console.log('Da fuck man');
//     var url = $(this).prop('href');
//     // $("#hopla").load(url);
//     event.preventDefault();
//   });
// });
//-----------------------  Ajout d'un article au Panier-----------------------//

function hortaxeMath()
{
  var total = htprices += $('.item_panier').val();
  return total;
}

$('.btn_basket').on("click",function (event)
{
  event.preventDefault();
  $('#basket_first_line').html('');


  $.ajax({
    type: "GET",
    url: $(this).attr('href'),
    dataType: "json",
    success: function(response){
      var htprices = [];
      $('.dropdown-item').prepend('<p class="item_panier">'+response.designation+' '+response.puht+' €</p>');
      var htprices = $('.item_panier').val();
      console.log(htprices);
    }
  })
});
//  var articleDesign = $('.article-designation').text();
//  var article = $('.single-article');
// //
//  //
//
// function art (price,designation)
// {
//   this.price = articlePrice.text();
//   this.designation = articleDesign.text();
// }
//
// art.prototype.articleLine = function()
// {
//   var basketLine  = this.designation + this.price;
//   return basketLine;
// }
//
//
// $('.btn_basket').on("click", function(event)
// {
//   event.preventDefault();
//   $('#basket_first_line').html('');
//
//   var articlePrice = $('.article-price').text();
//   console.log(articlePrice);
//
//
//   var singleArticle = new art(this.price,this.designation);
//   singleArticle.articleLine();
//   console.log(singleArticle.articleLine());
//
//
// });
