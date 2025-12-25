import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Form handling
document.addEventListener('DOMContentLoaded', function() {
    // Registration form
    const registrationForm = document.getElementById('registrationForm');
    if (registrationForm) {
        registrationForm.addEventListener('submit', function(e) {
            const submitBtn = registrationForm.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner"></span> ' + (submitBtn.dataset.loading || 'Submitting...');
                
                // Re-enable button after 3 seconds in case of error
                setTimeout(() => {
                    if (submitBtn.disabled) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }
                }, 3000);
            }
        });
    }

    // Trial form
    const trialForm = document.getElementById('trialForm');
    if (trialForm) {
        trialForm.addEventListener('submit', function(e) {
            const submitBtn = trialForm.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner"></span> ' + (submitBtn.dataset.loading || 'Submitting...');
                
                // Re-enable button after 3 seconds in case of error
                setTimeout(() => {
                    if (submitBtn.disabled) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }
                }, 3000);
            }
        });
    }
    
    // Auto-close modals on success message after 3 seconds
    const checkForSuccessAndClose = () => {
        const registrationModal = document.getElementById('registrationModal');
        const trialModal = document.getElementById('trialModal');
        
        // Check registration modal
        if (registrationModal && !registrationModal.classList.contains('hidden')) {
            const successMsg = registrationModal.querySelector('.alert-success');
            if (successMsg) {
                setTimeout(() => {
                    registrationModal.classList.add('hidden');
                    // Reset form
                    const form = document.getElementById('registrationForm');
                    if (form) form.reset();
                }, 3000);
            }
        }
        
        // Check trial modal
        if (trialModal && !trialModal.classList.contains('hidden')) {
            const successMsg = trialModal.querySelector('.alert-success');
            if (successMsg) {
                setTimeout(() => {
                    trialModal.classList.add('hidden');
                    // Reset form
                    const form = document.getElementById('trialForm');
                    if (form) form.reset();
                }, 3000);
            }
        }
    };
    
    // Check immediately and after a short delay
    checkForSuccessAndClose();
    setTimeout(checkForSuccessAndClose, 500);

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Close modals on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const registrationModal = document.getElementById('registrationModal');
            const trialModal = document.getElementById('trialModal');
            if (registrationModal && !registrationModal.classList.contains('hidden')) {
                registrationModal.classList.add('hidden');
            }
            if (trialModal && !trialModal.classList.contains('hidden')) {
                trialModal.classList.add('hidden');
            }
        }
    });

    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
});

