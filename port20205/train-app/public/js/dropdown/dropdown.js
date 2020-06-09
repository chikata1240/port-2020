(function () {

  // 矢印クリック時の挙動
  const $hamburger = document.querySelector('.composer_button');
  $hamburger.addEventListener('click', function(){
    $hamburger.classList.toggle('is-active');
  });

  // 矢印クリック時のcomposerの挙動
  const $composer = document.getElementById('composer');
  $hamburger.addEventListener('click', function () {
    if ($composer.classList.contains('composer_visible')) {
      composerHidden();
    } else {
      composerVisible();
    }
  });

  function composerVisible() {
    $composer.classList.toggle('composer_visible');
  }
  function composerHidden() {
    $composer.classList.toggle('composer_hidden');
  }
})();