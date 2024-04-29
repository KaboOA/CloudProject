<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Cloud Project</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <style>
        .table-container {
            max-height: calc(100vh - 200px); /* Adjusted to accommodate the floating action button */
            overflow-y: auto;
        }

        .fab {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #6807f9;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Overlay styles */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black */
            display: none; /* initially hidden */
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: white;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close-btn {
            position: relative;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="heading-section">Students</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-container">
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>CGPA</th>
                                    <th>Age</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'interface/fetch_students.php'; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating action button -->
    <a href='#' id="addBtn" class="fab"><i class="fas fa-plus"></i></a>

    <!-- Overlay form -->
    <div id="addOverlay" class="overlay">
        <div class="form-container">
            <span class="close-btn" onclick="closeForm()"><i class="fas fa-times"></i></span>
            <form id="addForm" class="login100-form validate-form flex-sb flex-w">
                <span class="login100-form-title p-b-53">
                    Add New Student
                </span>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        ID
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="ID is required">
                    <input class="input100" type="text" id="id" name="id" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Name
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Name is required">
				<input class="input100" type="text" id="name" name="name" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Age
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Age is required">
                    <input class="input100" type="number" id="age" name="age" min="18" max="25" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        CGPA
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="CGPA is required">
                    <input class="input100" type="number" step = 0.0001 id="cgpa" name="cgpa" min="0" max="4"  required>
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn m-t-17">
                    <button type="submit" class="login100-form-btn">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Get the overlay and form elements
        const addOverlay = document.getElementById('addOverlay');
        const addForm = document.getElementById('addForm');

        // Function to open the overlay
        function openForm() {
            addOverlay.style.display = 'flex';
        }

        // Function to close the overlay
        function closeForm() {
            addOverlay.style.display = 'none';
        }

   
document.getElementById('addBtn').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default link behavior
    console.log('Add button clicked'); // Check if event listener is triggered
    openForm(); // Open the form
});

		

        // Event listener for the form submission
        addForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission
            // Get form data
            const formData = new FormData(addForm);
            // Create object to store form values
            const studentData = {};
            // Populate object with form values
            formData.forEach((value, key) => {
                studentData[key] = value;
            });

            // Send student data to server
            fetch('functions/insert_student.php', {
                method: 'POST',
                body: JSON.stringify(studentData),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    if (response.ok) {
                        console.log('Student added successfully.');
						location.reload();
                    } else {
                        console.error('Error adding student.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            closeForm(); // Close the form
        });

		
    </script>
</body>
</html>
