<article>
    <form
        hx-post="/add-comment/<?=$id?>"
        hx-trigger="submit"
        enctype="multipart/form-data"
    >
        <input name="body" type="text" placeholder="Leave a comment..." required></input>

        <input type="submit" value="Add">

    </form>
</article>