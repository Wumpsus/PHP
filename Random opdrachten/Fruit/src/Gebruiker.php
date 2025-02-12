<?php

namespace MijnProject;

class Gebruiker {
    private string $naam;

    public function __construct(string $naam) {
        $this->naam = $naam;
    }

    public function getNaam(): string {
        return $this->naam;
    }
}