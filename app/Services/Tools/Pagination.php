<?php

namespace Services\Tools;

/**
 * Pagination
 */
class Pagination
{
    private $paginationFor;
    private $slug;
    private $nbId;
    private $limit;
    private $totalPage;
    private $pageStatus;
    private $html;

    public function __construct($paginationFor, $slug, $nbId, $limit = 5)
    {
        $this->paginationFor = $paginationFor;
        $this->slug = $slug;
        $this->nbId = $nbId;
        $this->limit = $limit;
        $this->totalPage = ceil($nbId / $limit);
        $this->setPageStatus();
    }

    public function getPageStatus()
    {
        return $this->pageStatus;
    }

    public function getHtml()
    {
        return $this->html;
    }

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

    private function prevExist($actualPage)
    {
        return ($actualPage - 1 >= 1);
    }

    private function nextExist($actualPage)
    {
        return ($actualPage + 1 <= $this->totalPage);
    }

    private function prevBlockExist($actualPage)
    {
        return ($actualPage - 3 >= 1);
    }

    private function nextBlockExist($actualPage)
    {
        return ($actualPage + 3 <= $this->totalPage);
    }

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



