<?php

namespace Services\Tools;

/**
 * Outil Hervé
 */
class ToolHP
{
    /**
     * Now au format SQL pour insert bdd
     *
     * @return string
     */
    public static function nowSql()
    {
        $now = new \DateTime();
        
        return $now->format('Y-m-d H:i:s');
    }
}