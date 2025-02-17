<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .text-center {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn {
            width: 100%;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        label {
            font-size: 14px;
            font-weight: 500;
        }
    </style>
    <script>
        function validateForm() {
            const contact = document.getElementById('contact').value;
            if (!/^[0-9]{10}$/.test(contact)) {
                alert("Please enter a valid 10-digit contact number.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <p class="text-center">Fill in the details to register for our programs.</p>
        <form action="Registers.php" method="POST" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter your full name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address" required>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="tel" id="contact" name="contact" class="form-control" placeholder="Enter your contact number" pattern="[0-9]{10}" title="Enter a valid 10-digit contact number" required>
            </div>
            <div class="mb-3">
                <label for="graduation-year" class="form-label">Graduation Year</label>
                <input type="number" id="graduation-year" name="graduation-year" class="form-control" placeholder="Enter your graduation year" min="1900" max="2099" required>
            </div>
            <div class="mb-3">
                <label for="degree" class="form-label">Degree Program</label>
                <input type="text" id="degree" name="degree" class="form-control" placeholder="Enter your degree program" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</body>
</html>
