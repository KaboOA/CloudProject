<!DOCTYPE html>
<html lang="en"><head>
  
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <title>Data</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <style data-tag="reset-style-sheet">
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
     
      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }</style><link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" /></head><body><link
      rel="stylesheet" href="style.css" /><div><link href="index.css"
        rel="stylesheet" /><div class="home-container"><header class="home-header">
  <a href="http://localhost" class="home-link">Team 27</a>
  <div class="home-links">
    <a href="http://localhost/interface/data/data.php" class="home-link1"><span>Data</span><br /></a>
    <a href="http://localhost/interface/team/team.html" class="home-link1"><span>About Us</span><br /></a>
  </div>
</header>
            
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
                              <?php include 'fetch_students.php'; ?>
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
                  <input class="input100" type="number" id="id" name="id" required>
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
         
 
            <footer
          class="home-footer"><a href="http://localhost"
            class="home-link2">Team 27</a><span class="home-text2">© 2024
            Team 27, All Rights Reserved.</span><div
            class="home-icon-group"><svg viewBox="0 0 950.8571428571428 1024"
              class="home-icon">
              <path
                d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"></path></svg><svg
              viewBox="0 0 877.7142857142857 1024" class="home-icon2">
              <path
                d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"></path></svg><svg
              viewBox="0 0 602.2582857142856 1024" class="home-icon4">
              <path
                d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"></path></svg></div></footer></div></div>
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

    
    </script></body></html>
