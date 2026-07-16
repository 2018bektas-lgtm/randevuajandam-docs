(() => {
  const sidebar = document.querySelector('#sidebar');
  const overlay = document.querySelector('[data-overlay]');
  const menuButton = document.querySelector('[data-menu]');
  const search = document.querySelector('#search');
  const navLinks = document.querySelectorAll('.navigation a');

  const closeMenu = () => {
    sidebar?.classList.remove('is-open');
    overlay?.classList.remove('is-open');
    if (overlay) overlay.hidden = true;
  };

  const openMenu = () => {
    sidebar?.classList.add('is-open');
    overlay?.classList.add('is-open');
    if (overlay) overlay.hidden = false;
  };

  menuButton?.addEventListener('click', () => {
    if (sidebar?.classList.contains('is-open')) closeMenu();
    else openMenu();
  });

  overlay?.addEventListener('click', closeMenu);
  navLinks.forEach((link) => link.addEventListener('click', closeMenu));

  document.querySelectorAll('[data-copy]').forEach((button) => {
    button.addEventListener('click', async () => {
      const source = document.querySelector(button.dataset.copy);
      if (!source) return;
      try {
        await navigator.clipboard.writeText(source.innerText);
        const original = button.textContent;
        button.textContent = 'Kopyalandı';
        window.setTimeout(() => { button.textContent = original; }, 1600);
      } catch {
        button.textContent = 'Kopyalanamadı';
      }
    });
  });

  search?.addEventListener('input', () => {
    const term = search.value.trim().toLocaleLowerCase('tr-TR');
    document.querySelectorAll('[data-searchable]').forEach((item) => {
      item.classList.toggle('hidden', term !== '' && !item.textContent.toLocaleLowerCase('tr-TR').includes(term));
    });
    document.querySelectorAll('[data-group]').forEach((group) => {
      const hasVisibleItem = [...group.querySelectorAll('[data-searchable]')].some((item) => !item.classList.contains('hidden'));
      group.classList.toggle('hidden', term !== '' && !hasVisibleItem);
    });
  });

  // Active section highlight in sidebar
  const sections = [...document.querySelectorAll('section[id], article.endpoint-group[id]')];
  const setActive = () => {
    const y = window.scrollY + 96;
    let current = sections[0]?.id;
    for (const section of sections) {
      if (section.offsetTop <= y) current = section.id;
    }
    navLinks.forEach((link) => {
      const href = link.getAttribute('href')?.slice(1);
      link.style.color = '';
      link.style.background = '';
      if (href === current) {
        link.style.color = '#fff';
        link.style.background = 'rgba(255,255,255,0.08)';
      }
    });
  };
  window.addEventListener('scroll', setActive, { passive: true });
  setActive();

  document.addEventListener('keydown', (event) => {
    if (event.key === '/' && document.activeElement !== search && !['INPUT', 'TEXTAREA'].includes(document.activeElement?.tagName)) {
      event.preventDefault();
      search?.focus();
    }
    if (event.key === 'Escape') {
      closeMenu();
      search?.blur();
    }
  });
})();
