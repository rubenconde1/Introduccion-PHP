<?php
header('Content-Type: application/csv');

header('Content-Lenght: 1000000');

header('Content-Disposition: attachment; filename="downloaded.csv"');

for ($i=0; $i < 1000; $i++) { 

    echo str_repeat(".",1000);

    usleep(50000);
}





?>