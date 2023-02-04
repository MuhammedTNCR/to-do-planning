<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Pagination Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
@foreach($weeks_by_devs as $dev => $weeks)
<div class="container mt-5">
    <p class="text-center">{{ $dev }}</p>
    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-success">
            @foreach($weeks as $week_key => $week_tasks)
            <th>Week {{ $week_key }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($weeks as $week_key => $week_tasks)
                <td>
                    @foreach($week_tasks as $task)
                    <ul>
                            <li>Task: {{ $task['task'] }}</li>
                            <li>Time: {{ $task['estimated_time'] }}</li>
                    </ul>
                        <hr>
                    @endforeach
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endforeach
</body>
</html>
