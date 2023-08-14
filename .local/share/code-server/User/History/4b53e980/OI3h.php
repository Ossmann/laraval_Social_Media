
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
                    <tr><th>No.</th><th>Name</th><th>From</th><th>To</th><th>Duration</th><th>Party</th><th>State</th></tr>
            @forelse ($pms as $name => $value)
                    @if ($loop->index %2 == 0)
                        <tr class="alt"><td>{{$name}}:</td><td>{{$value}}</td></tr>
                    @else
                        <tr><td>{{$name}}:</td><td>{{$value}}</td></tr>
                    @endif 
            @empty
                <tr><td colspan=2>No URL variable</td></tr>
            @endforelse
            </table>












    </body>
</html>