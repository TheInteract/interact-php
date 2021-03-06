<?php

require(__DIR__ . '/vendor/autoload.php');

use Interact\Client;

$client = new Client("demo-private-key", "");
?> 

<html>
  <head>
    <title>example - collector</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
        <div class="nav">
            <div class="nav-logo" id="eiei" interact-click="hi-5">Example</div>
            <div class="nav-logo" interact-click="hi-4">Examples</div>
            <div class="nav-center">
                <?php
                    if ( $client->getFeature("DemoFeature")->isA() ) :
                ?>
                    <div interact-click="card-1" class="feature-button">1A</div>
                    <div interact-click="card-1" class="feature-button">2A</div>
                <?php
                    elseif ( $client->getFeature("DemoFeature")->isB() ) :
                ?>
                    <div interact-click="card-1" class="feature-button">1B</div>
                    <div interact-click="card-1" class="feature-button">2B</div>
                <?php
                    else :
                ?>
                    <div interact-click="closed-nav" class="feature-button">Close</div>
                <?php
                    endif; 
                ?>
            </div>
        </div>
        <div class="content">
            <div class="content-body">
                <?php
                    if ( $client->getFeature("DemoFeature")->isA() ) :
                ?>
                    <div interact-click="card-5" class="feature feature-a">Feature 1A</div>
                    <div interact-click="card-7" class="feature feature-a">Feature 2A</div>
                <?php
                    elseif ( $client->getFeature("DemoFeature")->isB() ) :
                ?>
                    <div interact-click="card-6" class="feature feature-b">Feature 1B</div>
                    <div interact-click="card-8" class="feature feature-b">Feature 2B</div>
                <?php
                    else :
                ?>
                    <div interact-click="closed" class="feature feature-b">Closed</div>
                <?php
                    endif; 
                ?>
                <div id="test" class="feature">Other Feature</div>
                <a href="http://google.co.th">Go to Google!</a>
            </div>
        </div>
    </div>
    <script>
        <?php echo $client->getInitCode() ?>
    </script>
    <script>
        $("#test").click(function(){
          $.ajax({url: "testest:3000/collector/api/healthz", success: function(result){
              console.log(result)
          }});
        });
    </script>
  </body>
</html>
