<h1>User Login</h1>
<form action="user" method="POST">
    @csrf
    <input type="text" name="user" placeholder="enter user name"> <br><br>
    <input type="text" name="password" placeholder="enter user password"> <br><br>
    <button type="submit">Login</button>
</form>