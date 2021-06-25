<?php return array (
  'beyondcode/laravel-websockets' => 
  array (
    'providers' => 
    array (
      0 => 'BeyondCode\\LaravelWebSockets\\WebSocketsServiceProvider',
    ),
    'aliases' => 
    array (
      'WebSocketRouter' => 'BeyondCode\\LaravelWebSockets\\Facades\\WebSocketRouter',
    ),
  ),
  'darkaonline/l5-swagger' => 
  array (
    'providers' => 
    array (
      0 => 'L5Swagger\\L5SwaggerServiceProvider',
    ),
    'aliases' => 
    array (
      'L5Swagger' => 'L5Swagger\\L5SwaggerFacade',
    ),
  ),
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'fruitcake/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Fruitcake\\Cors\\CorsServiceProvider',
    ),
  ),
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'laravel/cashier' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Cashier\\CashierServiceProvider',
    ),
  ),
  'laravel/passport' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Passport\\PassportServiceProvider',
    ),
  ),
  'laravel/sail' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sail\\SailServiceProvider',
    ),
  ),
  'laravel/telescope' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Telescope\\TelescopeServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'sentry/sentry-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Sentry\\Laravel\\ServiceProvider',
      1 => 'Sentry\\Laravel\\Tracing\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Sentry' => 'Sentry\\Laravel\\Facade',
    ),
  ),
  'spatie/laravel-permission' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Permission\\PermissionServiceProvider',
    ),
  ),
  'srmklive/paypal' => 
  array (
    'providers' => 
    array (
      0 => 'Srmklive\\PayPal\\Providers\\PayPalServiceProvider',
    ),
    'aliases' => 
    array (
      'PayPal' => 'Srmklive\\PayPal\\Facades\\PayPal',
    ),
  ),
);