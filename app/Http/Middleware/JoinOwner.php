<?php

namespace Battleroad\Http\Middleware;

use Champ\Join\Repositories\JoinRepository;
use Closure;

class JoinOwner
{
    /**
     * @var ChampiponshipRepository
     */
    private $joinRepository;

    public function __construct(JoinRepository $joinRepository)
    {
        $this->joinRepository = $joinRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->segment(2);

        $join = $this->joinRepository->find($id);

        if ($join->user_id != auth()->user()->id) {
            abort(404);
        }

        return $next($request);
    }
}
