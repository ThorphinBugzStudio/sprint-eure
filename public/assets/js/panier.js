//----------------------------- Traitement Panier-----------------------------//

//-----------------------  Ajout d'un article au Panier-----------------------//


function addItem(array,element)
{
  array.push(element);

  return array;
}

function panierHt(array,key)
{
  var somme = 0
  for ( i = 0; i < array.length; i++ )
  {
    somme += parseFloat(array[i][key])
  }
  return  somme;
}

// fonction qui efface un élément d'un tableau
function removeItem(array,element)
{
//lastIndexOf(element) = fonction qui renvoie le premier index ou se trouve l'elem cherché
  var deleteThis = array.lastIndexOf(element)
  //efface la valeur du tableau
    array.splice(deleteThis,1)
}

function Rand(min, max) {
  return Math.random() * (max - min) + min;
}

var Panier = new Array();

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
//génération d'un nbre aleatoire pour différencier les liens générés
      var randomNb = Math.round(Rand(0, 10000)* 3.14);
      var linkValue = response.designation+'_'+randomNb

//Ajout visuel des articles et leurs designations
      $('.dropdown-item').prepend('<p class="item_panier" value="'+linkValue+'">'+response.designation+' '+'<span>'+response.puht+'</span>'+' €'+'  '+'<i id="delete_btn" value="'+linkValue+'" class="fa fa-times-circle-o" aria-hidden="true"></i></p>');

//On crée un array Article à chaque ajout
      var Article = new Array();
          Article['id'] = response.id;
          Article['designation'] = linkValue;
          Article['puht'] = response.puht;

    //On ajoute Article au tableau Panier
          addItem(Panier,Article);

    //On declare ht qui calcule le prix ht
          var $ht = panierHt(Panier,'puht');

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
          var nbreArticles = Panier.length;
          $('#nbr_articles').html('('+nbreArticles+')');

    }
  })

});

//-----------------------  Enlever un article au Panier-----------------------//
$('.dropdown-item').on("click", '#delete_btn',function (event)
{

  //recup la designation de l'article séléctionné
   var clickedArticleDesignation = $(this).attr('value');
   console.log(clickedArticleDesignation)

//Fonction qui retourne la valeur du tableau correspondante à la designation selectionné
   function tabVal(Panier)
   {
     return Panier.designation === clickedArticleDesignation;
   }
// On stocke le résultat et ça devient l' article à supprimer du tableau
   var ArticleToRemove = Panier.find(tabVal);

//On supprime l'élément du tableau Panier
   removeItem(Panier,ArticleToRemove);

   //On declare newht qui calcule le nouveau prix ht
   var newHt = panierHt(Panier,'puht');
   if(newHt === 0)
   {
     Panier = [ ];
   }

//On affiche le nouveau prix ht
   if(newHt != NaN || newHt != null || newHt == Number)
   {
     $('#total_ht').html(newHt.toFixed(2))
   } else {
     $('#total_ht').html('0.00')
   }

//calcul du taux de tva par rapport au ht
        var vatRate = 20.20/100;
        var newTvaTot = newHt * vatRate;

//On affiche le nouveaux prix tva
        if(newTvaTot != NaN || newTvaTot != null || newTvaTot == Number)
        {
          $('#total_tva').html(newTvaTot.toFixed(2));
        } else {
          $('#total_tva').html('0.00')
        }

//calcul du nouveau prix TTC
              var newTtc = newHt + newTvaTot;

//Affichage du nouveau prix TTC
              if(newTtc != NaN || newTtc != null || newTtc == Number)
              {
                $('#total_ttc').html(newTtc.toFixed(2));
              } else {
                $('#total_ttc').html('0.00')
              }

   //Calcul du nbre d'article
         var nbreArticles = Panier.length;
         $('#nbr_articles').html('('+nbreArticles+')');

    //suppression visuelle de la ligne dans le panier
    $($(this)).parent().detach();
    $($(this)).detach();

})
