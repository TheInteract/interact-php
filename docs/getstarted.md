# PHP Feature Toggle

## Getting Started

### 1. Install the Interact SDK with Composer
```php
composer require interact-project/interact-php
```

### 2. Create a new Interact Client with your private key
You can pass your unique account id which is an account on your application to our system and we will hash it.
```php
$client = new Interact\Client("YOUR_PRIVATE_KEY", ["YOUR_ACCOUNT_ID"])
```

### 3. Wrap each version of your feature in a feature toggle function
```php
<?php 
    if ( $client->getFeature("FEATURE_NAME")->isA() ) : 
        // the code to show first version of your feature
    else :
        // the code to show second version of your feature
    endif; 
?>
```

## API Documentation
### Class Interact/Client
Create your client with current account
```php
$client = new Interact\Client(private_key, [account_id])
```

|Name|Type|Description|
|----|:---:|---------|
|private_key|string|Define who you are with private key which generate from interact|
|account_id|string|`optional` Pass your account id for defining your account on browser side|

**Return** Client class

#### method getInitCode
Get your javascript for your client side
```php
$client->getInitCode();
```

**Return** String of javascript code

#### method getFeature
Get your feature of current account that you pass to interact client class

```php
$client->getFeature(feature_name)
```

|Name|Type|Description|
|----|:---:|---------|
|feature_name|string|Your feature name that you want to toggle it|

**Return** Feature Class

### Class Interact/Feature
Contain your feature information

```php
$feature_1 = $client->getFeature(feature_name)
```

#### method getName
Get your feature name

```php
$feature_1->getName()
```

**Return** String

#### method isA
Check current account that was passed to client class is using version A or not

```php
$feature_1->isA()
```

**Return** Boolean

#### method isB
Check current account that was passed to client class is using version B or not

```
$feature_1->isB()
```

**Return** Boolean

## Example
```php
<?php

require(__DIR__ . '/vendor/autoload.php');

use Interact\Client;

$client = new Client("PRIVATE_KEY", "FAKE_ACCOUNT_ID");
?> 
<html>
    <head>
        <title>Interact Example</title>
    </head>
    <body>
        <?php
            if ( $client->getFeature("FAKE_FEATURE_NAME")->isA() ) :
        ?>
            <h1>This is "FAKE_FEATURE_NAME", type A</h1>
        <?php
            else :
        ?>
            <h1>This is "FAKE_FEATURE_NAME", type B</h1>
        <?php
            endif; 
        ?>
        <script>
            <?php echo $client->getInitCode() ?>
        </script>
    </body>
</html>
```
