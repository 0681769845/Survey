<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SurveyController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        Survey::create([
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'dob' => $request->get('dob'),
            'contact_number' => $request->get('contact_number'),
            'favorite_food' => $request->get('favorite_food'),
            'movies_rating' => $request->get('movies'),
            'radio_rating' => $request->get('radio'),
            'eat_out_rating' => $request->get('eat_out'),
            'watch_tv_rating' => $request->get('watch_tv'),
        ]);

        return redirect()->route('show.survey')
            ->with('success', 'Survey has been successfully created.');

    }

    /**
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show()
    {
        $totalSurveys = Survey::count();

        $averageAge = Survey::avg(DB::raw('YEAR(CURDATE()) - YEAR(dob) - (DATE_FORMAT(CURDATE(), "%m%d") < DATE_FORMAT(dob, "%m%d"))'));

        $oldestParticipant = Survey::orderBy('dob', 'asc')->first();
        $youngestParticipant = Survey::orderBy('dob', 'desc')->first();

        $numberOfPizzaLovers = Survey::where('favorite_food', 'like', '%pizza%')->count();
        $percentagePizzaLovers = ($numberOfPizzaLovers / $totalSurveys) * 100;
        $percentagePizzaLovers = round($percentagePizzaLovers, 1);

        $numberOfPastaLovers = Survey::where('favorite_food', 'like', '%pasta%')->count();
        $percentagePastaLovers = ($numberOfPastaLovers / $totalSurveys) * 100;
        $percentagePastaLovers = round($percentagePastaLovers, 1);

        $numberOfPapAndWorsLovers = Survey::where('favorite_food', 'like', '%pap_and_wors%')->count();
        $percentagePapAndWorsLovers = ($numberOfPapAndWorsLovers / $totalSurveys) * 100;
        $percentagePapAndWorsLovers = round($percentagePapAndWorsLovers, 1);
        // Define the numerical values for each option
        $ratings = [
            'strongly_agree' => 5,
            'agree' => 4,
            'neutral' => 3,
            'disagree' => 2,
            'strongly_disagree' => 1
        ];

        $moviesRatings = Survey::pluck('movies_rating')->toArray();
        $radioRatings = Survey::pluck('radio_rating')->toArray();
        $eatOutRatings = Survey::pluck('eat_out_rating')->toArray();
        $watchTvRatings = Survey::pluck('watch_tv_rating')->toArray();

        $averageMoviesRating = collect($moviesRatings)->avg(function ($rating) use ($ratings) {
            return $ratings[$rating] ?? 0;
        });
        $averageMoviesRating = round($averageMoviesRating, 1);

        $averageRadioRating = collect($radioRatings)->avg(function ($rating) use ($ratings) {
            return $ratings[$rating] ?? 0;
        });
        $averageRadioRating = round($averageRadioRating, 1);

        $averageEatOutRating = collect($eatOutRatings)->avg(function ($rating) use ($ratings) {
            return $ratings[$rating] ?? 0;
        });
        $averageEatOutRating = round($averageEatOutRating, 1);

        $averageWatchTvRating = collect($watchTvRatings)->avg(function ($rating) use ($ratings) {
            return $ratings[$rating] ?? 0;
        });
        $averageWatchTvRating = round($averageWatchTvRating, 1);

// Now, $averageMoviesRating, $averageRadioRating, $averageEatOutRating, and $averageWatchTvRating contain the respective average ratings


        return view('show',
            compact(
                'totalSurveys',
                'averageAge',
                'oldestParticipant',
                'youngestParticipant',
                'percentagePizzaLovers',
                'averageEatOutRating',
                'numberOfPizzaLovers',
                'percentagePastaLovers',
                'percentagePapAndWorsLovers',
                'averageMoviesRating',
                'averageRadioRating',
                'averageWatchTvRating'
            ));
    }

    public function back()
    {

    }
}
