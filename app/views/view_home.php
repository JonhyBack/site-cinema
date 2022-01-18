<?php
require_once "shared.php"
?>

<h1>List of titles</h1>

<?php
function echo_title_rating($title)
{
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $title["rating"])
            echo '<span class="fa fa-star checked"></span>';
        else
            echo '<span class="fa fa-star"></span>';
    }
}

global $page;

$titles = $data['titles'];
$total_pages = $data['total_pages'];
$page = $data['page'];

echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">';
foreach ($titles as $title) {
    echo '<div class="col">
                        <div class="card mb-5">
                            <a class="card-body scale" href="/watch/index?id=' . $title["kinopoisk_id"] . '">
                                <img src="' . $title["poster_url"] . '" class="img-thumbnail" alt="' . $title["title"] . '_img">
                                <h5 class="card-title">' . $title["title"] . '</h5>';

    echo '<p>Rated: ';
    echo_title_rating($title);

    echo '</p>';
    echo '</a>
                    </div>
                </div>
                ';
}
echo '</div>';
?>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">

        <li class="page-item <?php if ($page == 1) echo 'disabled' ?>">
            <a class="page-link"
               href="/home/index?&page=<?php echo $page - 1 ?>" <?php if ($page == 1) echo 'tabindex="-1" aria-disabled="true"' ?>>Previous</a>
        </li>

        <?php
        function numerate_pages($i) {
            global $page;

            if ($i == $page)
                echo '<li class="page-item active"><a class="page-link" href="/home/index?&page=' . $i . '">' . $i . '</a></li>';
            else
                echo '<li class="page-item"><a class="page-link" href="/home/index?&page=' . $i . '">' . $i . '</a></li>';
        }

        echo_pagination($total_pages, $page, 'numerate_pages'); ?>

        <li class="page-item <?php if ($page == $total_pages) echo 'disabled' ?>">
            <a class="page-link"
               href="/home/index?&page=<?php echo $page + 1 ?>" <?php if ($page == $total_pages) echo 'tabindex="-1" aria-disabled="true"' ?>>Next</a>
        </li>
    </ul>
</nav>

<script>
    activateNavLink("Home")
</script>
