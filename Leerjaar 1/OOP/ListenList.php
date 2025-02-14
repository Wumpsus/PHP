<?php
declare(strict_types=1);

class ListenList
{
    public array $music = [];

    /**
     * Voegt een muziekobject toe aan de ListenList array
     *
     * @param Music $music
     */
    public function addMusic(Music $music): void
    {
        $this->music[] = $music;
    }
}
