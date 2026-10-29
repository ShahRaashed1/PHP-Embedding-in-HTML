<!DOCTYPE html>
<html>
<head>
    <title>PHP Embedded in HTML</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            margin: 0;
            padding: 40px;
        }

        .container {
            background-color: white;
            width: 500px;
            margin: auto;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.3);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
        }

        .info {
            background-color: #e8f5e9;
            padding: 15px;
            border-left: 5px solid #4caf50;
            margin-top: 15px;
            font-size: 18px;
        }

        .date {
            color: #e91e63;
            font-weight: bold;
        }

        .marks {
            color: #2196f3;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Student Information</h1>

    <?php
        $studentName = "John";
        $marks = 85;
        $date = date("d M Y");
    ?>

    <div class="info">
        <p><strong>Name:</strong> <?php echo $studentName; ?></p>

        <p class="marks">
            <strong>Marks:</strong> <?php echo $marks; ?>
        </p>

        <p class="date">
            <strong>Date:</strong> <?php echo $date; ?>
        </p>
    </div>

</div>

</body>
</html>
