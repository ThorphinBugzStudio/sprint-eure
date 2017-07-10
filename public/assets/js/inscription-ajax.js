/**
 * Traitement ajax inscriptions
 */

// $('#sub-form').on('submit',function(e)
// {
//   //e.preventDefault();
//   console.log('hi there');
//   var form = $('#sub-form');
//
//   $('#error-firstname').empty();
//   $('#error-lastname').empty();
//   $('#error-email').empty();
//   $('#error-adress').empty();
//   $('#error-postal-code').empty();
//   $('#error-city').empty();
//   $('#error-country').empty();
//   $('#error-pseudo').empty();
//   $('#error-password').empty();
//   $('#error-avatar').empty();
//
//   $.ajax({
//         type: "POST",
//         url: form.attr("action"),
//         data: form.serialize(),
//         dataType: "json",
//         success: function(response){
//
//           if(response.success == true){
//
//             $('#sub-form').fadeOut(1000);
//             $('.container-fluid pt-2 pb-3').prepend('<h1 class="submitsuccess"><a class="successlink"href="index.php">Bravo vous êtes bien enregistré</a></h1>');
//
//           } else {
//             $('#error-firstname').html(response.error.firstname);
//             $('#error-lastname').html(response.error.lastname);
//             $('#error-email').html(response.error.email);
//             $('#error-adress').html(response.error.adress);
//             $('#error-postal-code').html(response.error.postal);
//             $('#error-city').html(response.error.city);
//             $('#error-country').html(response.error.country);
//             $('#error-pseudo').html(response.error.pseudo);
//             $('#eerror-password').html(response.error.password);
//             $('#error-avatar').html(response.error.avatar);
//           }
//         },
//           error: function(){
//             //console.log(response)
//             console.log('erreur là');
//           }
//   });
//
// });
