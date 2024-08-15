<article id="login-form">
    <form
        hx-swap="innerHTML"
        hx-target="#message"
        hx-post="/signup"
        hx-trigger="submit"
        enctype="multipart/form-data"
    >
        <h2>Sign Up</h2>

        <label>Username</label>
        <input name="user" type="text" required>

        <label>Password</label>
        <input name="pass" type="password" required></input>

        <label>Icon</label>
        <input name="icon" type="file" accept="image/*" required></input>

        <input type="submit" value="Sign Up">

    </form>
    <div id="message"></div>
</article>
