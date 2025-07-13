// Theme Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const html = document.documentElement;
    
    // Check for saved theme preference or default to 'light'
    const currentTheme = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-theme', currentTheme);
    
    // Check system preference on load if no saved preference
    if (!localStorage.getItem('theme')) {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const defaultTheme = prefersDark ? 'dark' : 'light';
        html.setAttribute('data-theme', defaultTheme);
        localStorage.setItem('theme', defaultTheme);
    }
    
    // Listen for theme changes from other pages
    window.addEventListener('storage', function(e) {
        if (e.key === 'theme') {
            html.setAttribute('data-theme', e.newValue || 'light');
        }
    });
});

// Function to toggle theme (can be called from anywhere)
function toggleTheme() {
    const html = document.documentElement;
    const currentTheme = html.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    
    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    
    // Dispatch custom event for other components
    window.dispatchEvent(new CustomEvent('themeChanged', { detail: { theme: newTheme } }));
}

// Function to set theme
function setTheme(theme) {
    const html = document.documentElement;
    html.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
    window.dispatchEvent(new CustomEvent('themeChanged', { detail: { theme: theme } }));
} 