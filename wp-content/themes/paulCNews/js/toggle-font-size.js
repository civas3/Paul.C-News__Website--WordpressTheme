function toggleTextSize() {
    const articleContent = document.getElementById('article-body__content');
    const currentFontSize = parseFloat(window.getComputedStyle(articleContent).fontSize);

    // Define font size options
    const fontSizeOptions = [17, 18, 20, 16];
    const nextFontSize = fontSizeOptions[(fontSizeOptions.indexOf(currentFontSize) + 1) % fontSizeOptions.length];

    // Set the new font size
    articleContent.style.fontSize = nextFontSize + 'px';
  }