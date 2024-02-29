<?php

namespace Classes;

class Programmer extends Human
{

    public array $languages;

    public int $years_of_work;

    public function __construct($name = "?", $surname = "?", $birthDate = null, $height = -1, $weight = -1, $languages=[], $years_of_work = 0)
    {
        parent::__construct($name, $surname, $birthDate, $height, $weight);
        $this->languages = $languages;
        $this->years_of_work = $years_of_work;
    }

    // Setters
    public function setLanguages(array $languages): self {
        $this->languages = $languages;
        return $this;
    }

    public function setYearsOfWork(int $years_of_work): self {
        $this->years_of_work = $years_of_work;
        return $this;
    }

    // Getters
    public function getLanguages(): array {
        return $this->languages;
    }

    public function getYearsOfWork(): int {
        return $this->years_of_work;
    }

    public function addLanguage($language): self{
        $this->languages[] = $language;

        return $this;
    }

    #[\Override] protected function messageAboutBirthdate(): void
    {
        echo "Народженння Programmer";
    }

    #[\Override] public function clearRoom()
    {
        echo "Clear room (programmer)";
    }

    #[\Override] public function clearKitchen()
    {
        echo "Clear kitchen (programmer)";
    }
}