<section class="testimonials">
  <?php $testimonial = $site->testimonials()->toStructure()->shuffle()->first(); ?>
  <div class="quote">
    <blockquote>
      <?= $testimonial->testimonial()->kt() ?>
    </blockquote>
    <cite><?= $testimonial->customer()->html() ?></cite>
  </div>
</section>
