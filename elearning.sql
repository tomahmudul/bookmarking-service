-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 12:20 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--
USE `elearning`;

CREATE TABLE `courses` (
                           `id` int NOT NULL,
                           `title` varchar(255) NOT NULL,
                           `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`) VALUES
                                                         (1, 'Course Title', 'Description of the course'),
                                                         (2, 'Course Title 2', 'Description of the course');

-- --------------------------------------------------------

--
-- Table structure for table `course_contents`
--

CREATE TABLE `course_contents` (
                                   `id` int NOT NULL,
                                   `course_id` int NOT NULL,
                                   `unit_id` int DEFAULT NULL,
                                   `content_type` enum('lesson','quiz') NOT NULL,
                                   `title` varchar(255) NOT NULL,
                                   `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_contents`
--

INSERT INTO `course_contents` (`id`, `course_id`, `unit_id`, `content_type`, `title`, `content`) VALUES
    (3, 1, 1, 'lesson', 'Introduction to Programming', '<lesson>\n    \n    <content>\n        <p>Welcome to the \"Introduction to Programming\" lesson!</p>\n        <p>In this lesson, we will cover the basics of programming and introduce you to the fundamental concepts.</p>\n        <h2>Topics Covered:</h2>\n        <ul>\n            <li>What is programming?</li>\n            <li>Why learn programming?</li>\n            <li>Basic programming concepts</li>\n            <li>Popular programming languages</li>\n        </ul>\n        <h2>Learning Objectives:</h2>\n        <ol>\n            <li>Understand the importance of programming in today\'s world.</li>\n            <li>Learn basic programming concepts such as variables, data types, and control structures.</li>\n            <li>Explore different programming languages and their applications.</li>\n        </ol>\n        <h2>Prerequisites:</h2>\n        <p>No prior programming experience is required. This lesson is suitable for beginners.</p>\n        <h2>Resources:</h2>\n        <ul>\n            <li>Online tutorials and documentation</li>\n            <li>Interactive coding platforms</li>\n            <li>Recommended books and websites</li>\n        </ul>\n        <p>We hope you enjoy learning with us!</p>\n    </content>\n</lesson>'),
(5, 1, 2, 'quiz', 'Programming Quiz', '<quiz>\n    <question>\n        <text>What is a variable?</text>\n        <option correct=\"true\">A storage location</option>\n        <option correct=\"false\">An operator</option>\n    </question>\n    <question>\n        <text>What is the main purpose of programming?</text>\n        <option correct=\"true\">To instruct a computer to perform tasks</option>\n        <option correct=\"false\">To create music</option>\n        <option correct=\"false\">To cook food</option>\n        <option correct=\"false\">To paint pictures</option>\n    </question>\n    <question>\n        <text>Which of the following is a popular programming language?</text>\n        <option correct=\"true\">Python</option>\n        <option correct=\"false\">HTML</option>\n        <option correct=\"false\">CSS</option>\n        <option correct=\"false\">SQL</option>\n    </question>\n</quiz>\n'),
    (6, 2, 1, 'lesson', 'Introduction to Data Science', '<lesson>\n    <content>\n        <p>Welcome to the \"Introduction to Data Science\" lesson!</p>\n        <p>In this lesson, we will explore the exciting field of data science and its applications.</p>\n        <h2>Topics Covered:</h2>\n        <ul>\n            <li>What is Data Science?</li>\n            <li>Why Data Science is important?</li>\n            <li>Role of Data Scientist</li>\n            <li>Applications of Data Science</li>\n        </ul>\n        <h2>Learning Objectives:</h2>\n        <ol>\n            <li>Understand the concept of Data Science and its interdisciplinary nature.</li>\n            <li>Learn about the importance of data and its role in decision-making.</li>\n            <li>Explore the skills required to become a Data Scientist.</li>\n            <li>Discover real-world applications of Data Science in various industries.</li>\n        </ol>\n        <h2>Prerequisites:</h2>\n        <p>No specific prerequisites are required for this lesson. Basic knowledge of statistics and programming concepts would be beneficial.</p>\n        <h2>Resources:</h2>\n        <ul>\n            <li>Online courses and tutorials on Data Science</li>\n            <li>Books and research papers on Data Science</li>\n            <li>Data Science communities and forums</li>\n        </ul>\n        <p>We hope you enjoy exploring the fascinating world of Data Science with us!</p>\n    </content>\n</lesson>\n'),
     (7, 2, 2, 'quiz', 'Data Science Quiz', '    <quiz>\n        <question>\n            <text>What is Data Science?</text>\n            <option correct=\"true\">A multidisciplinary field that uses scientific methods, processes, algorithms, and systems to extract knowledge and insights from structured and unstructured data.</option>\n            <option correct=\"false\">A type of computer science that focuses solely on programming.</option>\n            <option correct=\"false\">A branch of mathematics that deals with numerical data.</option>\n        </question>\n        <question>\n            <text>What is a common programming language used in Data Science?</text>\n            <option correct=\"true\">Python</option>\n            <option correct=\"false\">Java</option>\n            <option correct=\"false\">C++</option>\n        </question>\n    </quiz>');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
                           `id` int NOT NULL,
                           `course_id` int NOT NULL,
                           `title` varchar(255) NOT NULL,
                           `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
                           `id` int NOT NULL,
                           `lesson_id` int NOT NULL,
                           `question` text NOT NULL,
                           `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
                         `id` int NOT NULL,
                         `course_id` int NOT NULL,
                         `title` varchar(255) NOT NULL,
                         `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `course_id`, `title`, `description`) VALUES
                                                                    (1, 1, 'Unit 1', 'Description of Unit 1'),
                                                                    (2, 2, 'Unit 2', 'Description of Unit 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int NOT NULL,
                         `username` varchar(50) NOT NULL,
                         `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
                                                       (1, 'test', '$2y$10$2yr3qUNkqbR.zEeiZ8ncGe1qHkQtyT3RLDcOFyI68t/Z4kXYYWIdK'),
                                                       (2, 'ani_123', '$2y$10$nEWOOaRs2h425ntEQyoAeO0JZahW.p9sYhtP4SoXzG91BZpJp7coq'),
                                                       (3, 'Register', '$2y$10$7zAuiidq0C1VQ4tsKmOZFeWNDEt.uCNjviGai44.rKR3yLhYP.I7G'),
                                                       (4, 'aniroodh', '$2y$10$b6Vnn//ZI06zODJ0FWn8a.F6Wm9l6QtqfWI46qNCS05loa9HoKn3K'),
                                                       (5, 'mani', '$2y$10$ZW.wqMgBxa.ee2BAlVhkRO/EU2jyL8DjOUHAUa0IUl6AXo0S09c1W'),
                                                       (6, 'learning_test', '$2y$10$4JUBZvIMkcQ5wG2mWUtQyuX3.dCNtFq8ioqTYqQuReYOdbEwrmvOi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_contents`
--
ALTER TABLE `course_contents`
    ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
    ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
    ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
    ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_contents`
--
ALTER TABLE `course_contents`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_contents`
--
ALTER TABLE `course_contents`
    ADD CONSTRAINT `course_contents_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_contents_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
    ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
    ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
    ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
