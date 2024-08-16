<!-- Signup form -->

<article id="login-form">
    <form
        hx-swap="innerHTML"
        hx-target="#message"
        hx-post="/signup"
        hx-trigger="submit"
        enctype="multipart/form-data"
    >
        <h2>Sign Up</h2>

        <input class="check-validity" name="user" type="text" minlength="4" maxlength="16" placeholder="Username" required>

        <input class="check-validity" name="pass" type="password" minlength="8" maxlength="64" placeholder="Password" required></input>

        <input type="submit" value="Sign Up">

    </form>
    <div id="message"></div>
</article>
