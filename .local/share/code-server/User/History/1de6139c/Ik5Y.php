
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Foreach loop example</title>
        <link rel="stylesheet" href="wp.css" type="text/css">

    </head>
    <body>
            <table class="bordered">
                    <!-- table header -->
                    <tr><th>Name</th><th>Value</th></tr>
            @forelse ($get as $name => $value)
                    @if ($loop->index %2 == )
                    <tr><td>{{$name}}:</td><td>{{$value}}></td></tr>
            @empty
                No URL variable
            @endforelse
            </table>
            
            <p><a href="show.php?file=foreach-loop.php">Source</a></p>
    </body>
</html>