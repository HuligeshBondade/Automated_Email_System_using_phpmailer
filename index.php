<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form with Delay</title>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700,400italic');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-weight: 300;
      font-size: 14px;
      line-height: 1.6;
      color: #444;
      background: #f3f3f3;
      font-family: 'Open Sans', sans-serif;
      padding: 20px;
    }

    .container {
      max-width: 500px;
      width: 100%;
      margin: 0 auto;
      position: relative;
      padding: 20px;
      background: #fff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    h1 {
      margin-bottom: 10px;
      font-size: 40px;
      text-align: center;
      color: #333;
      font-family: 'Brush Script MT', sans-serif;
      font-style: italic;
      font-weight: 700;
      letter-spacing: 3px;
    }

    #contact {
      padding: 25px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    #contact input,
    #contact textarea,
    #contact select {
      font: 400 14px 'Open Sans', sans-serif;
      width: 100%;
      border: 1px solid #ccc;
      background: #f9f9f9;
      margin: 10px 0;
      padding: 10px;
      border-radius: 4px;
      transition: border-color 0.3s ease;
    }

    #contact input:focus,
    #contact textarea:focus,
    #contact select:focus {
      border-color: #17a2b8;
    }

    fieldset {
      border: none;
      padding: 0;
      width: 100%;
    }

    textarea {
      height: 150px;
      max-width: 100%;
      resize: none;
      width: 100%;
    }

    button {
      cursor: pointer;
      width: 100%;
      border: none;
      background: #28a745;
      color: #fff;
      margin: 0 0 10px;
      padding: 14px;
      font-size: 18px;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #218838;
    }

    .delay-field {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .countdown {
      text-align: center;
      font-size: 20px;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <form id="contact" action="mail.php" method="post">
      <h1>Email Form</h1>

      <fieldset>
        <input id="name" name="name" type="text" placeholder="Your Name" tabindex="1" required autofocus>
      </fieldset>
      <fieldset>
        <input id="recipient" name="recipient" type="email" placeholder="Recipient Email Address" tabindex="2" required>
      </fieldset>
      <fieldset>
        <input id="subject" name="subject" type="text" placeholder="Subject" tabindex="3" required>
      </fieldset>
      <fieldset>
        <textarea id="message" name="message" placeholder="Message" tabindex="4" required></textarea>
      </fieldset>
      <fieldset class="delay-field">
        <input id="delay" type="number" placeholder="Delay" min="0" required>
        <select id="time-unit">
          <option value="seconds">Seconds</option>
          <option value="minutes">Minutes</option>
        </select>
      </fieldset>
      <fieldset>
        <button type="button" name="send" id="contact-submit" onclick="handleSubmit()">Submit Now</button>
      </fieldset>
    </form>
    <div class="countdown" id="countdown"></div>
  </div>

  <script>
    function handleSubmit() {
      const name = document.getElementById('name').value.trim();
      const recipient = document.getElementById('recipient').value.trim();
      const subject = document.getElementById('subject').value.trim();
      const message = document.getElementById('message').value.trim();
      const delayInput = document.getElementById('delay').value.trim();
      const timeUnit = document.getElementById('time-unit').value;

      if (!name || !recipient || !subject || !message || !delayInput) {
        alert('Please fill out all fields.');
        return;
      }

      let delay = parseInt(delayInput);
      if (isNaN(delay) || delay < 0) {
        alert('Please enter a valid delay time.');
        return;
      }

      if (timeUnit === 'minutes') {
        delay *= 60;
      }

      console.log(`Delay set to ${delay} seconds`);
      startCountdown(delay);
    }

    function startCountdown(seconds) {
      const countdownElement = document.getElementById('countdown');
      countdownElement.textContent = `Form will be submitted in ${seconds} seconds.`;
      let interval = setInterval(() => {
        seconds--;
        countdownElement.textContent = `Form will be submitted in ${seconds} seconds.`;
        if (seconds <= 0) {
          clearInterval(interval);
          console.log('Submitting form');
          document.getElementById('contact').submit();
        }
      }, 1000);
    }
  </script>
</body>

</html>
