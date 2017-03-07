<?php

require(__DIR__ . '/vendor/autoload.php');

use Interact\Client;

$client = new Client("IC9-55938-5");
?> 
<html>
    <head></head>
    <body>
        <?php
            if ( $client->getFeature("58be7d23073688adf4a3c716")->isA() ) :
        ?>
            <h1>This is Feature "", type A</h1>
        <?php
            else :
        ?>
            <h1>This is Feature "", type B</h1>
        <?php
            endif; 
        ?>
        <script>
            <?php echo $client->getInitCode() ?>
        </script>
    </body>
</html>
