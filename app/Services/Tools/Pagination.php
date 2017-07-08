<?php

namespace Services\Tools;

/**
 * Pagination
 */
class Pagination
{
    private $nbId;
    private $limit;
    private $totalPage;
    private $pageStatus;

    public function __construct($nbId, $limit = 5)
    {
        $this->nbId = $nbId;
        $this->limit = $limit;
        $this->totalPage = ceil($nbId / $limit);
        $this->setPageStatus();
    }

    public function getpageStatus()
    {
        return $this->pageStatus;
    }

    public function setPageStatus($numPage = 1)
    {
        if ($numPage > 0 && $numPage <= $this->totalPage)
        {
            $this->pageStatus = ['limit'     => $this->limit,
                                 'offset'    => ($numPage - 1) * $this->limit,
                                 'prevExist' => $this->prevExist($numPage),
                                 'actual'    => $numPage,
                                 'on'        => $this->totalPage,
                                 'nextExist' => $this->nextExist($numPage)
                                ];
            $this->pageStatus['prevPage'] = ($this->pageStatus['prevExist']) ? $numPage - 1 : $numPage;
            $this->pageStatus['nextPage'] = ($this->pageStatus['nextExist']) ? $numPage + 1 : $numPage;

        }
        else
        {
            $this->setPageStatus();
        }
    }

    private function prevExist($actualPage)
    {
        return ($actualPage -1 >= 1);
    }

    private function nextExist($actualPage)
    {
        return ($actualPage + 1 <= $this->totalPage);
    }

}