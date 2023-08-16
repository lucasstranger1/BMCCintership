 
function loadCourseList(event) {
    event.preventDefault();
    
    const majorForm = document.getElementById('major-form');
    const majorId = document.getElementById('major').value;
    const selectedCourses = document.getElementById('selected-courses');
    
    const fetchCoursesUrl = majorForm.getAttribute('data-fetch-courses-url');
    const moveCourseUrl = majorForm.getAttribute('data-move-course-url');

    // This will clear the selected courses each time a new major is chosen.
    while (selectedCourses.firstChild) {
        selectedCourses.removeChild(selectedCourses.firstChild);
    }

    const url = fetchCoursesUrl + "?majorId=" + majorId;
    fetch(url)
        .then(response => response.text())
        .then(data => {
            const courseList = document.getElementById('all-courses');
            courseList.innerHTML = data;

            const courses = courseList.querySelectorAll('.item');
            courses.forEach(course => {
                course.addEventListener('click', moveCourse);
            });

            updateButtonStates();
            updateTable();
        });

    return false;
}

function moveCourse() {
    const selectedCourses = document.getElementById('selected-courses');
    const allCourses = document.getElementById('all-courses');
    const courseId = this.dataset.courseId;
    const majorForm = document.getElementById('major-form');
    const moveCourseUrl = majorForm.getAttribute('data-move-course-url');
  
    const url = moveCourseUrl + "?courseId=" + courseId;
    fetch(url)
        .then(response => response.text())
        .then(data => {
            if (selectedCourses.contains(this)) {
                allCourses.appendChild(this);
            } else {
                selectedCourses.appendChild(this);
            }

            updateButtonStates();
            updateTable();
        });
}

  function moveLeft() {
    const selectedCourses = document.getElementById('selected-courses');
    const allCourses = document.getElementById('all-courses');
    const selectedCourse = selectedCourses.querySelector('.item');

    if (selectedCourse) {
      allCourses.appendChild(selectedCourse);
    }

    updateButtonStates();
    updateTable();
  }

  function moveRight() {
    const selectedCourses = document.getElementById('selected-courses');
    const allCourses = document.getElementById('all-courses');
    const selectedCourse = allCourses.querySelector('.item');

    if (selectedCourse) {
      selectedCourses.appendChild(selectedCourse);
    }

    updateButtonStates();
    updateTable();
  }

  function updateButtonStates() {
    const selectedCourses = document.getElementById('selected-courses');
    const allCourses = document.getElementById('all-courses');
    const leftArrow = document.getElementById('left-arrow');
    const rightArrow = document.getElementById('right-arrow');

    leftArrow.disabled = selectedCourses.children.length === 0;
    rightArrow.disabled = allCourses.children.length === 0;
  }

  function updateTable() {
    const takenCoursesTable = document.getElementById('taken-courses-table');
    const remainingCoursesTable = document.getElementById('remaining-courses-table');
    const remainingCredits = calculateRemainingCredits();
    const takenCredits = calculateTakenCredits();

    updateCoursesTable('selected-courses', takenCoursesTable);
    updateCoursesTable('all-courses', remainingCoursesTable);
    document.getElementById('remaining-credits').textContent = remainingCredits;
    document.getElementById('taken-credits').textContent = takenCredits; // New line

    // Call the updateDegreeCompletion function
    updateDegreeCompletion();
  }

  function updateCoursesTable(containerId, table) {
    const container = document.getElementById(containerId);
    const courses = container.getElementsByClassName('item');

    table.innerHTML = '';
    const headerRow = table.insertRow();
    headerRow.innerHTML = '<th>Course Name</th><th>Credits</th>';

    for (let i = 0; i < courses.length; i++) {
      const course = courses[i];
      const courseName = course.textContent;
      const credits = course.getAttribute('data-credits');

      const newRow = table.insertRow();
      newRow.innerHTML = `<td>${courseName}</td><td>${credits}</td>`;
    }
  }

  function calculateRemainingCredits() {
    const remainingCourses = document.getElementById('all-courses').getElementsByClassName('item');
    let remainingCredits = 0;
    for (let i = 0; i < remainingCourses.length; i++) {
      const credits = parseInt(remainingCourses[i].getAttribute('data-credits'));
      remainingCredits += credits;
    }
    return remainingCredits;
  }

  function calculateTakenCredits() {
    const takenCourses = document.getElementById('selected-courses').getElementsByClassName('item');
    let takenCredits = 0;
    for (let i = 0; i < takenCourses.length; i++) {
      const credits = parseInt(takenCourses[i].getAttribute('data-credits'));
      takenCredits += credits;
    }
    return takenCredits;
  }

  function updateDegreeCompletion() {
    const takenCoursesTable = document.getElementById('taken-courses-table');
    const remainingCoursesTable = document.getElementById('remaining-courses-table');
    const completionPercentage = document.getElementById('completion-percentage');

    const totalCourses = takenCoursesTable.rows.length - 1 + remainingCoursesTable.rows.length - 1;
    const takenCoursesCount = takenCoursesTable.rows.length - 1;
    const completion = (takenCoursesCount / totalCourses) * 100;

    completionPercentage.textContent = completion.toFixed(2) + '%';
    if (completion >= 99.95) {
      const congratulationsMessage = document.createElement('p');
      congratulationsMessage.id = 'congratulations-message';
      congratulationsMessage.textContent = 'Congratulations, you are ready to graduate!';
      completionPercentage.appendChild(congratulationsMessage);
    }

  }
  
