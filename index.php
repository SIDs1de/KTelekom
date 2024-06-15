<?php get_header() ?>
<main class="main">
  <section class="economy">
    <div class="container">
      <div class="economy__inner">
        <div class="economy__big-img-wrapper wow animate__animated animate__fadeIn" data-wow-delay="0.8s" data-wow-duration="1s">
          <?php $f_big_img = get_field('f_big_img', 'option') ?>
          <img class="economy__big-img" src="<?= $f_big_img['url'] ?>" alt="<?= $f_big_img['alt'] ?>" />
        </div>
        <div class="economy__info">
          <h1 class="economy__title wow animate__animated animate__fadeIn" data-wow-delay="0.1s">
            <?php the_field('f_title', 'option'); ?>
          </h1>
          <ul class="economy__list wow animate__animated animate__fadeIn" data-wow-delay="0.3s">
            <?php
            // Loop through rows.
            while (have_rows('f_punkts', 'option')) : the_row(); ?>
              <li class="economy__item"><?php the_sub_field('title') ?></li>
            <?php
            endwhile; ?>
          </ul>
          <a class="economy__link main-btn wow animate__animated animate__fadeIn" data-wow-delay="0.5s" href=".tarifs" data-scroll-link>
            <?php the_field('f_btn_text', 'option') ?>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="tarifs">
    <div class="container">
      <div class="tarifs__inner">
        <h2 class="tarifs__title h2 wow animate__fadeIn animate__animated" data-wow-delay="0.2s" data-wow-duration="1s">
          <?php the_field('s_section_title', 'option') ?>
        </h2>
        <div class="tarifs__slider owl-carousel wow animate__animated animate__fadeIn" data-wow-delay="0.4s" data-wow-duration="1.5s">
          <?php while (have_rows('s_cards', 'option')) : the_row(); ?>
            <div class="tarifs__slider-item" id="tarif-<?php the_sub_field('title') ?>">
              <div class="tarifs__card card">
                <div class="card__inner">
                  <h3 class="card__title"><?php the_sub_field('title') ?></h3>
                  <span class="card__caption"> <?php the_sub_field('caption') ?> </span>
                  <p class="card__subtitle"><?php the_sub_field('subtitle') ?></p>
                  <p class="card__desc">
                    <?php the_sub_field('desc') ?>
                  </p>
                  <div class="card__input-wrapper">
                    <label class="card__label">
                      <?php require('parts/fake-checkbox.php') ?>
                      <input class="card__input checkbox vhidden" type="checkbox" name="tarif <?php the_sub_field('title') ?>" id="<?php the_sub_field('title') ?>" />
                      <div class="card__label-texts">
                        <span class="card__label-text"> <?php the_sub_field('label_up') ?> </span>
                        <span class="card__label-text"> <?php the_sub_field('label_down') ?> </span>
                      </div>
                    </label>
                  </div>
                  <div class="card__price-block">
                    <h3 class="card__price"><?php the_sub_field('price') ?></h3>
                    <span class="card__price-desc"><?php the_sub_field('per_time') ?></span>
                  </div>
                  <p class="card__addition">
                    <?php the_sub_field('addition') ?>
                  </p>
                  <button class="card__btn main-btn"><?php the_sub_field('btn_text') ?></button>
                </div>
              </div>
            </div>
          <?php endwhile; ?>

        </div>
      </div>
    </div>
  </section>
  <section class="connect">
    <div class="container">
      <div class="connect__inner">
        <h2 class="connect__title h2 wow animate__animated animate__fadeInDown" data-wow-delay="0.2s" data-wow-duration="1.5s">
          <?php the_field('t_title', 'option') ?>
        </h2>
        <ul class="connect__list">
          <?php while (have_rows('t_buttons', 'option')) : the_row(); ?>
            <li class="connect__item wow animate__animated animate__fadeIn" data-wow-delay="0.2s">
              <button class="connect__item-btn"><?php the_sub_field('title') ?></button>
            </li>
          <?php endwhile; ?>
        </ul>
        <form class="connect__form" action="#">
          <div class="connect__form-row">
            <input class="connect__input wow animate__animated animate__fadeIn" type="text" placeholder="<?php the_field('t_placeholder_1', 'option') ?>" required />
            <input class="connect__input wow animate__animated animate__fadeIn" data-phone-mask data-wow-delay="0.2s" type="text" placeholder="<?php the_field('t_placeholder_2', 'option') ?>" required />
            <button class="connect__btn main-btn wow animate__animated animate__fadeIn" data-wow-delay="0.4s" type="submit">
              <?php the_field('t_btn_text', 'option') ?>
            </button>
          </div>
          <div class="connect__form-row wow animate__animated animate__fadeIn" data-wow-delay="0.4s" data-wow-duration="1s">
            <label class="connect__form-label">
              <?php require('parts/fake-checkbox.php') ?>
              <input class="connect__checkbox-input checkbox vhidden" type="checkbox" name="<?php the_field('t_checkbox_text_1', 'option') ?>" id="<?php the_field('t_checkbox_text_1', 'option') ?>" required />
              <span class="connect__checkbox-text"><?php the_field('t_checkbox_text_1', 'option') ?></span>
            </label>
            <a class="connect__checkbox-link" href="<?php the_field('t_link', 'option') ?>" target="_blank"><?php the_field('t_checkbox_text_2', 'option') ?></a>
          </div>
        </form>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>