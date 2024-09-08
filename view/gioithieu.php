<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Typing Animation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        h1,
        h2,
        h3 {
            color: #45a049;
        }

        .highlight {
            color: #FF5733;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }

        .margin-b {
            margin-bottom: 100px;
        }

        .box-c {
            width: 60%;
            margin-top: 100px;
            padding-left: 400px;
        }

        @media only screen and (max-width: 768px) {
            .box-c {
                width: 40%;
                margin-top: 50px;
                padding-left: 20px;
            }
        }

        .typing {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
            font-size: 38px;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {
            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: orange;
            }
        }

        .card {
            opacity: 0;
            transition: opacity 1s ease-in-out;
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card.visible {
            opacity: 1;
        }
    </style>
</head>

<body>

    <div class="box-c margin-b">
        <h1 class="typing">Introduction</h1>
        <div class="card">
            <p class="typing-text" style="color: orange; font-size: 30px;">Hello! We are the online clothing store X-SHOP.</p>
        </div>

        <h2 class="typing">Who Are We?</h2>
        <div class="card">
            <p class="typing-text" style="font-size: 28px;">We are a small but passionate group about fashion. We provide high-quality and stylish fashion products to our customers.</p>
        </div>

        <h2 class="typing">Our Mission</h2>
        <div class="card">
            <p class="typing-text" style="font-size: 28px;">Our mission is to bring absolute satisfaction to customers by providing the highest quality fashion products and the best customer service.</p>
        </div>

        <h2 class="typing">Why Choose Us?</h2>
        <div class="card">
            <p class="typing-text" style="font-size: 28px;">We are committed to product quality, reasonable prices, and dedicated customer service. Our team is ready to support you anytime, anywhere.</p>
        </div>

        <h2 class="typing">Contact</h2>
        <div class="card">
            <p class="typing-text" style="font-size: 28px;">If you have any questions or requests, please contact us via email: <a href='mailto:info@X-shop.com' class='highlight'>info@X-shop.com</a> or phone: <span class="highlight">0123-456-789</span>.</p>
        </div>

        <a href="index.php" class="button">Back to Home</a>
    </div>

</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typingSpeed = 50;
        const delayBetweenTexts = 500;
        const typingTexts = document.querySelectorAll('.typing-text');
        const cards = document.querySelectorAll('.card');

        function typeText(element, text, index, callback) {
            if (index < text.length) {
                element.innerHTML += text.charAt(index);
                setTimeout(() => typeText(element, text, index + 1, callback), typingSpeed);
            } else {
                if (callback) callback();
            }
        }

        function showCard(index) {
            if (index < cards.length) {
                const card = cards[index];
                const typingText = card.querySelector('.typing-text');
                const text = typingText.innerHTML;

                typingText.innerHTML = ''; // Clear the text for typing effect
                card.classList.add('visible'); // Show the card
                typeText(typingText, text, 0, () => {
                    setTimeout(() => showCard(index + 1), delayBetweenTexts);
                });
            }
        }

        showCard(0);
    });
</script>
