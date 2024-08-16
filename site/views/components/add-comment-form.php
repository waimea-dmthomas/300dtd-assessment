<!-- Add comment form -->

<article>
    <form
        hx-post="/add-comment/<?=$id?>"
        hx-trigger="submit"
        enctype="multipart/form-data"
    >
        <textarea name="body" type="text" placeholder="Leave a comment..." required></textarea>

        <input type="submit" value="Add">

    </form>
</article>