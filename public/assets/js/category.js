// =======================================
// • Afficher/masquer l'onglet
// ---------------------------------------
// Onglet : Catégorie
// =======================================
$('#category-article').on("click", function (event) {
  if(!$('#category_content').hasClass('hidden')) {
    $('#category_content').addClass('hidden');
    $('#category-article').addClass('fa-angle-down');
    $('#category-article').removeClass('fa-angle-up');
  } else {
      $('#category_content').removeClass('hidden');
      $('#category-article').addClass('fa-angle-up');
      $('#category-article').removeClass('fa-angle-down');
  }
});
