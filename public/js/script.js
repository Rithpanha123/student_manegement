(function(){
  const sidebar   = document.getElementById('sidebar');
  const overlay   = document.getElementById('overlay');
  const hamburger = document.getElementById('hamburger');
  const menuItems = document.querySelectorAll('.menu-item');
  const isMobile  = () => window.innerWidth <= 900;

  /* ---------------------------------------------------------
     Replay the one-by-one stagger whenever the mobile drawer
     opens, since on page load the sidebar itself starts
     off-canvas and the items already finished animating by
     the time someone opens it.
     --------------------------------------------------------- */
  function replayMenuStagger(){
    menuItems.forEach(item => {
      item.classList.remove('menu-item-replay');
    });
    // force reflow so re-adding the class restarts the animation
    void sidebar.offsetWidth;
    menuItems.forEach(item => {
      item.classList.add('menu-item-replay');
    });
  }

  function openSidebar(){
    sidebar.classList.add('open');
    overlay.classList.add('open');
    hamburger.setAttribute('aria-expanded', 'true');
    if (isMobile()) replayMenuStagger();
  }

  function closeSidebar(){
    sidebar.classList.remove('open');
    overlay.classList.remove('open');
    hamburger.setAttribute('aria-expanded', 'false');
    document.dispatchEvent(new Event('sidebarClosed'));
  }

  hamburger.addEventListener('click', () => {
    sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
  });
  overlay.addEventListener('click', closeSidebar);

  window.addEventListener('resize', () => {
    if (!isMobile()) closeSidebar();
  });

  /* ---------------------------------------------------------
     Dropdown toggle
     --------------------------------------------------------- */
  document.querySelectorAll('.nav-toggle').forEach(toggle => {
    toggle.addEventListener('click', function(e){
      e.preventDefault();

      const targetId = this.dataset.target;
      const dropdown = document.getElementById(targetId);
      if (!dropdown) return;

      document.querySelectorAll('.dropdown-content.open').forEach(d => {
        if (d.id !== targetId) {
          d.classList.remove('open');
          const parentToggle = d.closest('.nav-dropdown').querySelector('.nav-toggle');
          if (parentToggle) parentToggle.classList.remove('active');
        }
      });

      dropdown.classList.toggle('open');
      this.classList.toggle('active');
    });
  });

  document.addEventListener('click', function(e){
    if (!e.target.closest('.nav-dropdown')) {
      document.querySelectorAll('.dropdown-content.open').forEach(d => {
        d.classList.remove('open');
        const parentToggle = d.closest('.nav-dropdown').querySelector('.nav-toggle');
        if (parentToggle) parentToggle.classList.remove('active');
      });
    }
  });

  document.addEventListener('sidebarClosed', function(){
    document.querySelectorAll('.dropdown-content.open').forEach(d => {
      d.classList.remove('open');
      const parentToggle = d.closest('.nav-dropdown').querySelector('.nav-toggle');
      if (parentToggle) parentToggle.classList.remove('active');
    });
  });
})();
