<?php

namespace test;

class FileContext
{
    public static string $dir = "test/data";

    public static function Read($filename): string{
        $path =  self::$dir."/$filename";

        $file = fopen($path, 'r');
        $data = fread($file, filesize($path));

        fclose($file);

        return $data;
    }

    public static function Write($filename, $data): void{
        $path = self::$dir."/$filename";

        $file = fopen($path, 'a');
        fwrite($file, $data);

        fclose($file);
    }

    public static function Clear($filename): void{
        $path = self::$dir."/$filename";
        $file = fopen($path, 'w');
        fclose($file);
    }


}