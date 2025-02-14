<?php
declare(strict_types=1);

class Music
{
    public string $name;
    public string $genre;
    public int $listen;
    public string $extraString;
    public int $extraInt;
    public string $anotherString1;
    public string $anotherString2;
    public int $anotherInt;
    public array $details;

    /**
     * @param string $name
     * @param string $genre
     * @param int $listen
     * @param string $extraString
     * @param int $extraInt
     * @param string $anotherString1
     * @param string $anotherString2
     * @param int $anotherInt
     */
    public function __construct(string $name, string $genre, int $listen, string $extraString, int $extraInt, string $anotherString1, string $anotherString2, int $anotherInt)
    {
        $this->name = $name;
        $this->genre = $genre;
        $this->listen = $listen;
        $this->extraString = $extraString;
        $this->extraInt = $extraInt;
        $this->anotherString1 = $anotherString1;
        $this->anotherString2 = $anotherString2;
        $this->anotherInt = $anotherInt;
        $this->details = [$name, $genre, $listen, $extraString, $extraInt, $anotherString1, $anotherString2, $anotherInt];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDetails(): string
    {
        return implode(", ", $this->details);
    }
}
