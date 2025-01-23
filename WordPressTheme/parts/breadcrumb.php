<?php if (function_exists('bcn_display')) : ?>
  <div class="breadcrumbs breadcrumbs-margin">
    <!-- 404ページのみ白文字の為class追加 -->
    <div class="breadcrumbs__inner inner <?php echo is_404() ? 'breadcrumbs__inner--404' : ''; ?>">
      <nav class="breadcrumb" aria-label="パンくずリスト">
        <?php bcn_display(); ?>
      </nav>
    </div>
  </div>
<?php endif; ?>