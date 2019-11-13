<?php
namespace App\Http\Controllers\Score;
use App\Http\Controllers\Controller;
use App\Score\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
class ScoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function scoreEdit(Request $request)
    {
        return response()->json([
            [ 'result' => true ],
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $cups = Score::where('user_id', 1)->get();
        $user = Auth::user();
        $userId = $user->getAuthIdentifier();
        $score = new Score;
//        $cups = $score->getCups($userId);
        $cups = $score->getAllCups();
        $cupsJson = $score->getAllCups(true);

        return view('score/index')->with([
                'cups' => $cups,
                'cupsJson' => $cupsJson,
            ]
        );
    }

    /**
     * @param $cup_number
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cup($cup_number){
        $user = Auth::user();
        $userId = $user->getAuthIdentifier();
        $score = new Score;
        $cup = $score->getCup($cup_number);
//        var_dump($cup);

        return view('score/cup')->with([
                'cup' => $cup,
            ]
        );

    }


}
