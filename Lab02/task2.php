<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="task">
        <div class="task-header">
            Task 1
        </div>

        <?php
            function displayReps($numbers): void{
                $freq = [];

                foreach($numbers as $num){
                    if(!isset($freq[$num])){
                        $freq[$num]=1;
                    }
                    else{
                        $freq[$num]++;
                    }
                }

                foreach($freq as $key => $value){
                    if($value > 1){
                        echo "
                            <div>
                                Value {$key} repeated more than once. ({$value} times)
                            </div>
                        ";
                    }
                }
            }

            displayReps([1, 2, 2, 3, 4, 5, 5, 2]);

        ?>
    </div>

    <div class="task">
        <div class="task-header">
            Task 2
        </div>

        <?php
            const MIN_SYLLABLE = 2;
            const MAX_SYLLABLE = 5;

            function generateName($syllables): string{
                shuffle($syllables);

                $syllable_count = rand(MIN_SYLLABLE, MAX_SYLLABLE);

                return join("", array_slice($syllables, 0, $syllable_count));
            }

            $slogans = ["ba", 're', 'di', 'non', 'pa', 'de', 'pu', 'shi', 'fu'];
            echo generateName($slogans);
        ?>
    </div>

    <div class="task">
        <div class="task-header">
            Task 3
        </div>

        <?php

        function generateArray(): array{
            $len = rand(3, 7);
            $arr = [];
            for($i = 0; $i < $len; $i++){
                $arr[$i] = rand(10, 20);
            }

            return $arr;
        }

        function joinAndRemoveDuplicates($arr1, $arr2): array{
            $merged = array_unique(array_merge($arr1, $arr2));

            sort($merged);

            return $merged;
        }

        $arr1 = generateArray();
        $arr2 = generateArray();

        $merged = joinAndRemoveDuplicates($arr1, $arr2);

        echo "<pre>";
        print_r($arr1);
        print_r($arr2);
        print_r($merged);
        echo "</pre>";
        ?>
    </div>

    <div class="task">
        <div class="task-header">
            Task 4
        </div>

        <?php
            const SORT_BY_NAME = 0;
            const SORT_BY_AGE = 1;

            function sortHumans(&$humans, $flag = SORT_BY_NAME): void{
                if($flag == SORT_BY_AGE){
                    asort($humans);
                }
                elseif($flag == SORT_BY_NAME){
                    ksort($humans, SORT_STRING);
                }
            }

            $humans = [
                "dima" => 18,
                "sasha" => 19,
                "dima2" => 20,
                "sveta" => 17,
                "anita" => 24,
            ];

            sortHumans($humans, SORT_BY_NAME);

            echo "<pre>";
            echo "Sorted by name";
            print_r($humans);

            sortHumans($humans, SORT_BY_AGE);
            echo "Sorted by age";
            print_r($humans);
            echo "</pre>";


        ?>
    </div>
</body>
</html>