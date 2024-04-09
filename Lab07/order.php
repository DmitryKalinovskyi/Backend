<?php

// встановлюємо статус код
http_response_code(303);

// вводимо адресу, поштовий індекс..

// відправляємо на сторінку підтвердження замовлення
header("Location: orderConfirmation.php");