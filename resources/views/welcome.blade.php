<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pusher Test</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <style>
    #message-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      padding: 20px;
      background-color: #f8f9fa;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      text-align: left;
    }
    .message {
      margin-bottom: 10px;
      padding: 10px;
      background-color: #e9ecef;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .message p {
      margin: 5px 0;
    }
  </style>
  <script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('0ce68336ab7915f48056', {
      cluster: 'mt1'
    });

    var channel = pusher.subscribe('push-data');
    channel.bind('push-event', function(data) {
      displayMessage(data);
    });

    function displayMessage(data) {
      var messageContainer = document.getElementById('message-container');
      if (!messageContainer) {
        messageContainer = document.createElement('div');
        messageContainer.id = 'message-container';
        document.body.appendChild(messageContainer);
      }

      var newMessage = document.createElement('div');
      newMessage.className = 'message';

      var nameElement = document.createElement('p');
      nameElement.textContent = 'Name: ' + data.user.name;

      var passwordElement = document.createElement('p');
      passwordElement.textContent = 'Password: ' + data.user.password;

      var phoneElement = document.createElement('p');
      phoneElement.textContent = 'Phone: ' + data.user.phone;

      var emailElement = document.createElement('p');
      emailElement.textContent = 'Email: ' + data.user.email;

      newMessage.appendChild(nameElement);
      newMessage.appendChild(passwordElement);
      newMessage.appendChild(phoneElement);
      newMessage.appendChild(emailElement);

      messageContainer.appendChild(newMessage);
    }
  </script>
</head>
<body>
  
</body>
</html>