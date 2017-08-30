<?php
//在一年之后过期
$one_year = strtotime('+1 year');
setcookie('cart', 'aaaaaaa', $one_year);