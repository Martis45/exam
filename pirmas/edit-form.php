<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    .form-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: 0 auto;
    }

    .form-container h2 {
      margin-bottom: 20px;
    }

    .form-container label {
      display: block;
      margin-bottom: 10px;
    }

    .form-container input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    .form-container button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-right: 10px;
    }

    .form-container button:hover {
      background-color: #45a049;
    }

    .question-list {
      list-style-type: none;
      padding: 0;
    }

    .question-list li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .question-list li button {
      background-color: #f44336;
      color: #fff;
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .question-list li button:hover {
      background-color: #d32f2f;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Edit Your Form</h2>

  <!-- Naujo klausimo pridėjimas -->
  <form id="addQuestionForm">
    <label for="newQuestion">New Question:</label>
    <input type="text" id="newQuestion" required>
    <button type="button" onclick="addQuestion()">Add Question</button>
  </form>

  <!-- Klausimų rodymas -->
  <h3>Your Questions:</h3>
  <ul id="questionList" class="question-list">
  </ul>

  <!-- Iššaugojimo mygtukas -->
  <button onclick="saveChanges()">Save Changes</button>

  <!-- mygtukas grįžti atgal -->
  <button onclick="goBack()">Back</button>
</div>

<script>
  // senų klausimų užkrovimas iš json
  document.addEventListener('DOMContentLoaded', function () {
    loadQuestions();
  });

  // Funkcija pridėti naują klausimą
  function addQuestion() {
    var newQuestion = document.getElementById('newQuestion').value;

    if (newQuestion.trim() !== '') {
      var questionList = document.getElementById('questionList');
      var listItem = document.createElement('li');
      listItem.textContent = newQuestion;

      var deleteButton = document.createElement('button');
      deleteButton.textContent = 'Delete';
      deleteButton.onclick = function () {
        // Paspaudus delete mygtuką ištrina klausimą
        listItem.remove();
      };

      listItem.appendChild(deleteButton);
      questionList.appendChild(listItem);

      document.getElementById('newQuestion').value = '';
    }
  }

  // FUnkcija išsaugojanti duomenis json bazej
  function saveChanges() {
    var questions = [];
    var questionListItems = document.getElementById('questionList').getElementsByTagName('li');

    // extractinami klausimai iš sąrašo
    for (var i = 0; i < questionListItems.length; i++) {
      questions.push(questionListItems[i].textContent);
    }

    // išsaugo duomenis json bazej
    localStorage.setItem('userQuestions', JSON.stringify(questions));
    alert('Changes saved successfully!');
  }

  // funkcija užkraunanti duomenis
  function loadQuestions() {
    var questions = localStorage.getItem('userQuestions');

    if (questions) {
      questions = JSON.parse(questions);
      var questionList = document.getElementById('questionList');

      questionList.innerHTML = '';

      // Užkrauti sąrašą su senais klausimais
      questions.forEach(function (question) {
        var listItem = document.createElement('li');
        listItem.textContent = question;

        var deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.onclick = function () {
          // Paspaudus ištrint mygtuka dingsta pats mygtukas ir duomenys kurie buvo įrašyti
          listItem.remove();
        };

        listItem.appendChild(deleteButton);
        questionList.appendChild(listItem);
      });
    }
  }

  // Nukelimas atgal į pagrindinį puslapį.
  function goBack() {
    window.history.back();
  }
</script>

</body>
</html>