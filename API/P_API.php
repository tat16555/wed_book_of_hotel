<!DOCTYPE html>
<html>
<head>
    <title>Generate API Key</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        .api-key {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            margin-top: 20px;
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generate API Key</h2>
        <button id="generateBtn">Generate</button>
        <div id="apiKeyDisplay" class="api-key"></div>
    </div>

    <script>
        document.getElementById('generateBtn').addEventListener('click', function() {
            fetch('generate_api_key.php', {
                method: 'POST'
            })
            .then(response => response.text())
            .then(apiKey => {
                document.getElementById('apiKeyDisplay').innerText = 'Your API Key: ' + apiKey;
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
