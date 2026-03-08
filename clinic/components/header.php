<header class="algo-header">
  <div class="algo-header__inner">
    <div class="algo-header__logo">
      <a href="./index.php">ALGO Inc.</a>
    </div>
    <button class="hamburger" id="js-hamburger" aria-label="メニューを開く" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav class="algo-header__nav" id="js-nav">
      <ul>
        <li><a href="./index.php">HOME</a></li>
        <li><a href="./concept.php">CONCEPT</a></li>
        <li><a href="./evidence.php">EVIDENCE</a></li>
        <li><a href="./products.php">PRODUCTS</a></li>
        <li><a href="./company.php">COMPANY</a></li>
        <li><a href="./blog.php">BLOG</a></li>
        <li><a href="./contact.php" class="nav-contact-btn">CONTACT</a></li>
      </ul>
    </nav>
  </div>
</header>
<script>
(function(){
  var btn = document.getElementById('js-hamburger');
  var nav = document.getElementById('js-nav');
  if(!btn || !nav) return;
  btn.addEventListener('click', function(){
    var open = btn.classList.toggle('is-open');
    nav.classList.toggle('is-open');
    btn.setAttribute('aria-expanded', open);
    document.body.style.overflow = open ? 'hidden' : '';
  });
  nav.querySelectorAll('a').forEach(function(a){
    a.addEventListener('click', function(){
      btn.classList.remove('is-open');
      nav.classList.remove('is-open');
      btn.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    });
  });
})();
</script>
