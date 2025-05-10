(function() {
    // Initialize EmailJS with your user ID
    emailjs.init("vtE1Mops9vGjieUYP");
    
    window.onload = function() {
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Show loading indicator
            const submitButton = document.querySelector('.submit-button');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Sending...';
            submitButton.disabled = true;
            
            // Get form data
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            
            // Prepare template parameters
            const templateParams = {
                from_name: name,
                from_email: email,
                message: message,
                to_name: "Shashank Sharma"
            };
            
            // Send email using EmailJS
            emailjs.send('service_shashank', 'template_hxnd2u4', templateParams)
                .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    
                    // Show success message
                    showNotification('Thank you! Your message has been sent successfully.', 'success');
                    
                    // Reset form
                    document.getElementById('contactForm').reset();
                }, function(error) {
                    console.log('FAILED...', error);
                    
                    // Show error message
                    showNotification('Sorry, there was an error sending your message. Please try again.', 'error');
                })
                .finally(function() {
                    // Restore button state
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                });
        });
    };
    
    // Function to show notification
    function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        
        // Add to DOM
        document.body.appendChild(notification);
        
        // Show notification
        setTimeout(() => {
            notification.classList.add('show');
        }, 10);
        
        // Remove notification after 5 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 5000);
    }
    
    // Add test error button for demonstration
    window.addEventListener('DOMContentLoaded', function() {
        // Create test button
        const testErrorBtn = document.createElement('button');
        testErrorBtn.textContent = 'Test Error Notification';
        testErrorBtn.className = 'test-error-btn';
        testErrorBtn.style.position = 'fixed';
        testErrorBtn.style.bottom = '80px';
        testErrorBtn.style.right = '20px';
        testErrorBtn.style.padding = '10px 15px';
        testErrorBtn.style.backgroundColor = 'var(--error-color)';
        testErrorBtn.style.color = 'white';
        testErrorBtn.style.border = 'none';
        testErrorBtn.style.borderRadius = '5px';
        testErrorBtn.style.cursor = 'pointer';
        testErrorBtn.style.zIndex = '999';
        
        // Add click event
        testErrorBtn.addEventListener('click', function() {
            showNotification('This is an example error message. Your message could not be sent.', 'error');
        });
        
        // Add to DOM
        document.body.appendChild(testErrorBtn);
        
        // Create test success button
        const testSuccessBtn = document.createElement('button');
        testSuccessBtn.textContent = 'Test Success Notification';
        testSuccessBtn.className = 'test-success-btn';
        testSuccessBtn.style.position = 'fixed';
        testSuccessBtn.style.bottom = '130px';
        testSuccessBtn.style.right = '20px';
        testSuccessBtn.style.padding = '10px 15px';
        testSuccessBtn.style.backgroundColor = 'var(--success-color)';
        testSuccessBtn.style.color = 'white';
        testSuccessBtn.style.border = 'none';
        testSuccessBtn.style.borderRadius = '5px';
        testSuccessBtn.style.cursor = 'pointer';
        testSuccessBtn.style.zIndex = '999';
        
        // Add click event
        testSuccessBtn.addEventListener('click', function() {
            showNotification('This is an example success message. Your message has been sent successfully!', 'success');
        });
        
        // Add to DOM
        document.body.appendChild(testSuccessBtn);
    });
})();