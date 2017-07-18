//----------------------------- Traitement Panier ----------------------------//

//-----------------------  Ajout d'un article au Panier ----------------------//

function addItem(array,element)
{
  array.push(element);

  return array;
}

function panierHt(array,key)
{
  var somme = 0;
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

function testPresence(array,article,key)
{
  var flag = 0;
  for(var i = 0; i<array.length; i++)
  {
    if (array[i][key] == article[key])
    {
      flag = 1;
    }
  }
  return flag;
}

var Panier = new Array();
var TabHt = new Array();

// Recuperation du panier au chargement de page
// getCookie('caddie');

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


//On crée un array Article à chaque ajout
      var Article = new Array();
          Article['id'] = response.id;
          Article['designation'] = linkValue;
          Article['puht'] = response.puht;
          Article['quantité'] = 1;
          Article['prixTotalht'] = response.puht;

          // On ajoute Article au tableau Panier
          var articlePresence = testPresence(Panier,Article,'id');
          // console.log(testPresence(Panier,Article,'id'));
          // On teste si l'article est déjà présent dans le panier
          if (articlePresence == 0)
          {
            // Si non, on l'ajoute
            addItem(Panier,Article);

            // On ajoute visuellement l' article et sa designation au panier
            //$('.dropdown-item').prepend('<p class="item_panier px-0" value="'+linkValue+'">'+response.designation+' '+' <br> <span>'+response.puht+'</span>'+' €'+'  '+'<input id="Qt" style="width:2.3em" class="col-3'+linkValue+'" type="number" min=1 value="'+Article['quantité']+'"><i id="delete_btn" value="'+linkValue+'" class="fa fa-times fa-close-basket" aria-hidden="true"></i></p>');
            $('.dropdown-item').prepend('<div class="item_panier row px-0 p-2" value="' + linkValue + '"> <i id="delete_btn" value="' + linkValue + '" class="fa fa-times fa-close-basket my-auto ml-auto" aria-hidden="true"></i> <p class="mr-auto">' + response.designation + '</p> <input id="Qt" class="' + linkValue + '" type="number" min=1 value="' + Article['quantité'] + '"> <br>' +  '<p class="col-6 px-0 ml-auto bold" style="text-align: end;">' + response.puht + ' €</p> </div>');
          }

    // On déclare ht qui calcule le prix ht
          var $ht = panierHt(Panier,'prixTotalht');

    // On affiche le prix ht ds le panier
          $('#total_ht').html($ht.toFixed(2)); //element.toFixed(nb)= 2chiffre après la "," ??? WTF ???

    // calcul du taux de tva par rapport au ht
          var vatRate = 20/100;
          var tvaTot = $ht * vatRate;

    // Affichage du prix de la TVA
          $('#total_tva').html(tvaTot.toFixed(2));

    // calcul du prix TTC
          var ttc = $ht + tvaTot;

    //Affichage du prix TTC
          $('#total_ttc').html(ttc.toFixed(2));

    //Calcul du nbre d'article
          var nbreArticles = Panier.length;
          $('#nbr_articles').html('('+nbreArticles+')');

         savePanier();

//------------------ Event pour les chngmnt quantités ------------------------//

          $('.dropdown-item').on("click",'#Qt',function (event)
          {
            //On recup la designation de l'article ciblé
            var ArticleDesignation = $(this).attr('class');

            //On le cherche dans le tableau Panier
            function tabVal(Panier)
            {
              return Panier.designation === ArticleDesignation;
            }

            //On le stocke ds une variable
            var ArticleToModify = Panier.find(tabVal);

            //On change la quantité ds le tableau
             ArticleToModify['quantité'] = $(this).val();

             //On stocke la quantité dans une variable
             var $quantité = ArticleToModify['quantité'];

             //On modifie le prix total ht dans le tableau de l'article
             ArticleToModify['prixTotalht'] = $quantité * ArticleToModify['puht'];

             //On recalcule le ht
             var $ht = panierHt(Panier,'prixTotalht');

             //On affiche le ht
               $('#total_ht').html($ht.toFixed(2));

               //calcul du taux de tva par rapport au ht
                     var vatRate = 20/100;
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

               savePanier();
          })



    },
    error: function (response)
    {
      console.log('erreur');
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
        var vatRate = 20/100;
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

    savePanier();
})

