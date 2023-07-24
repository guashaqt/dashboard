<!DOCTYPE html>
<html>
<head>
    <title>Manage Officials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        .form-group.text-center {
            margin-top: 40px;
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        /* Popup Modal */
        #popupModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2 style="text-align: center; font-size: 36px; font-weight: bold; margin-bottom: 30px;">Manage Officials</h2>

        <form method="POST">
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" name="position" id="position" required>
                <span class="error-message"><?= form_error('position') ?></span>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <span class="error-message"><?= form_error('name') ?></span>
            </div>

            <div class="form-group">
                <label for="contact">Contact #:</label>
                <input type="text" name="contact" id="contact" required>
                <span class="error-message"><?= form_error('contact') ?></span>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
                <span class="error-message"><?= form_error('address') ?></span>
            </div>

            <div class="form-group">
                <label for="start_term">Start Term:</label>
                <input type="date" name="start_term" id="start_term" required>
                <span class="error-message"><?= form_error('start_term') ?></span>
            </div>

            <div class="form-group">
                <label for="end_term">End Term:</label>
                <input type="date" name="end_term" id="end_term" required>
                <span class="error-message"><?= form_error('end_term') ?></span>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-primary">Add Officials</button>
            </div>
        </form>
    </div>

    <!-- Popup Modal -->
    <div id="popupModal">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h3>Success!</h3>
            <p>Officials have been added.</p>
        </div>
    </div>

    <script>
        function showPopup() {
            var modal = document.getElementById("popupModal");
            modal.style.display = "block";
        }

        function closePopup() {
            var modal = document.getElementById("popupModal");
            modal.style.display = "none";
        }

        function addOfficials() {
            // Code to add officials to your system/database
            closePopup(); // Close the popup after adding officials
        }
    </script>
</body>
</html>
