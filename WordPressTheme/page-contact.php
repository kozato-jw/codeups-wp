<?php get_header(); ?>
<main>
  <section class="mv-sub contact-mv">
    <h1 class="mv-sub__title">contact</h1>
    <picture>
      <source media="(min-width:768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-mv_pc.jpg">
      <img class="mv-sub__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-mv_sp.jpg" alt="青い波と白い砂浜の波打ち際の画像">
    </picture>
  </section>
  <div class="breadcrumbs contact-breadcrumbs">
    <div class="breadcrumbs__inner inner"><?php get_template_part('parts/breadcrumb'); ?></div>
  </div>
  <div class="contact contact-form icon-fish icon-fish--contact">
    <div class="inner-sub">
      <form action="" method="post" class="contact__form form" id="contactForm">
        <!-- <div class="form__error-text-wrapper">
            <p class="form__error-text">※必須項目が入力されていません。
              <br class="u-mobile">入力してください。
            </p>
          </div> -->
        <dl class="form__item">
          <dt class="form__head">お名前
            <span class="form__required">必須</span>
          </dt>
          <dd class="form__content">
            <input type="text" name="name" placeholder="沖縄　太郎" value="" class="form__input" />
          </dd>
        </dl>
        <dl class="form__item">
          <dt class="form__head">メールアドレス
            <span class="form__required">必須</span>
          </dt>
          <dd class="form__content">
            <input type="email" name="mail_address" placeholder="aaa000@ggmail.com" value="" class="form__input" />
          </dd>
        </dl>
        <dl class="form__item">
          <dt class="form__head">電話番号
            <span class="form__required">必須</span>
          </dt>
          <dd class="form__content">
            <input type="tel" name="tel" placeholder="000-0000-0000" value="" class="form__input" />
          </dd>
        </dl>
        <dl class="form__item">
          <dt class="form__head">お問合わせ項目
            <span class="form__required">必須</span>
          </dt>
          <dd class="form__check">
            <label>
              <input type="checkbox" name="course" value="ダイビング講習について" />
              <span>ダイビング講習について</span>
            </label>
            <label>
              <input type="checkbox" name="fun" value="ファンデイビングについて" />
              <span>ファンダイビングについて</span>
            </label>
            <label>
              <input type="checkbox" name="experience" value="体験ダイビングについて" />
              <span>体験ダイビングについて</span>
            </label>
          </dd>
        </dl>
        <dl class="form__item">
          <dt class="form__head">キャンペーン</dt>
          <dd class="">
            <select name="campaign">
              <option value="">キャンペーン内容を選択</option>
              <option value="キャンペーン1">キャンペーン1</option>
              <option value="キャンペーン2">キャンペーン2</option>
              <option value="キャンペーン3">キャンペーン3</option>
            </select>
          </dd>
        </dl>
        <dl class="form__item">
          <dt class="form__head">お問合せ内容
            <span class="form__required">必須</span>
          </dt>
          <dd class="form__content">
            <textarea name="content" class="form__input"></textarea>
          </dd>
        </dl>
        <p class="form__consent">
          <label>
            <input type="checkbox" id="consentCheckbox" name="required" />
            <span>個人情報の取り扱いについて同意のうえ送信します。</span>
          </label>
        </p>
        <div class="form__btn">
          <button type="submit" id="submitButton" class="btn btn--disabled" disabled>
            <span class="btn__inner btn__inner--form">send</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
<?php get_footer(); ?>