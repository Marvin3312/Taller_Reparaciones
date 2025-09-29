# RuntimeException - Internal Server Error
This password does not use the Bcrypt algorithm.

PHP 8.2.12
Laravel 12.31.1
127.0.0.1:8000

## Stack Trace

0 - vendor\laravel\framework\src\Illuminate\Hashing\BcryptHasher.php:88
1 - vendor\laravel\framework\src\Illuminate\Hashing\HashManager.php:76
2 - vendor\laravel\framework\src\Illuminate\Auth\EloquentUserProvider.php:158
3 - vendor\laravel\framework\src\Illuminate\Auth\SessionGuard.php:481
4 - vendor\laravel\framework\src\Illuminate\Auth\SessionGuard.php:419
5 - vendor\laravel\framework\src\Illuminate\Support\Timebox.php:34
6 - vendor\laravel\framework\src\Illuminate\Auth\SessionGuard.php:411
7 - vendor\laravel\ui\auth-backend\AuthenticatesUsers.php:86
8 - vendor\laravel\ui\auth-backend\AuthenticatesUsers.php:46
9 - vendor\laravel\framework\src\Illuminate\Routing\Controller.php:54
10 - vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php:43
11 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:265
12 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:211
13 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:822
14 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
15 - vendor\laravel\framework\src\Illuminate\Auth\Middleware\RedirectIfAuthenticated.php:35
16 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
17 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:87
18 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
19 - vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php:50
20 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
21 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:87
22 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
23 - vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php:48
24 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
25 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:120
26 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:63
27 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
28 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:36
29 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
30 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php:74
31 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
32 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
33 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:821
34 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:800
35 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:764
36 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:753
37 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:200
38 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
39 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
40 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:31
41 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
42 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
43 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:51
44 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
45 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePostSize.php:27
46 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
47 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:109
48 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
49 - vendor\laravel\framework\src\Illuminate\Http\Middleware\HandleCors.php:48
50 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
51 - vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php:58
52 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
53 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks.php:22
54 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
55 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePathEncoding.php:26
56 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
57 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
58 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:175
59 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:144
60 - vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1220
61 - public\index.php:20
62 - vendor\laravel\framework\src\Illuminate\Foundation\resources\server.php:23

## Request

POST /login

## Headers

* **host**: 127.0.0.1:8000
* **connection**: keep-alive
* **content-length**: 83
* **cache-control**: max-age=0
* **sec-ch-ua**: "Chromium";v="140", "Not=A?Brand";v="24", "Google Chrome";v="140"
* **sec-ch-ua-mobile**: ?0
* **sec-ch-ua-platform**: "Windows"
* **origin**: http://127.0.0.1:8000
* **content-type**: application/x-www-form-urlencoded
* **upgrade-insecure-requests**: 1
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36
* **accept**: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
* **sec-fetch-site**: same-origin
* **sec-fetch-mode**: navigate
* **sec-fetch-user**: ?1
* **sec-fetch-dest**: document
* **referer**: http://127.0.0.1:8000/
* **accept-encoding**: gzip, deflate, br, zstd
* **accept-language**: es-419,es;q=0.9
* **cookie**: XSRF-TOKEN=eyJpdiI6IkRkQy82KzJWTDU4MWI5M2E5Y3l1Unc9PSIsInZhbHVlIjoiamhZdDV1NEtRa0syanUrdzRBZTl5Z3orNUFadmc4Ukh3clNMUU1LQTF0aVVuS2IrK0ZyM08wdFNXSXpnQkdHcityVk9jRGhzRUNhNU1BR25rbVZnS2ZRQnA4dDI1NXM2Y3BodDVma3VWMWpRU3IvSnhjRC83dHBla0htNGk0L1ciLCJtYWMiOiIzOGMwZTMyZTVhNzQzMzM5MGJjZDg3N2VkYTM2MTY0MzU4NmQzOTE0OTE0NjQ3NGE5OGJmZDBlMGMwYzdkYTM2IiwidGFnIjoiIn0%3D; tallerreparaciones-session=eyJpdiI6Ik1XakViYjk5RjBGWXdvb1FHcG1ZNXc9PSIsInZhbHVlIjoiYjY0elp5cVZpeEowOHZURzAxY2M5dlZHUlJnMjFDVGZCSm9ZMXNGYUY0WndpcTJkblM2WkVXWDRWaFYyL3NtTHE0THNUV25ueDFGcm5wVWRjdnZiZXd1d3p4YlR0eXlBR0ZrSzdZYzdoTkV6WXpjeWlVbWg4aXVyV0JQSGJ6VmkiLCJtYWMiOiIxYjcwZjhiMzQ3Y2RjYmI0OTBjZjdkYWVjOGZjZGFiODdmY2YyY2QyY2VlYTExNzlkYzg4ZmNkNGYyMmQ5MGIxIiwidGFnIjoiIn0%3D

## Route Context

controller: App\Http\Controllers\Auth\LoginController@login
middleware: web, guest

## Route Parameters

No route parameter data available.

## Database Queries

* mysql - select * from `sessions` where `id` = '8cLemAmNXLTFqHuUrBfBiHQbT040ZVmFfyKVUABB' limit 1 (24.78 ms)
* mysql - select * from `cache` where `key` in ('tallerreparaciones-cache-tecnico 2|127.0.0.1') (3 ms)
* mysql - select * from `usuario` where `username` = 'tecnico 2' limit 1 (2.19 ms)


mi dato en la dba es "# id_usuario, username, password_hash, rol, activo, remember_token, created_at, updated_at
3, tecnico 2, AccesoP, Tecnico, 1, , 2025-09-29 05:39:39, 2025-09-29 05:39:39
"