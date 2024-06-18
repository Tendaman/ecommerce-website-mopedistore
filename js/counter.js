document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.counter');
    const speed = 600; // The lower the number, the faster the count

    const startCounting = (counter) => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText.replace(/[^0-9]/g, ''); // Remove any non-numeric characters
            const suffix = counter.getAttribute('data-suffix') || ''; // Get suffix if any

            // Lower increment to make it slower
            const increment = target / speed;

            // Check if target is reached
            if (count < target) {
                // Add increment
                counter.innerText = Math.ceil(count + increment) + suffix;
                // Call function every ms
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = target + suffix;
            }
        };

        updateCount();
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const counter = entry.target;
            if (entry.isIntersecting) {
                startCounting(counter);
            } else {
                counter.innerText = '0' + (counter.getAttribute('data-suffix') || ''); // Reset counter
            }
        });
    }, {
        threshold: 0.5 // Adjust threshold as needed
    });

    counters.forEach(counter => {
        observer.observe(counter);
    });
});
