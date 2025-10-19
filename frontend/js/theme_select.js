document.addEventListener('DOMContentLoaded', () =>{
    const themeSelector = document.getElementById('theme-selector');
    const body = document.body;

    body.className = 'light-theme';
    themeSelector.value = 'light-theme';

    themeSelector.addEventListener('change', (event)=>{
        const selectedTheme = event.target.value;
        body.classList.remove('light-theme', 'green-theme', 'yellow-theme');
        body.classList.add(selectedTheme);
})});