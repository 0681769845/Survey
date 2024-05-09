<?php $activeTab = 'create'; ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Survey</title>
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 92%;
            margin: 0 auto;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }


        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 16%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 90%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th:first-child, td:first-child {
            text-align: left;
        }

        th {
            background-color: #ccc;
        }

        button[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: royalblue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .input-group {
            display: flex;
            align-items: center;

        }

        .input-group p {
            margin-right: -115px; /* Adjust margin as needed */
        }

        .input-group label {
            width: 150px; /* Adjust width as needed */margin-left: 192px; /* Adjust margin as needed */

        }

        .input-group input {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border-color: royalblue;

        }

        button[type="submit"]:hover {
            background-color: blue;
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
        <button style="color: {{$activeTab === 'create' ? 'blue' : '#333'}};"
                onclick="history.back()">Create Survey
        </button>

        <button style="color: {{$activeTab === 'results' ? 'blue' : '#333'}};"
                onclick="location.href='{{route('show.survey')}}'">Survey Results
        </button>
    </div>

</div>
<div class="container">
    <form method="POST" action="{{route('create.survey')}}">
        @csrf
        <div class="input-group">
            <p>Personal Details:</p>
            <label>Full Name:</label><br>
            <input type="text" name="full_name" required><br>
        </div>
        <div class="input-group">
            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>
        </div>
        <div class="input-group">
            <label>Date of Birth:</label><br>
            <input type="date" name="dob" required>
        </div>
        <div class="input-group">
            <label>Contact Number:</label><br>
            <input type="tel" name="contact_number" required><br><br><br><br>
        </div>
        <label>What is your favorite food?</label>
        <input type="radio" name="favorite_food" value="pizza"> Pizza
        <input type="radio" name="favorite_food" value="pasta"> Pasta
        <input type="radio" name="favorite_food" value="pap_and_wors"> Pap and Wors
        <input type="radio" name="favorite_food" value="other"> Other<br><br>

        <label>How do you feel about the following statements?</label><br>
        <table>
            <thead>
            <tr>
                <th></th>
                <th>Strongly Agree</th>
                <th>Agree</th>
                <th>Neutral</th>
                <th>Disagree</th>
                <th>Strongly Disagree</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>I like to watch movies</td>
                <td><input type="radio" name="movies" value="strongly_agree"></td>
                <td><input type="radio" name="movies" value="agree"></td>
                <td><input type="radio" name="movies" value="neutral"></td>
                <td><input type="radio" name="movies" value="disagree"></td>
                <td><input type="radio" name="movies" value="strongly_disagree"></td>
            </tr>
            <tr>
                <td>I like to listen to radio</td>
                <td><input type="radio" name="radio" value="strongly_agree"></td>
                <td><input type="radio" name="radio" value="agree"></td>
                <td><input type="radio" name="radio" value="neutral"></td>
                <td><input type="radio" name="radio" value="disagree"></td>
                <td><input type="radio" name="radio" value="strongly_disagree"></td>
            </tr>
            <tr>
                <td>I like to eat out</td>
                <td><input type="radio" name="eat_out" value="strongly_agree"></td>
                <td><input type="radio" name="eat_out" value="agree"></td>
                <td><input type="radio" name="eat_out" value="neutral"></td>
                <td><input type="radio" name="eat_out" value="disagree"></td>
                <td><input type="radio" name="eat_out" value="strongly_disagree"></td>
            </tr>
            <tr>
                <td>I like to watch TV</td>
                <td><input type="radio" name="watch_tv" value="strongly_agree"></td>
                <td><input type="radio" name="watch_tv" value="agree"></td>
                <td><input type="radio" name="watch_tv" value="neutral"></td>
                <td><input type="radio" name="watch_tv" value="disagree"></td>
                <td><input type="radio" name="watch_tv" value="strongly_disagree"></td>
            </tr>
            </tbody>
        </table>
        <div style="justify-content: center;display: flex;align-items: center;">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
