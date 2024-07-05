  function toggleDarkMode() {

    const darkModePage = document.querySelector('.dark-mode-page');
    darkModePage.classList.toggle('dark-mode');

    const articleAccesabiltyNav = document.querySelector('.article-accesabilty-nav');
    articleAccesabiltyNav.classList.toggle('dark-mode_accesabilty-nav');

  }