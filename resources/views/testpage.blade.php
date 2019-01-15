<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testpage</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="css/cover.css" rel="stylesheet">
</head>

<body class="text-center">
<div class="d-flex h-100 p-5 mx-auto flex-column">
    <main role="main" class="inner cover">
        <h1 class="cover-heading">Ваш текущий баланс | {{ $last_balances[0]['balance'] }}</h1>
        <p class="lead mt-5">История вашего баланса</p>
    </main>
    <table class="table table-dark table-sm table-hover table-inverse">
        <thead class="thead-dark">
        <tr>
            <th>Баланс</th>
            <th>Дата</th>
        </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</div>
</body>

</html>