function getCookie(cname)
{
  // var name = cname + "=";
  console.log(document.cookie);
  var ca = document.cookie.split('|;');
//['caddie'].split('|')
  console.log(ca);


  for(var i = 0; i < ca.length; i++)
  {
    if (ca[i].substring(0, cname.length) == 'caddie')
    {
      if (ca[i].substr(7,1) != ';' )
      {
         $('#basket_first_line').html('');

         var articles = ca[i].substring(7, ca[i].length).split('|');
         console.log('articles');
         console.log(ca[i].substr(7,1));


         for (var j = 0; j < articles.length; j++)
         {
           articleObj = JSON.parse(articles[j]);
           console.log('articleObj');
           console.log(articleObj);

           var randomNb = Math.round(Rand(0, 10000)* 3.14);
           var linkValue = articleObj.designation+'_'+randomNb

           var Article = new Array();
           Article['id'] = articleObj.id;
           Article['designation'] = linkValue;
           Article['puht'] = articleObj.puht;
           Article['quantité'] = articleObj.quantité;
           Article['prixTotalht'] = articleObj.prixTotalht;

         console.log('Article');
         console.log(Article);

         addItem(Panier,Article);
         // $('.dropdown-item').prepend('<div class="item_panier row px-0" value="'+linkValue+'"><p class="col-6">'+articleObj.designation+' '+'</p> <input id="Qt" style="width:2.3em;" class="col-4 ' + linkValue+'" type="number" min=1 value="'+Article['quantité']+'"> <br>' + '<i id="delete_btn" value="'+linkValue+'" class="fa fa-times fa-close-basket my-auto ml-auto col-2" aria-hidden="true"></i> <p class="col-12 ml-auto">'+ articleObj.puht+' €</p> </div>');
         $('.dropdown-item').prepend('<div class="item_panier row px-0 p-2" value="' + linkValue + '"> <i id="delete_btn" value="' + linkValue + '" class="fa fa-times fa-close-basket my-auto ml-auto" aria-hidden="true"></i> <p class="mr-auto">' + articleObj.designation + '</p> <input id="Qt" class="' + linkValue + '" type="number" min=1 value="' + articleObj.quantité + '"> <br>' +  '<p class="col-6 px-0 ml-auto bold" style="text-align: end;">' + articleObj.puht + ' €</p> </div>');

       // On déclare ht qui calcule le prix ht
             var $ht = panierHt(Panier,'prixTotalht');
             console.log($ht)
       // On affiche le prix ht ds le panier
             $('#total_ht').html($ht.toFixed(2)); //element.toFixed(nb)= 2chiffre après la "," ??? WTF ???

       // calcul du taux de tva par rapport au ht
             var vatRate = 20/100;
             var tvaTot = $ht * vatRate;

       // Affichage du prix de la TVA
             $('#total_tva').html(tvaTot.toFixed(2));

       // calcul du prix TTC
             var ttc = $ht + tvaTot;

       //Affichage du prix TTC
             $('#total_ttc').html(ttc.toFixed(2));

       //Calcul du nbre d'article
             var nbreArticles = Panier.length;
             $('#nbr_articles').html('('+nbreArticles+')');

             $('.dropdown-item').on("click",'#Qt',function (event)
             {
              //On recup la designation de l'article ciblé
              var ArticleDesignation = $(this).attr('class');

              //On le cherche dans le tableau Panier
              function tabVal(Panier)
              {
                return Panier.designation === ArticleDesignation;
              }

              //On le stocke ds une variable
              var ArticleToModify = Panier.find(tabVal);

              //On change la quantité ds le tableau
              ArticleToModify['quantité'] = $(this).val();

              //On stocke la quantité dans une variable
              var $quantité = ArticleToModify['quantité'];

              //On modifie le prix total ht dans le tableau de l'article
              ArticleToModify['prixTotalht'] = $quantité * ArticleToModify['puht'];

              //On recalcule le ht
              var $ht = panierHt(Panier,'prixTotalht');

              //On affiche le ht
                 $('#total_ht').html($ht.toFixed(2));

                 //calcul du taux de tva par rapport au ht
                       var vatRate = 20/100;
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
                  savePanier();
            })
      }
   }



      console.log('Panier');
      console.log(Panier);
    }

  }


}

// event click bouton panier
$('#panier_validation').on("click", function (event)
{
  //Gestion de l'action du lien valider panier
  if(Panier.length == 0)
  {
    event.preventDefault();
  } else {

    savePanier();
   }
})



// Sauvegarde des articles present dans le panier dans un cookie 'caddie'
function savePanier()
{
   console.log(Panier);
   var test = '';
   for (var i = 0; i < Panier.length; ++i)
   {
     var articletest = Object.assign({}, Panier[i]);
     console.log(articletest);
     test += JSON.stringify(articletest) + '|';
         console.log(test);
   }

   console.log(test);
   console.log('click');

 setSession('caddie', test);
}

// Transfert du panier dans $_SESSION
function setSession(cname, cvalue)
{
  
  console.log('tossession');
  var url = window.location.href;
  var pos = url.indexOf('public');
  var newurl = url.substr(0, pos) + 'public/panier/tosession';

  console.log(url);
  console.log(pos);
  console.log(newurl);


  $.ajax({

    type: "POST",
    url: newurl,
    data: {'caddie': cvalue},
    dataType: "text",
    success: function(response)
    {
      console.log("Panier to $_SESSION success !");
    },
    error: function(response)
    {
      console.log("Panier to $_SESSION Error !");
    }
   });

  
}
