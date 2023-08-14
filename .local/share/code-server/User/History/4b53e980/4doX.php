dd($pms);
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Foreach loop example</title>
        <link rel="stylesheet" href="{{asset('css/wp.css')}}" type="text/css">

    </head>
    <body>
    <table class="bordered">
    <!-- table header -->
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>From</th>
        <th>To</th>
        <th>Duration</th>
        <th>Party</th>
        <th>State</th>
    </tr>
    @forelse ($pms as $pm)
        <tr>
            <td>{{ $pm['index'] }}</td>
            <td>{{ $pm['name'] }}</td>
            <td>{{ $pm['from'] }}</td>
            <td>{{ $pm['to'] }}</td>
            <td>{{ $pm['duration'] }}</td>
            <td>{{ $pm['party'] }}</td>
            <td>{{ $pm['state'] }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="7">No data available</td>
        </tr>
    @endforelse
</table>

    </body>
</html>