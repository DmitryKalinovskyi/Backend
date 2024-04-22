<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My News site</title>
    <link rel="stylesheet" href="/mvc-example/public/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Bootstrap images -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<nav class="navbar bg-body-tertiary d-flex justify-content-between align-items-center p-2 gap-2">
    <img class="img-header" src="https://media.ztu.edu.ua/wp-content/uploads/2020/02/Group-6-1-1536x465.png ">

    <div class="search flex-grow-1 mx-5">
            <form>
        <div class="input-group">
                <input name="title" type="text" class="form-control" placeholder="Search about...">
                <button class="btn btn-primary"><i class="bi bi-search"></i></button>
        </div>
            </form>
    </div>

    <!-- <div class="buttons">
        <button class="btn">
        </button>
    </div> -->
    <?php if($_SESSION['logged_in']): ?>

    <div class="d-flex">
        <form method="post" action="authenticate/logout">
            <button class="btn">
                Logout
            </button>
        </form>
        <a class="btn" href="profile">
            Profile
        </a>
    </div>


    <?php else: ?>
        <div class="auth">
            <a class="btn " href="authenticate/login">
                Sign in
            </a>
            <a class="btn " href="authenticate/register">
                Sign up
            </a>
        </div>
    <?php endif;?>
</nav>

<div class="container mb-5">
    <div class="row g-4 mt-4">
        <?php

        use MVCExample\models\NewsTopic;

        function displayNewsCard(NewsTopic $newsTopic): void{
            ?>
            <div class="col-6">
                <div class="news-topic card">
                    <a href="<?php echo $newsTopic->newsReference; ?>">
                        <img class="card-img-top" src="<?php echo $newsTopic->imageUrl; ?>">

                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $newsTopic->title; ?>
                        </h5>
                        <div>
                            <?php echo $newsTopic->description; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        /** @var array $news */
        /** @var NewsTopic $newsTopic */
        foreach($news as $newsTopic){
            displayNewsCard($newsTopic);
        }

        if(empty($news)){
            echo "There are no news today.";
        }

//        $news = [
//            new NewsItem("https://news.ztu.edu.ua/2024/01/global-game-jam-2024-lokatsiya-zhytomyrska-politehnika-rozpochynayemo-pidgotovchyj-tyzhden/",
//                "https://news.ztu.edu.ua/wp-content/uploads/2024/01/frame-18754.jpg",
//                "Global Game Jam 2024, локація Житомирська політехніка: розпочинаємо підготовчий тиждень",
//                "Вже 20 січня буде оголошено тему Global Game Jam 2024, тому вже від сьогодні, 15-го січня, починається підготовчий тиждень до джему!
//
//        Протягом цього тижня центральний оргкомітет Global Game Jam та спільноти учасників по країнах і на всіх локаціях влаштовують серію заходів для розробників ігор. Це майстер-класи, вебінари, лекції, спілкування, презентації."
//            ),
//            new NewsItem("https://news.ztu.edu.ua/2024/01/studenty-zhytomyrskoyi-politehniky-peremogly-u-legkoatletychnyh-zmagannyah/",
//                "https://news.ztu.edu.ua/wp-content/uploads/2024/01/frame-18661.jpg",
//                "Студенти Житомирської політехніки перемогли у легкоатлетичних змаганнях",
//                "Всеукраїнські змагання з легкої атлетики у приміщенні «Різдвяні старти»
//
//6-7 січня 2024 р. в  м. Києві пройшли традиційні XXIX Всеукраїнські змагання з легкої атлетики у приміщенні «Різдвяні старти».
//
//На дистанції 60 метрів з бар’єрами з результатом 8,17 сек. II місце посів студент спеціальності 121 «Інженерія програмного забезпечення» Багінський Дмитро."
//            ),
//            new NewsItem("https://news.ztu.edu.ua/2023/12/uchast-studentiv-fakultetu-informatsijno-kompyuternyh-tehnologij-u-finali-icpc-ukraine-2023/",
//                "https://news.ztu.edu.ua/wp-content/uploads/2023/12/img_20231214_164234_781.png",
//                "Участь студентів факультету інформаційно-компютерних технологій у фіналі ICPC-Ukraine 2023",
//                "8-9 грудня на базі Львівського національного університету імені Івана Франка відбувся фінал студентської командної олімпіади з програмування ICPC-Ukraine 2023. Цей етап олімпіади є міжнародним, і є одночасно півфіналом студентської першості світу з програмування ІСРС (International Collegiate Programming Contest) по південно-східній Європі SEERC 2023."
//            ),
//            new NewsItem("https://news.ztu.edu.ua/2023/11/uchast-studentiv-fakultetu-informatsijno-kompyuternyh-tehnologij-u-2-mu-etapi-icpc-ukraine-2023/",
//                "https://news.ztu.edu.ua/wp-content/uploads/2023/11/frame-18651-2.png",
//                "Участь студентів факультету інформаційно-комп’ютерних технологій у 2-му етапі ICPC-Ukraine 2023",
//                "28 жовтня відбувся другий етап етап студентської командної олімпіади з програмування ICPC-Ukraine 2023. Олімпіада проходила на базі Національного університету біоресурсів і природокористування, м. Київ. Ці змагання є найбільшою студентською командною олімпіадою з програмування.")
//        ];
        ?>
    </div>
</div>
</body>
</html>