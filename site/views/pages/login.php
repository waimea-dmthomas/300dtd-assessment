<article>
    <h2>Login</h2>

    <form
        hx-post="/login-user" 
        hx-trigger="submit"
    >

        <input name="username" type="text" placeholder="Username" required>

        <input name="password" type="password" placeholder="Password" required>

        <input type="submit" value="Login">

    </form>
    <p>No account? <a href="/signup">Sign Up</a></p>
</article>