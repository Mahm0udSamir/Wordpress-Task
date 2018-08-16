@extends('layouts.app')

@section('content')

  <div class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators justify-content-lg-start">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <?php
          global $post;
          $counter = 0;
          $args = array( 'posts_per_page' => 4 ,'category_name'  => 'Uncategorized');
          $myposts = get_posts( $args );
          foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <div class="carousel-item {{ $counter === 0? "active" : " " }}" style="height: 475px;">
              <img class="d-block w-100 " src="<?php echo get_the_post_thumbnail_url( ); ?>">
              <div class="carousel-caption d-none d-md-block">
                  <p><?php the_title(); ?><br>
                    <span class="border">
                      <a href="<?php the_permalink(); ?>">Learn More <i class="fas fa-chevron-right"></i> </a>
                    </span>
                  </p> 
              </div>
            </div>
            <?php
            $counter++;
          endforeach;
          wp_reset_postdata();?>  
      </div>
    </div>
  </div>

   <!-- start story -->
   <div class="container">
      <div class="row story">
          <?php
          global $post;
          $counter = 0;
          $args = array( 'posts_per_page' => 1 ,'category_name'  => 'story');
          $myposts = get_posts( $args );
          foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <div class="col-md-5 bg-story">
              <img class="d-block w-100 " src="<?php echo get_the_post_thumbnail_url( ); ?>">              
            </div>
            <div class="col-md-7">
              <h1><?php the_title(); ?></h1>
              <p>
                  <?php the_content(); ?>
              </p>
              <span class="border">
                <a href="<?php the_permalink(); ?>">Continue Reading <i class="fas fa-chevron-right"></i> </a>
              </span>              
            </div>
          <?php
          endforeach;
          wp_reset_postdata();?>  
      </div>
  </div>
  <!-- end story -->


@endsection

