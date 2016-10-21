FortPHP

# Content

## 1. General

FortPHP is a simple and minimalist MVC framework. It's purpose is to help the user realize an app as fast as possible.

## 2. About the developer

- background
    - numele
    - educatie, ocupatie
    - linkuri online - github, twitter, etc

## 3. Installation

## 4. Structure
### 4.1 Controller
### 4.2 Helpers
### 4.3 Model
### 4.4 Render module
### 4.5 Router

## 5. Configuration

Config object structure:
```php
[
    'defaults' => [
        'method' => 'GET',
        'controller' => '\App\Controller\StaticController',
        'view' => 'default',
    ],
    'routes' => [
        'home' => [
            'url' => '/',
            'method' => 'GET',
            'controller' => '\App\Controller\StaticController',
            'action' => 'home',
            'view' => 'home',
        ],
        'about' => [
            'url' => '/about',
            'action' => 'about',
        ]
    ],
    'views' => [
        'home' => [
            'path' => __DIR__ . '/view/home.view.php'
        ],
        'about' => [
            'path' => __DIR__ . '/view/about.view.php'
        ],
        'default' => [
            'path' => __DIR__ . '/view/default.view.php'
        ]
    ],
]
```

1. defaults - optional
- array of key value pairs
- define a set of default values
- if not specified when declaring routes, these values are used

defaults['method'] - optional
- define the default request method
- used when method not specified when declaring routes

defaults['controller'] - optional
- define the default controller (including namespace)
- used when controller not specified when declaring routes

defaults['view'] - optional
- define the default view template
- used when the view template not specified when defining a route

2. routes - required
- array containing routes data
- a route consists of four parameters (url, action, view, controller)
- if not defined or empty trigger error 101

routes['url'] - required
- route request url; used for checking/matching the request url
- if not defined trigger 102

routes['method'] - optional
- values: GET, POST, UPDATE, DELETE
- can be used the default method; if not set in both locations, 103 error will be triggered

routes['controller'] - optional
- requires full name (with namespace)
- can be used the default controller; if not set in both locations, 104 error will be triggered

routes['action'] - required
- action alias (method that needs to be called from within controller)
- if not specified, trigger 103
- if action/method cannot be found, trigger 104

routes['view'] - optional
- specify the view that is rendering
- if not defined, default view will be used
- view can be missed - controlled does not need to use a view file

3. views - optional
- array used to specify view files
- every view has a unique alias used as key in views array

routes['path'] - required
- path to the view file
- if not defined trigger 201

## 6. Errors

### 100 - Routes Errors
101 - Routes array not defined or empty
102 - Url not defined for [route] route
103 - Action not defined for [route] route
104 - Action cannot be found in [controller] controller

### 200 - Views Errors
201 - Path not defined for [view] view

## 7. Tests
