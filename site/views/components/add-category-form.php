<article>
    <form
        hx-post="/add-category"
        hx-trigger="submit"
        enctype="multipart/form-data"
    >
        <h2>Add Category</h2>

        <input name="title" type="text" placeholder="Title" required>

        <textarea name="description" type="text" placeholder="Description" required></textarea>

        <input type="submit" value="Add">

    </form>
</article>