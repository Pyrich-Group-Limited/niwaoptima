
<!DOCTYPE html>
<html>

<head>
    <title style="color: greenyellow ;"> NIWA REMINDER</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-top: 0;
            color: #333;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 5px;
            color: #333;
        }

        p {
            margin-bottom: 10px;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        b {
            color: #333;
        }

        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Your Reminder</h1>

        <h3>Subject: {{$data->subject}}</h3>
        <h3>Message: {{$data->message}}</h3>
        <h3>Reminder Type: {{$data->frequency}}</h3>


        <p>Reminder Of Your Document</p>
    </div>
</body>

</html>
