<?php
/*
Template Name: Teachers Page
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="site-content">

            <header class="entry-header">
                <h1 class="entry-title">Our Teachers</h1>
                <p>Passionate Teachers That Make A Difference</p>
            </header>

            <div class="teachers-grid" style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center; margin-top: 40px;">
                
                <?php
                // 1. 定义查询条件：只找 'teachers' 分类的文章
                $args = array(
                    'category_name' => 'teachers', // 确保你的分类别名是 teachers (全小写)
                    'posts_per_page' => -1,        // 显示所有老师
                    'orderby'        => 'date',
                    'order'          => 'ASC'
                );

                // 2. 开始查询
                $teacher_query = new WP_Query( $args );

                // 3. 循环输出
                if ( $teacher_query->have_posts() ) :
                    while ( $teacher_query->have_posts() ) : $teacher_query->the_post(); ?>

                        <div class="teacher-card" style="width: 250px; text-align: center; border: 1px solid #eee; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                            <!-- 显示头像 -->
                            <div class="teacher-image" style="margin-bottom: 15px;">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('thumbnail', array('style' => 'border-radius: 50%; width: 150px; height: 150px; object-fit: cover;')); ?>
                                <?php else : ?>
                                    <!-- 如果没传图，显示一个灰色圆圈 -->
                                    <div style="width: 150px; height: 150px; background: #ddd; border-radius: 50%; display: inline-block;"></div>
                                <?php endif; ?>
                            </div>

                            <!-- 显示名字 -->
                            <h3 style="color: #003366; margin: 10px 0;"><?php the_title(); ?></h3>
                            
                            <!-- 显示简介 -->
                            <div class="teacher-bio" style="font-size: 14px; color: #666;">
                                <?php the_content(); ?>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata(); // 重置查询
                else : ?>
                    <p>No teachers found.</p>
                <?php endif; ?>

            </div><!-- .teachers-grid -->

        </div><!-- .site-content -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>