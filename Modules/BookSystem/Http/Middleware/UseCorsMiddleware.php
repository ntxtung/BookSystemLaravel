<?php

namespace Modules\BookSystem\Http\Middleware;

use Closure;

class UseCorsMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $response = $next( $request );
        $response->header( 'Access-Control-Allow-Origin', '*' );
        $response->header( 'Access-Control-Allow-Headers', 'Origin, Content-Type' );

        return $response;
    }
}
