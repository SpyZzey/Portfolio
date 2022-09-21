<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"/>
  <title>Simon Brebeck | Self-taught Full-Stack Developer</title>
  <link rel="stylesheet" href="/_lib/css/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" type="image/png" href="/_assets/images/mainframe/favicon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="/_lib/js/app.js" defer></script>
  <script src="/_lib/js/mouse_particles.js" defer></script>
</head>
<body>
<header>
  <nav id="navigation-menu">
    <a href="/"><img src="/_assets/images/mainframe/favicon.png" alt="Logo"></a>
    <a href="/#about_a">About</a>
    <a href="/#projects_a">Projects</a>
      <a href="/contact">Contact</a>
  </nav>
  <nav id="socials-menu">
    <a href="https://www.linkedin.com/in/simonbrebeck/" target="_blank" rel="noreferrer noopener"><img src="/_assets/images/brands/linkedin.png" alt="LinkedIn"></a>
    <a href="https://github.com/SpyZzey" target="_blank" rel="noreferrer noopener"><img src="/_assets/images/brands/github.png" alt="GitHub"></a>
  </nav>
</header>
<main class="page-contact">
  <h2>Contact Me!</h2>
  <form class="contact-form" action="/_lib/php/submit_message.php" method="post">
    <div class="form-group floating-label-container">
      <label for="name">Name</label>
      <input type="text" class="text-field" name="name" id="name" required>
    </div>
    <div class="form-group floating-label-container">
      <label for="email">Email</label>
      <input type="email" class="text-field" name="email" id="email" required>
    </div>
    <div class="form-group floating-label-container">
      <label for="message">Message</label>
      <textarea id="message"
                name="message"
                maxlength="2000"
                class="text-field text-area text-indicator"
                data-indicator="message-indicator" required></textarea>
      <span id="message-indicator" class="text-field-indicator">0 / 2000</span>
    </div>
    <button id="button--submit-message" type="submit" class="button--outline particle-color">Send Message</button>
  </form>
</main>
<footer>
  <div class="footer-text">
    <p class="copyright">
      &copy; 2021-2022 Simon Brebeck
    </p>
  </div>
  <a href="/impress.html">Impressum</a>
</footer>
</body>
</html>