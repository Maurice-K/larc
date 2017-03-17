<?php /** * The template for displaying all single posts. * * @package Friendship Theme */ get_header( 'custom'); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="general">
            <div class="row fullwidth">
                <div class="small-12 medium-9 columns">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="header column row">
                        <div class="small-12 medium-12 large-12 columns">
                            <h1>John Curtis Annual Invitational Race</h1>
                        </div>
                    </div>

                    <div class="main-content column row">
                        <div class="small-12 medium-9 columns">
                            <p>Director: Moe</p>
                            <img src="http://placehold.it/800x200">
                            <p>The John Curtis Invitation is one of the most renowned racing tournaments across the state of Louisiana. Being helpd in multiple locations and given the most invitational points for consecutive years. </p>
                        </div>
                    </div>

                    <div class="table column row">
                        <div class="small-12 medium-9 columns">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Time</th>
                                        <th>Athlete/Team</th>
                                        <th>Grade</th>
                                        <th>Meet/Date</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Content Goes Here</td>
                                        <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                                        <td>Content Goes Here</td>
                                        <td>Content Goes Here</td>
                                    </tr>
                                    <tr>
                                        <td>Content Goes Here</td>
                                        <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                                        <td>Content Goes Here</td>
                                        <td>Content Goes Here</td>
                                    </tr>
                                    <tr>
                                        <td>Content Goes Here</td>
                                        <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                                        <td>Content Goes Here</td>
                                        <td>Content Goes Here</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- <?php get_template_part( 'template-parts/content', 'single' ); ?> -->

                    <?php endwhile; // End of the loop. ?>
                </div>
                <div class="small-12 medium-3 columns">
                    <?php get_sidebar(); ?>
                </div>

            </div>
        </section>
    </main>
    <!-- #main -->
</div>
<!-- #primary -->


<?php get_footer( 'custom'); ?>