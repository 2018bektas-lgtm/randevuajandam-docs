(() => {
  const sidebar = document.querySelector('#sidebar');
  const menuButton = document.querySelector('[data-menu]');
  const search = document.querySelector('#search');

  menuButton?.addEventListener('click', () => sidebar.classList.toggle('is-open'));
  document.querySelectorAll('.navigation a').forEach((link) => {
    link.addEventListener('click', () => sidebar.classList.remove('is-open'));
  });

  document.querySelectorAll('[data-copy]').forEach((button) => {
    button.addEventListener('click', async () => {
      const source = document.querySelector(button.dataset.copy);
      if (!source) return;
      try {
        await navigator.clipboard.writeText(source.innerText);
        const original = button.textContent;
        button.textContent = 'Kopyalandı';
        window.setTimeout(() => { button.textContent = original; }, 1600);
      } catch (error) {
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

  document.addEventListener('keydown', (event) => {
    if (event.key === '/' && document.activeElement !== search && !['INPUT', 'TEXTAREA'].includes(document.activeElement?.tagName)) {
      event.preventDefault();
      search?.focus();
    }
    if (event.key === 'Escape') {
      sidebar.classList.remove('is-open');
      search?.blur();
    }
  });
})();
