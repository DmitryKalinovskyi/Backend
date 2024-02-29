<?php

namespace Classes;

class Student extends Human
{
    public int $course;

    public string $university;

    public string $faculty;

    public string $group;

    public function __construct($name = "?", $surname = "?", $birthDate = null, $height = -1, $weight = -1, $course = 1, $university="", $faculty="", $group="")
    {
        parent::__construct($name, $surname, $birthDate, $height, $weight);

        $this->course = $course;
        $this->university = $university;
        $this->faculty = $faculty;
        $this->group = $group;
    }

    public function moveToTheNextCourse(): void{
        $this->course++;
    }


    // Setters
    public function setCourse(int $course): self {
        $this->course = $course;
        return $this;
    }

    public function setUniversity(string $university): self {
        $this->university = $university;
        return $this;
    }

    public function setFaculty(string $faculty): self {
        $this->faculty = $faculty;
        return $this;
    }

    public function setGroup(string $group): self {
        $this->group = $group;
        return $this;
    }

    // Getters
    public function getCourse(): int {
        return $this->course;
    }

    public function getUniversity(): string {
        return $this->university;
    }

    public function getFaculty(): string {
        return $this->faculty;
    }

    public function getGroup(): string {
        return $this->group;
    }

    #[\Override]
    protected function messageAboutBirthdate(): void
    {
        echo "Народився Student";
    }

    #[\Override] public function clearRoom()
    {
        echo "Clear room (Student).";
    }

    #[\Override] public function clearKitchen()
    {
        echo "Clear kitchen (Student).";
    }
}