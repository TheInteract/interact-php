# PHP Feature Toggle

## Getting Started

### 1. Install the Interact SDK with Composer
```php
composer require interact-project/interact-php
```

### 2. Create a new Interact Client with your private key
You can pass your custom user id or not.
```php
$client = new Interact\Client("YOUR_PRIVATE_KEY", ["YOUR_CUSTOM_USER_ID"])
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
Create your client with current user
```php
$client = new Interact\Client(private_key, [user_id])
```

|Name|Type|Description|
|----|:---:|---------|
|private_key|string|Define who you are with private key which generate from interact|
|user_id|string|`option` Pass your user id for defining your user on browser side |

**Return** Client class

#### method getInitCode
Get your javascript for your client side
```php
$client->getInitCode();
```

**Return** String of javascript code

#### method getFeature
Get your feature of current user that you pass to interact client class

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
Check current user that was passed to client class is using version A or not

```php
$feature_1->isA()
```

**Return** Boolean

#### method isB
Check current user that was passed to client class is using version B or not

```
$feature_1->isB()
```

**Return** Boolean