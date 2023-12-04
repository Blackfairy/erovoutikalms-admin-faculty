
    document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
    });
    // Submit button event listener
    document.querySelector('.submit').addEventListener('click', function () {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (validateEmail(email) && validatePassword(password)) {
            alert('Successfully signed in!');
        } else {
            alert('Invalid email or password!');
        }
    });

    // Email validation function
    function validateEmail(email) {
        let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    // Password validation function
    function validatePassword(password) {
        let re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        return re.test(String(password));
    }
    
    // Usage example:
    if (validateEmail(emailInput.value) && validatePassword(passwordInput.value)) {
        // Submit the form data to the server
    } else {
        alert('Please enter a valid email and password');
    }
    