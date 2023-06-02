<?php
/*
 * Template Name: articales
 * Description: A Page Template with a darker design.
 */

// Code to display Page goes here...

get_header(); ?>
 <div class="page-header">
                    <div class="container"><h1 class="entry-title" style="margin: 0;color: #fff;font-family: Trajan Pro;font-size: 24px;">
				<?php the_title(); ?>
			</h1></div></div>
<div style="margin-left: 191px!important;">
<?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
</div>
<div class="content">
    	<div class="container">
            
            <div class="row">
  <div class="col-sm-9">
     <section>
                       <div class="">
            
          <?php
$my_id = 1795;
$post_id_5369 = get_post($my_id);
$content = $post_id_5369->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;
?>
          <?php query_posts('category_name=Articles&showposts=9999&orderby=date and &order=DESC');
		 
		  ?>
          <ul> 
          <?php
while (have_posts()) : the_post();
  // do whatever you want
 
?>
<br/>
 <li style="list-style:square"><span><?php the_time('m/d/Y'); ?>&nbsp;-&nbsp;</span><b><a href="<?php  the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></b></li>
 

<?php
endwhile;
?>
</ul>
       </div>
                       </section></div> 
         <div id="sidebar" class="col-sm-3"><?php get_sidebar(); ?> </div></div>
              	</div>   
</div>
<?php get_footer(); ?>