<?php $this->layout('layout', ['title' => 'Comment ça marche ?']) ?>

<?php $this->start('main_content') ?>

<div class="howTo">
  <div class="howTo-part1">

    <a href="<?= $this->assetUrl('img/howpics/12402.jpg') ?>" data-fancybox="imprimantes" data-caption>
      <img src="<?= $this->assetUrl('img/howpics/12402.jpg') ?>" alt="Imprimante 3D" class="float-right">
    </a>

    <p class="text-justify mt-3">L'impression 3D est un moyen de produire des objets physique directement
      à partir de fichiers numériques. Découvrez son fonctionnement et la façon dont
      elle complète les technologies traditionnelles en améliorant la conception produit,
      en rationalisant la fabrication et en forgeant de nouveaux modèles économiques.
    </p>

    <p class="text-justify mt-3">
      Mais au fait, comment ça marche une imprimante 3D ?
      Depuis les logiciels de conception assistée par Ordinateur (CAO) jusqu’à la
      création de l’objet, vous saurez tout du fonctionnement de l’imprimante 3D
      grâce à notre rubrique. Mais si le fonctionnement est une chose,
      le potentiel en est une autre et c’est bien pour cela que ces machines passionnent
      les designers et ingénieurs. Tout comme les artistes,
      cuisiniers ou médecins car l’imprimante 3D porte en elle de nombreuses promesses.
    </p>

    <div class="clear"></div>

    <a href="<?= $this->assetUrl('img/howpics/3d_printer.png') ?>" data-fancybox="imprimantes" data-caption>
      <img src="<?= $this->assetUrl('img/howpics/3d_printer.png') ?>" alt="Imprimante 3D" class="float-left mt-3">
    </a>

    <p class="text-justify mt-3">
      Peu encombrante et peu coûteuse (vis-à-vis des moyens de production « traditionnels »),
      elle est potentiellement le moyen pour n’importe quel quidam de concevoir et
      produire des objets usuels et disponibles en un rien de temps.
      Les débouchés sont multiples. Santé, développement économique ou tout simplement
      la création de la petite vis de substitution pour l’armoire de la salle à manger
      ou un double de ses clés.
    </p>

    <div class="clear"></div>

  </div>


  <div class="howTo-part2">
    <div class="container-fluid row pt-4 mainContent px-0">
      <h2>Génie Logiciel</h2>
      <hr class="hrPage">
    </div>

    <a href="<?= $this->assetUrl('img/howpics/pibot-extruder.jpg') ?>" data-fancybox="imprimantes" data-caption>
      <img src="<?= $this->assetUrl('img/howpics/pibot-extruder.jpg') ?>" alt="Imprimante 3D" class="float-right mt-3">
    </a>

    <p class="text-justify mt-3">
      En premier lieu, il convient de dessiner la forme souhaitée sur un logiciel de CAO
      (Conception Assistée par ordinateur).
      Il existe un nombre important de logiciels sur le marché qui permettent de créer
      ses modèles 3D (certains gratuits et/ou Open Source d’autres sont propriétaires).
      Les plans sont ensuite transmis à l’imprimante.
      Et la magie logicielle ne s’arrête pas là. L’imprimante est obligée de traiter
      cette modélisation 3D conformément à la logique de Fabrication Additive :
      c’est-à-dire découper la modélisation 3D en couche 2D.
      Un nouveau logiciel prend alors le pas pour créer ces découpes 2D et envoyer les instructions à l’imprimante.
    </p>


    <p class="text-justify mt-3">
      Autour de ces deux grandes fonctions, d’autres logiciels sont intégrés notamment
      pour assurer la communication entre l’imprimante et les ordinateurs
      (généralement dans des logiques de contrôle et de monitoring de l’extruder
      (le « stylet » de l’imprimante) ou des objets construits et/ou de l’imprimante 3D elle-même)
    </p>

    <div class="clear"></div>

  </div>



  <div class="howTo-part2">
    <div class="container-fluid row pt-4 mainContent px-0">
      <h2>Fonctionnement de l’imprimante 3D</h2>
      <hr class="hrPage">
    </div>

    <iframe class="float-left mt-3" id="howTovideo" type="text/html" width="720" height="405" src="https://www.youtube.com/embed/iydqB2Jlipw?autoplay=1&controls=0&disablekb=&fs=0&loop=1&modestbranding=1&playsinline=1&rel=0&showinfo=0&autohide=1&mute=1"></iframe>

    <p class="text-justify mt-3">
      L’imprimante 3D reçoit donc une série d’instructions mais plusieurs technologies
      existent pour passer de couches 2D à un objet 3D.
      Deux grands types de procédés sont en fait utilisés pour former les objets.
      Soit la matière travaillée peut entrer en fusion et au quel cas, elle peut être
      fondue peu à peu pour obtenir la forme souhaitée. Soit la matière peut être solidifiée
      sous l’action de la chaleur ou de la lumière (laser). Mais systématiquement,
      l’imprimante 3D « pense » couche par couche pour obtenir la forme 3D.
      Chacune des méthodes impliquent des qualités propres qui jouent sur la durée nécessaire
      à l’obtention de l’objet mais aussi la taille limite des objets .
    </p>

    <div class="clear"></div>

  </div>
</div>

<?php $this->stop('main_content') ?>
