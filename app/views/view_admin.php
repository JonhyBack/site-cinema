<?php

require_once "shared.php";

global $page;

$titles = $data['titles'];
$total_pages = $data['total_pages'];
$page = $data['page'];
?>

<style>
    a:hover {
        color: hotpink;
    }

    a:active {
        color: blue;
    }
</style>

<h1>Admin Dashboard</h1>
<p>Go to site <a href="https://kinoplayer.top/">kinoplayer.top</a> if you are looking for new titles</p>

<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#new-title-modal">
    Add new
</button>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Kinopoisk Id</th>
        <th scope="col">Title</th>
        <th scope="col">Rating</th>
        <th scope="col">Poster Url</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($titles as $title) {
        echo '<tr>
        <th scope="row">' . $title['id'] . '</th>
        <td>' . $title['kinopoisk_id'] . '</td>
        <td>' . $title['title'] . '</td>
        <td>' . $title['rating'] . '</td>
        <td>' . $title['poster_url'] . '</td>
        <td><button type="button" onclick="removeTitle(event, ' . $title['id'] . ')" class="btn btn-danger">Remove</button></td>
    </tr>';
    }
    ?>
    </tbody>
</table>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">

        <li class="page-item <?php if ($page == 1) echo 'disabled' ?>">
            <a class="page-link"
               href="/admin/index?&page=<?php echo $page - 1 ?>" <?php if ($page == 1) echo 'tabindex="-1" aria-disabled="true"' ?>>Previous</a>
        </li>

        <?php
        function numerate_pages($i)
        {
            global $page;

            if ($i == $page)
                echo '<li class="page-item active"><a class="page-link" href="/admin/index?&page=' . $i . '">' . $i . '</a></li>';
            else
                echo '<li class="page-item"><a class="page-link" href="/admin/index?&page=' . $i . '">' . $i . '</a></li>';
        }

        echo_pagination($total_pages, $page, 'numerate_pages'); ?>

        <li class="page-item <?php if ($page == $total_pages) echo 'disabled' ?>">
            <a class="page-link"
               href="/admin/index?&page=<?php echo $page + 1 ?>" <?php if ($page == $total_pages) echo 'tabindex="-1" aria-disabled="true"' ?>>Next</a>
        </li>
    </ul>
</nav>

<!-- Modal New Title -->

<div class="modal fade" id="new-title-modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">New Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="new-title">
                    <div class="mb-3 row">
                        <label for="kinopoisk_id" class="col-sm-2 col-form-label">Kinopoisk Id</label>
                        <div class="col-sm-10">
                            <input type="number" name="kinopoisk_id" class="form-control" id="kinopoisk_id" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="poster_url" class="col-sm-2 col-form-label">Poster Url</label>
                        <div class="col-sm-10">
                            <input type="text" name="poster_url" class="form-control" id="poster_url" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" form="new-title">
            </div>
        </div>
    </div>
</div>

<script>
    let xhr = null;

    function removeTitle(e, id) {
        e.preventDefault();

        if (xhr) {
            xhr.abort();
        }

        const data = {
            id: id
        };

        xhr = $.ajax({
            url: '<?php echo '//' . $_SERVER['HTTP_HOST'] . '/admin/removeTitle' ?>',
            data: data,
            method: "DELETE",
            success: function () {
                e.target.classList.add('disabled');
            }
        });
    }

    $('#new-title').submit((e) => {
        e.preventDefault();
        const data = $('#new-title').serializeArray();

        $.post({
            url: '<?php echo '//' . $_SERVER['HTTP_HOST'] . '/admin/addTitle' ?>',
            data: data,
        }).always(() => {
            window.location.reload();
        });
    });

    activateNavLink("Admin");
</script>