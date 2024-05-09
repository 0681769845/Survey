<?php $activeTab = 'results'; ?>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Survey</title>
    <!-- Styles -->
    <style>

        .input-group {
            display: flex;
            align-items: center;

        }

        .input-group p {
            margin-right: -115px; /* Adjust margin as needed */
        }

        .input-group span {
            width: 150px; /* Adjust width as needed */
            margin-left: 300px; /* Adjust margin as needed */

        }

        form {
            padding: 200px;
            border-radius: 10px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .navbar h1 {
            margin: 0;
        }

        .navbar-btns {
            display: flex;
        }

        .navbar-btns button {
            margin-right: 10px;
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .navbar-btns button:hover {
        }
    </style>
</head>
<body>
<div class="navbar">
    <h1>_Survey</h1>
    <div class="navbar-btns">
        <button style="color: {{$activeTab === 'create' ? 'blue' : '#333'}}; background-color: transparent;"
                onclick="history.back()">Create Survey
        </button>

        <button style="color: {{$activeTab === 'results' ? 'blue' : '#333'}}; background-color: transparent;"
                onclick="location.href='{{route('show.survey')}}'">Survey Results
        </button>
    </div>

</div>
<div class="container">
    <div class="col">
        <form>
            <div style="justify-content: center;display: flex;align-items: center;">
                <h1>Survey Results</h1>
            </div>
            <div class="input-group">
                <p>Total number of surveys :</p>
                <span>{{$totalSurveys}}</span>
            </div>
            <div class="input-group">
                <p>Average Age :</p>
                <span>{{$averageAge. ' average age'}}</span>
            </div>
            <div class="input-group">
                <p>Oldest person who participated in survey :</p>
                <span>{{$totalSurveys. ' max age'}}</span>
            </div>
            <div class="input-group">
                <p>Youngest person who participated in survey :</p>
                <span>{{$youngestParticipant->full_name . ' min age'}}</span>
            </div>
            <div class="input-group">
                <p>Percentage of people who like Pizza :</p>
                <span>{{$percentagePizzaLovers .'% Pizza'}}</span>
            </div>
            <div class="input-group">
                <p>Percentage of people who like Pasta :</p>
                <span>{{$percentagePastaLovers .'% Pasta'}}</span>
            </div>
            <div class="input-group">
                <p>Percentage of people who like Pap and Wors :</p>
                <span>{{$percentagePapAndWorsLovers .'% Pap and Wors'}}</span>
            </div>


            <div class="input-group">
                <p>People who like to watch movies :</p>
                <span>{{$averageMoviesRating. ' average of rating'}}</span>
            </div>
            <div class="input-group">
                <p>People who like to listen radio :</p>
                <span>{{$averageRadioRating. ' average of rating'}}</span>
            </div>
            <div class="input-group">
                <p>People who like to eat out :</p>
                <span>{{$averageEatOutRating. ' average of rating'}}</span>
            </div>
            <div class="input-group">
                <p>People who like to watch TV :</p>
                <span>{{$averageWatchTvRating. ' average of rating'}}</span>
            </div>

        </form>
    </div>

</div>
</body>
</html>
