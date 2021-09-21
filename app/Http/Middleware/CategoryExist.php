<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use App\Services\Perform;
use Illuminate\Http\Request;

class CategoryExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $categories = Perform::index(Category::class, null, true);

        if ($categories && count($categories) > 0) return $next($request);

        return redirect()->route('portfolio.categories.index')->with(['errors_ms' => 'Please Add Category First']);
    }
}
