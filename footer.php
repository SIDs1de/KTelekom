<footer class="footer">
  <div class="container">
    <div class="footer__inner">
      <div class="footer__left">
        <div class="footer__logo-wrapper logo wow animate__animated animate__fadeIn" data-wow-duration="2.5s">
          <?php require('parts/logo.php') ?>
        </div>
        <small class="footer__copy wow animate__animated animate__fadeIn" data-wow-delay="0.2s"><?php the_field('fo_copy', 'option') ?></small>
      </div>
      <div class="footer__right">
        <ul class="footer__socials">
          <?php while (have_rows('fo_soc', 'option')) : the_row(); ?>
            <li class="footer__social wow animate__animated animate__fadeIn" data-wow-delay="0.4s">
              <a class="footer__social-link" href="<?php the_sub_field('link') ?>" target="_blank">
                <?php $img = get_sub_field('img') ?>
                <img class="footer__social-img" src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>" />
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </div>
</footer>
</main>

<?php wp_footer(); ?>
</body>

</html>