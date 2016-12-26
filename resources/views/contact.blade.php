@extends('layouts.master')

@section('content')
    <div class="home-container">
        <div class="home-title">
            <h1>Contact us</h1>
        </div>
        <div class="home-content">
            <div class="home-description">
                <table class="contact-table">
                    <tr>
                        <th><strong>Contact</strong></th>
                    </tr>
                    <tr>
                        <td>
                            <a href="mailto:info@moneymath.org.za?Subject=Help">info@moneymath.org.za</a>
                            <p>For any further assistance or general enquiries</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="mailto:suggestions@moneymath.org.za?Subject=Suggestion">suggestions@moneymath.org.za</a>
                            <p>For ideas on how to improve Moneymath</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
