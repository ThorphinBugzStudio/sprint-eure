<?php

namespace Services\Tools;

/**
 * Pagination pour listing Back.
  */
class Pagination
{
    /**
     * But de la pagination.
     * Ex. 'Admin users pages navigation'.
     *
     * @var string
     */
    private $paginationFor;
    /**
     * Url du listing.
     * Transmis avec $this->generateUrl('nom_route').
     *
     * @var string
     */
    private $slug;
    /**
     * Nombre de lignes dans la bdd listée
     *
     * @var integer
     */
    private $nbId;
    /**
     * Nombre de lignes par page.
     *
     * @var integer
     */
    private $limit;
    /**
     * Nombre de pages en fonction de la limite.
     *
     * @var integer
     */
    private $totalPage;
    /**
     * Array de données pour la gestion de la pagination.
     * Recuperable dans le controller.
     *
     * @var array
     */
    private $pageStatus;
    /**
     * Html generé pour la barre de navigation.
     * Recuperable dans le controller et à transmettre à la vue.
     *
     * @var string
     */
    private $html;

    /**
     * Initialisation.
     *
     * @param string $paginationFor
     * @param string $slug
     * @param integer $nbId
     * @param integer $limit
     */
    public function __construct($paginationFor, $slug, $nbId, $limit = 5)
    {
        $this->paginationFor = $paginationFor;
        $this->slug = $slug;
        if (!$nbId > 0) {$nbId = 1;}
        $this->nbId = $nbId;
        $this->limit = $limit;
        $this->totalPage = ceil($nbId / $limit);
        $this->setPageStatus();
    }

    /**
     * Getter PageStatus.
     *
     * @return void
     */
    public function getPageStatus()
    {
        return $this->pageStatus;
    }

    /**
     * Getter Html.
     *
     * @return void
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Setter PageStatus
     *
     * @param integer $numPage
     * @return void
     */
    public function setPageStatus($numPage = 1)
    {
        if ($numPage > 0 && $numPage <= $this->totalPage)
        {
            $this->pageStatus = ['paginationFor' => $this->paginationFor,
                                 'limit'         => $this->limit,
                                 'offset'        => ($numPage - 1) * $this->limit,
                                 'prevExist'     => $this->prevExist($numPage),
                                 'actual'        => $numPage,
                                 'on'            => $this->totalPage,
                                 'nextExist'     => $this->nextExist($numPage),
                                 'prevBlockExist' => $this->prevBlockExist($numPage),
                                 'nextBlockExist' => $this->nextBlockExist($numPage)
                                ];

            $this->pageStatus['prevPageBlock'] = ($this->pageStatus['prevBlockExist']) ? $numPage - 3 : 1;
            $this->pageStatus['nextPageBlock'] = ($this->pageStatus['nextBlockExist']) ? $numPage + 3 : $this->totalPage;

            $this->pageStatus['prevPage'] = ($this->pageStatus['prevExist']) ? $numPage - 1 : $numPage;
            $this->pageStatus['nextPage'] = ($this->pageStatus['nextExist']) ? $numPage + 1 : $numPage;

            $this->createHtml();
        }
        else
        {
            $this->setPageStatus();
        }
    }

    /**
     * Existe t'il une page precedente.
     *
     * @param integer $actualPage
     * @return bool
     */
    private function prevExist($actualPage)
    {
        return ($actualPage - 1 >= 1);
    }

    /**
     * Existe t'il une page suivante.
     *
     * @param integer $actualPage
     * @return bool
     */
    private function nextExist($actualPage)
    {
        return ($actualPage + 1 <= $this->totalPage);
    }

    /**
     * Existe t'il un block precedent.
     *
     * @param integer $actualPage
     * @return bool
     */
    private function prevBlockExist($actualPage)
    {
        return ($actualPage - 3 >= 1);
    }

    /**
     * Existe t'il un block suivant.
     *
     * @param [type] $actualPage
     * @return void
     */
    private function nextBlockExist($actualPage)
    {
        return ($actualPage + 3 <= $this->totalPage);
    }

    /**
     * Generateur de html barre de navigation suivant la page actuelle demandée
     *
     * @return void
     */
    private function createHtml()
    {
        $this->html = '';

        $this->html .= '<nav aria-label="'.$this->pageStatus['paginationFor'].'">';
            $this->html .= '<ul class="pagination">';
                $this->html .= '<li class="page-item ';
                  if ($this->pageStatus['actual'] <= 1) { $this->html .= 'disabled'; }
                  $this->html .= '">';
                    $this->html .= '<a class="page-link" href="';
                      if ($this->pageStatus['prevBlockExist']) { $this->html .= $this->slug.'/'.$this->pageStatus['prevPageBlock']; }
                      else { $this->html .= $this->slug; }
                      $this->html .= '" aria-label="Previous">';
                        $this->html .= '<span aria-hidden="true">&laquo;</span>';
                        $this->html .= '<span class="sr-only">Previous</span>';
                    $this->html .= '</a>';
                $this->html .= '</li>';

                if ($this->pageStatus['prevExist'])
                  { $this->html .= '<li class="page-item"><a class="page-link" href="'.$this->slug.'/'.$this->pageStatus['prevPage'].'">'.$this->pageStatus['prevPage'].'</a></li>'; }

                $this->html .= '<li class="page-item active"><a class="page-link" href="';
                  $this->html .= $this->slug.'/'.$this->pageStatus['actual'].'">'.$this->pageStatus['actual'].'</a></li>';

                if ($this->pageStatus['nextExist'])
                  { $this->html .= '<li class="page-item"><a class="page-link" href="'.$this->slug.'/'.$this->pageStatus['nextPage'].'">'.$this->pageStatus['nextPage'].'</a></li>'; }

                $this->html .= '<li class="page-item ';
                  if ($this->pageStatus['actual'] >= $this->pageStatus['on']) { $this->html .= 'disabled'; }
                  $this->html .= '">';
                    $this->html .= '<a class="page-link" href="';
                      if ($this->pageStatus['nextBlockExist']) { $this->html .= $this->slug.'/'.$this->pageStatus['nextPageBlock']; }
                      else { $this->html .= $this->slug.'/'.$this->pageStatus['on']; }
                      $this->html .= '" aria-label="Next">';
                        $this->html .= '<span aria-hidden="true">&raquo;</span>';
                        $this->html .= '<span class="sr-only">Next</span>';
                    $this->html .= '</a>';
                $this->html .= '</li>';


            $this->html .= '</ul>';
        $this->html .= '</nav>';

    }

}
