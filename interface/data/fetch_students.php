<?php
$connect = mysqli_connect('db', 'root', 'Ahmmed_1211', 'db');
$query = "SELECT * FROM students";
$response = mysqli_query($connect, $query);
$index = 0;
while ($i = mysqli_fetch_assoc($response)) {
    $index++;
    echo "<tr>";
    echo "<td>".$index."</td>";
    echo "<td>".$i['id']."</td>";
    echo "<td>".$i['name']."</td>";
    echo "<td>".$i['cgpa']."</td>";
    echo "<td>".$i['age']."</td>";
    echo "<td>
            <i class='fas fa-edit editBtn' data-id='".$i['id']."' style='font-size:17px; cursor:pointer;'></i> |
            <a href='functions/delete_student.php?id=".$i['id']."' onclick='return confirm(\"Are you sure you want to delete this student?\")'><i class='fas fa-trash-alt' style='font-size:17px;color:red;'></i></a>
        </td>";
    echo "</tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 
    <style>
       
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
   
    <!-- Overlay form -->
    <div id="editOverlay" class="overlay">
        <div class="form-container">
            <span class="close-btn" onclick="closeEditForm()"><i class="fas fa-times"></i></span>
            <form id="editForm" class="login100-form validate-form flex-sb flex-w">
                <span class="login100-form-title p-b-53">
                    Edit Student
                </span>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        ID
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="ID is required">
                    <input class="input100" type="number" id="id" name="id" readonly>
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
                    <input class="input100" type="number"  id="cgpa" step = 0.0001 name="cgpa" min="0" max='4' required>
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn m-t-17">
                    <button type="submit" class="login100-form-btn">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const editOverlay = document.getElementById('editOverlay');
        const editForm = document.getElementById('editForm');

        function openEditForm() {
            editOverlay.style.display = 'flex';
        }

        function closeEditForm() {
            editOverlay.style.display = 'none';
        }

        document.querySelectorAll('.editBtn').forEach(item => {
            item.addEventListener('click', event => {
                const id = item.getAttribute('data-id');
                fetch(`functions/fetch_student.php?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('id').value = data.id;
                        document.getElementById('name').value = data.name;
                        document.getElementById('age').value = data.age;
                        document.getElementById('cgpa').value = data.cgpa;
                        openEditForm();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });

        editForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(editForm);
            const studentData = {};
            formData.forEach((value, key) => {
                studentData[key] = value;
            });
            fetch('functions/update_student.php', {
                method: 'POST',
                body: JSON.stringify(studentData),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    console.log('Student updated successfully.');
                    location.reload();
                } else {
                    console.error('Error updating student.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
            closeEditForm();
        });
    </script>
</body>
</html>
