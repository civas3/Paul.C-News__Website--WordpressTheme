document.addEventListener('DOMContentLoaded', () => {
  const progressBar = document.querySelector('.progress-bar');
  const progressText = document.querySelector('.progress-text');
  const article = document.querySelector('article');

  let articleHeight, articleTop;

  // Function to calculate the height and top offset of the article
  const calculateArticleMetrics = () => {
    articleHeight = article.scrollHeight;
    articleTop = article.getBoundingClientRect().top + window.scrollY;
  };

  // Initial calculation of article metrics
  calculateArticleMetrics();

  // Recalculate article metrics on resize
  window.addEventListener('resize', calculateArticleMetrics);

  // Function to detect mobile device
  const isMobile = () => {
    return /Mobi|Android/i.test(navigator.userAgent);
  };

  // Update the progress bar and text on scroll
  const updateProgressBar = () => {
    const scrollY = window.scrollY || window.pageYOffset;

    // Calculate the percentage scrolled within the article
    let scrollPercentage = ((scrollY - articleTop) / (articleHeight - window.innerHeight)) * 100;

    // If on mobile, make the progress bar move twice as fast
    if (isMobile()) {
      scrollPercentage *= 1.2;
    }

    // Cap the percentage at 100% and ensure it does not go below 0%
    scrollPercentage = Math.min(Math.max(scrollPercentage, 0), 100);

    // Update the width and text of the progress bar
    progressBar.style.width = `${scrollPercentage}%`;
    progressText.textContent = `${Math.round(scrollPercentage)}%`;
  };

  // Attach the scroll event listener
  window.addEventListener('scroll', updateProgressBar);

  // Initial call to updateProgressBar
  updateProgressBar();
});
