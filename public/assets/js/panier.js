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

//-----------------------  Ajout d'un article au Panier-----------------------//

var Panier = new Array();


function addItem(array,element)
{
  array.push(element);

  return array;

}

var $ht = 0; // Utile pour la boucle sinn elle redémarre tjrs à 0 WTF MAn!

function panierHt(array,key)
{
  for ( i = 0; i < array.length; i++ )
  {
    if($ht)
    {
      var somme = $ht;
    } else {

      var somme = 0
    }

    somme += parseFloat(array[i][key])
  }
  return $ht = somme;
}



// function removeItem(array,element)
// {
//   array.splice(element);
// }
//
function Rand(min, max) {
  return Math.random() * (max - min) + min;
}

$('.btn_basket').on("click",function (event)
{
  event.preventDefault();
  $('#basket_first_line').html('');

  $.ajax({
    type: "GET",
    url: $(this).attr('href'),
    dataType: "json",
    success: function(response)
    {
//Ajout visuel des articles et leurs designations
      $('.dropdown-item').prepend('<p class="item_panier">'+response.designation+' '+'<span>'+response.puht+'</span>'+' €'+'  '+'<i id="delete_btn_'+response.id+'" class="fa fa-times-circle-o" aria-hidden="true"></i></p>');

//On crée un array Article à chaque ajout
      var Article = new Array();
          Article['id'] = response.id;
          Article['designation'] = response.designation;
          Article['puht'] = response.puht;

    //On ajoute Article au tableau Panier
          $panier = addItem(Panier,Article);
    //declare ht qui calcule le prix ht
          var $ht = panierHt($panier,'puht');

    console.log($ht)
    //On affiche le prix ht ds le panier
          $('#total_ht').html($ht.toFixed(2)); //element.toFixed(nb)= 2chiffre après la "," ??? WTF ???
    //calcul du taux de tva par rapport au ht
          var vatRate = 20.20/100;
          var tvaTot = $ht * vatRate;
    //Affichage du prix de la TVA
          $('#total_tva').html(tvaTot.toFixed(2));
    //calcul du prix TTC
          var ttc = $ht + tvaTot;
    //Affichage du prix TTC
          $('#total_ttc').html(ttc.toFixed(2));

    //Calcul du nbre d'article
          var nbreArticles = $panier.length;
          $('#nbr_articles').html('('+nbreArticles+')');

    }
  })
});

//-----------------------  Enlever un article au Panier-----------------------//

      // $('.dropdown-item').on("click", '#delete_btn',function (event)
      // {
      //   //console.log(this.nodeName)
      //   //var line = this.closest('i');
      //   if ($(this).change())
      //   {
      //     var htArticle = $($(this)).parent().children().html();
      //       for(var i = 0; i < htPrices.length; i++)
      //       {
      //         if(htPrices[i] == htArticle)
      //         {
      //             htPrices.splice(htPrices[i].value);
      //             break;
      //         }
      //       }
      //     $($(this)).parent().detach();
      //     $($(this)).detach();
      //   }





      // })
