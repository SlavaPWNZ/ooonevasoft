<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Testpage</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            table {
                margin-left:auto;
                margin-right:auto;
            }
            th {
                font-weight: normal;
                border-bottom: 2px solid #6678b1;
                border-right: 30px solid #fff;
                border-left: 30px solid #fff;
                color: #039;
                padding: 8px 2px;
            }
            td {
                border-right: 30px solid #fff;
                border-left: 30px solid #fff;
                color: #669;
                padding: 12px 2px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Ваш текущий баланс | {{ $last_balances[0]['balance'] }}
                </div>
                <h3>История вашего баланса</h3>
                <table>
                    <tr>
                        <th>Баланс</th>
                        <th>Дата</th>
                    </tr>
                <?php
                foreach ($last_balances as $row)
                    {
                        $newdate=date("H:i:s | d/m/Y",strtotime($row['ts']));
                        echo '<tr>
                        <td><b>'.$row['balance'].'</b></td>
                        <td><b>'.$newdate.'</b></td>
                        </tr>
                        ';
                    }
                ?>
                </table>
            </div>
        </div>
    </body>
</html>
