<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Validator;

class PlayerId
{
    /**
     * Checks if an account id parameter is set.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->all(), [
            'playerid' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'No player id was found.'
            ]);
        }
        return $next($request);
    }
}
