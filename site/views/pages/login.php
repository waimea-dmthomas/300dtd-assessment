<article>
    <h2>Login</h2>

    <form
        hx-post="/login-user" 
        hx-trigger="submit"
    >

        <label>Username</label>
        <input name="username" type="text" required>

        <label>Password</label>
        <input name="password" type="password" required>

        <input type="submit" value="Login">

    </form>
    <p>No account? <a href="/signup">Sign Up</a></p>
</article>