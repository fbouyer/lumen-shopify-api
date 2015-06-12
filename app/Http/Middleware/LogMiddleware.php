<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\TerminableMiddleware;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class LogMiddleware implements TerminableMiddleware{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::info('============================================================');
        Log::info('*** Start Time: ' . date('Y-m-d h:i:s'));
        Log::info('*** Request URL: ' . (string)$request->getUri());
        Log::info('*** Request Method: ' . (string)$request->getMethod());
        Log::info('*** Request Body: ' . (string)$request->getContent());

        $body = json_decode($request->getContent());

    }

    /**
     * Perform any final actions for the request lifecycle.
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {
        Log::info('*** End Time: ' . date('Y-m-d h:i:s'));
        Log::info('*** Response: '. (string)$response->getContent());
        Log::info('');
    }

}
