# Test English - PHP Devel Next

**Test English** is a simple program designed to help users test their knowledge of English words by translating Russian words into English. This application is written in PHP using the Devel Next framework.

## Features

- The user is presented with a Russian word and needs to type its English translation.
- The program tracks the number of correct and incorrect answers.
- Once the user finishes all questions, a prompt appears to either reset the progress or continue from where they left off.
- Results are saved between sessions using a data file.

## How It Works

- The application uses three text files:
  - `rus.txt` contains Russian words (one word per line).
  - `eng.txt` contains the corresponding English translations (one word per line).
  - `data.txt` stores the user's current progress, including the index of the current word, the number of correct answers, and the number of wrong answers.

## Installation

1. Make sure you have the PHP Devel Next framework installed on your machine.
2. Clone or download the project to your local machine.
3. Ensure you have the `rus.txt` and `eng.txt` files with the required word pairs. Place them in the project directory.
4. The application will use `data.txt` to save the user's progress, so make sure this file is also in the project directory.

## Usage

1. Open the application.
2. You will be presented with a Russian word from `rus.txt`. Type the English translation in the input field.
3. Click the "Submit" button to check your answer.
4. The application will indicate whether the answer is correct or incorrect.
5. After completing all words, you will receive a prompt to either restart or continue from the current progress.
6. The number of correct and wrong answers will be displayed upon completion.

## Events

- **show**: Initializes the application, loads progress from `data.txt`, and displays the first word from `rus.txt`.
- **close**: Saves the current progress to `data.txt`.
- **button.action**: Handles the user input for checking the translation. If correct, it increments the correct answer count; otherwise, it increments the wrong answer count.
- **button8.action**: Displays the correct English translation for the current Russian word.
- **button9.action**: Resets the progress and starts over.
- **button10.action**: Displays the number of correct and wrong answers.

## License

This project is open-source and can be freely modified and used.
