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
        'default_method' => 'GET',
        'default_controller' => '\App\Controller\StaticController',
        'default_view' => 'default',
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

defaults - optional
- array of key value pairs
- define a set of default values
- if not specified when declaring routes, these values are used

default_method - optional
- define the default request method
- used when method not specified when declaring routes

default_controller - optional
- define the default controller (including namespace)
- used when controller not specified when declaring routes

default_view - optional
- define the default view template
- used when the view template not specified when defining a route

routes - required
- array containing routes data
- a route consists of four parameters (url, action, view, controller)
- if not defined trigger error 100
- if empty trigger error 101

url - required
- route request url; used for checking/matching the request url
- if not defined trigger 102

method - optional
- values: GET, POST, UPDATE, DELETE
- can be used the default method; if not set in both locations, 103 error will be triggered

controller - optional
- requires full name (with namespace)
- can be used the default controller; if not set in both locations, 104 error will be triggered

action - required
- action alias (method that needs to be called from within controller)
- if not specified, trigger 105
- if action/method cannot be found, trigger 106

view - optional
- specify the view that is rendering
- if not defined, default view will be used
- view can be missed - controlled does not need to use a view file

views - optional
- array used to specify view files
- every view has a unique alias used as key in views array
- if duplicate alias, trigger 107

path - required
- path to the view file
- if not defined trigger 108

## 6. Errors

Error Codes
100 - config routes not defined
101 - config routes not defined
102 - route url not defined
103 - method property not added in route property nor as default value
104 - controller not specified to route
105 - action not specified
106 - action not found in the specified controller
107 - views have duplicate aliases
108 - view path not defined

## 7. Tests
