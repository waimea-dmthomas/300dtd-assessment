<!-- Login form -->

<article>
    <h2>Login</h2>

    <form
        hx-swap="innerHTML"
        hx-target="#message"
        hx-post="/login" 
        hx-trigger="submit"
    >

        <input name="username" type="text" placeholder="Username" maxlength="16" required>

        <input name="password" type="password" placeholder="Password" maxlength="64" required>

        <input type="submit" value="Login">

    </form>
    <div id="message"></div>
    <p>No account? <a id="signup-button" href="/signup"><button>Sign Up</button></a></p>
</article>