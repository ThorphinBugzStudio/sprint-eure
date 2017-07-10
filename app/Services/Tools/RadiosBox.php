<?php

namespace Services\Tools;

/**
 * Form avec radio button pour gerer les changement de roles/status.
 * Passer à la vue un getHtml de l'objet.
 * Dans la vue -> echo de la variable passée pour afficher le groupe de radio buttons.
 */
class RadiosBox
{

   /**
    * Legende du groupe de radio buttons.
    * Pas d'accent ou de caracteres à la noix : urilisé dans le html.
    *
    * @var string
    */
   private $legend;
   /**
    * Tableau des differents bouttons ['Label' => 'valeur'].
    * ex. ['Client' => 'client', 'Administrateur' => 'admin']
    *
    *  @var array
    */
   private $radios;
   /**
    * Bouton coché à l'affichage du groupe de bouttons.
    * A set ou construire via find dans le controller.
    * ex. $userToUpdate = $users->find($id);
    * $userToUpdate['status']
    *
    *  @var string
    */
   private $checked;
   /**
    * html du groupe de radio buttons
    *
    *  @var string
    */
   private $html;

   /**
    * Initialisation du groupe de boutons radio.
    * @param string $legend Legende du groupe de radio buttons.
    * @param array $radios  Tableau des differents bouttons ['Label' => 'valeur'].
    * @param sting $checked string matchant valeur de $radios pour coche à l'affichage du groupe de bouttons.
    */
   public function __construct($legend = null, $radios = null, $checked = null)
   {
      $this->legend = $legend;
      $this->radios = $radios;
      $this->checked = $checked;
      $this->createHtml($this->radios);
   }

   /**
    * Getter html du groupe de buttons
    * @return string
    */
   public function getHtml()
   {
      return $this->html;
   }

   /**
    * setter du html pour le groupe de bouttons
    * @param  array $radios [description]
    * @return void
    */
   private function createHtml($radios)
   {
      $this->html = null;

      $this->html .= '<fieldset class="form-group">';
         $this->html .= '<legend>'.$this->legend.'</legend>';

            $i = 1;
            foreach ($this->radios as $radio => $value)
            {
               $this->html .= '<div class="form-check">';
                  $this->html .= '<label class="form-check-label">';

                     $this->html .= '<input type="radio" class="form-check-input" name="optionsRadios'.$this->legend.'" id="options'.$this->legend.$i.'" value="'.$value.'"';
                     // gestion checked initial
                     if ((empty($this->checked) && $i == 1) || ($value == $this->checked))
                     {
                        $this->html .= ' checked>';
                     }
                     else
                     {
                        $this->html .= '>';
                     }
                        $this->html .= $radio;
                  $this->html .= '</label>';
               $this->html .= '</div>';
               $i ++ ;
            }

      $this->html .= '</fieldset>';
      // $this->html .= '<button type="submit" class="btn btn-primary">Submit</button>';
   }
}
