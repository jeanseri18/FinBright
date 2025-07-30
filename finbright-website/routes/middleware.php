<?php

use App\Http\Middleware\RoleMiddleware;

return [
    // Tes middlewares personnalisés ici
    'role' => RoleMiddleware::class,
];