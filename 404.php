<?php get_header(); ?>
<main class="page">
    <section class="error">
        <div class="error__container container">
            <nav class="breadcrumbs" aria-label="breadcrumbs menu">
                <div class="breadcrumbs__container">
                    <ul class="breadcrumbs__items">
                        <li class="breadcrumbs__item">
                            <a href="/" class="breadcrumbs__link">Home</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <span class="breadcrumbs__link active">404</span>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="error__body">
                <div class="error__status title-lg">
                    404
                </div>
                <h1 class="error__title title-xs" style="margin-top: 1rem">
                    <span>Error:</span> page not found
                </h1>
                <p class="error__subtitle" style="margin-top: 1rem">
                    The address is typed incorrectly, or such page does not exist on the site at present
                </p>
                <a href="<?php echo get_home_url() ?>" style="margin-top: 1rem" class="error__btn btn btn-primary btn-md">Go back to home
                    page</a>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>