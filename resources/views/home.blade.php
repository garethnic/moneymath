@extends('layouts.master')

@section('content')
    <div class="home-container">
        <div class="home-title">
            <h1>Welcome to MoneyMath</h1>
        </div>
        <div class="home-content">
            <div class="home-description">
                <p>
                    Ever find yourself doodling your income, expenses and whatever you have left over for each month?
                    We certainly have. That's why we created this easy to use app that let's you add all your income and expenses,
                    calculates everything for you and saves it. That's right, no more writing and doing the same
                    calculations over and over.

                    MoneyMath will work on 95% of devices. A lot of effort has been made to ensure it works on all screen
                    sizes.
                </p>

                <img src="img/screenshots/mobile-2.png">
            </div>

            <div class="home-closing">
                <p>
                    This app is very simple, it does one thing and one thing only. If you have any ideas on how
                    MoneyMath can help track your finances better, send us an
                    <a href="mailto:suggestions@moneymath.org.za?Subject=Suggestion">email</a> with your suggestions.
                </p>
                <p>
                    Work is under way into the next phase of MoneyMath. Keeping things simple will remain a high priority.
                </p>
            </div>
        </div>
    </div>
@endsection
