<?php

namespace Classes;

use \DateTime;
use Classes\IHouseCleaner;


abstract class Human implements IHouseCleaner
{
    public string $name;
    public string $surname;
    public DateTime $birthDate;
    public int $height;
    public float $weight;

    public function __construct($name = "?", $surname = "?", $birthDate=null, $height = -1, $weight = -1){
        $this->name = $name;
        $this->surname = $surname;
        $this->birthDate = $birthDate ?? new DateTime(); // If $birthDate is not provided, set it to current DateTime
        $this->height = $height;
        $this->weight = $weight;
    }

    protected abstract function messageAboutBirthdate(): void;

    public function birthChild(): void{
        $this->messageAboutBirthdate();
    }

    // Setters
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function setSurname(string $surname): self {
        $this->surname = $surname;
        return $this;
    }

    public function setBirthDate(DateTime $birthDate): self {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function setHeight(int $height): self {
        $this->height = $height;
        return $this;
    }

    public function setWeight(float $weight): self {
        $this->weight = $weight;
        return $this;
    }

    // Getters
    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function getBirthDate(): DateTime {
        return $this->birthDate;
    }

    public function getHeight(): int {
        return $this->height;
    }

    public function getWeight(): float {
        return $this->weight;
    }
}
