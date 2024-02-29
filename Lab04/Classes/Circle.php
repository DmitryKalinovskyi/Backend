<?php

namespace Classes;

class Circle
{
    private float $x;
    private float $y;
    private float $radius;

    public function GetX(): float{ return $this->x;}
    public function GetY(): float{ return $this->y;}
    public function GetRadius(): float{ return $this->radius;}

    public function SetX($x): Circle{$this->x = $x; return $this;}
    public function SetY($y): Circle{ $this->y = $y; return $this;}
    public function SetRadius($radius): Circle{ $this->radius = $radius; return $this;}


    public function __construct($x, $y, $radius)
    {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function __toString(): string
    {
        return "Circle in point ($this->x, $this->y) with radius $this->radius";
    }

    private static function getDist(float $x1, float $y1, float $x2, float $y2): float{
        $dx = abs($x1 - $x2);
        $dy = abs($y1 - $y2);

        return sqrt($dx ** 2 + $dy ** 2);
    }

    public function isIntersecting(Circle $other): bool{
        // if distance between is less than sum or radius - they intersect
        $dist = self::getDist($this->x, $this->y, $other->x, $other->y);

        $smaller = min($this->radius, $other->radius);
        $bigger = max($this->radius,  $other->radius);


        return ($this->radius + $other->radius) >= $dist && ($smaller + $dist) >= $bigger;
    }
}