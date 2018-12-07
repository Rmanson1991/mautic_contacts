<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mautic Contacts</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            #logo-top-left {
                position: fixed;
                top: 2%;
                left: 2%;
            }

            .container {
                position: relative;
                left: 0;
                top: 15%;
                text-align: center;
            }

            .contact-list {
                display: inline-block;
                width: 33%;
            }

            #contacts-heading {
                font-size: 2.75em;
                top: 10%;
                padding-bottom: 10%;
            }

            .list-group, .contact-details-list {
                list-style: none;
            }

            a {
                text-decoration: none;
                color: #636b6f;
                border
            }

            a:hover, a:focus {
                text-decoration: none;
                color: #636b6f;
            }

            .key-span {
                font-size: 1.7em;
            }
            .value-span {
                font-size: 1.5em;
            }

        </style>
    </head>
    <body>
        <div id="logo-top-left">
            <a href="/contacts"><h2>Mautic Contacts</h2></a>
        </div>
        @yield('content')
    </body>
    </html>