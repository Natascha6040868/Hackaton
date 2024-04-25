-- Create the Student table
CREATE TABLE Student (
    student_id INT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    date_of_birth DATE,
    registration_date DATE,
    grade DECIMAL(3, 2),
    status VARCHAR(255) DEFAULT 'active' -- Can be 'active', 'pending', or 'returned'
);

-- Create the Teacher table
CREATE TABLE Teacher (
    teacher_id INT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    subject VARCHAR(255),
    hire_date DATE
);

-- Create the File table
CREATE TABLE File (
    file_id INT PRIMARY KEY,
    file_name VARCHAR(255),
    file_path VARCHAR(255),
    upload_date DATE,
    teacher_id INT,
    student_id INT,
    FOREIGN KEY (teacher_id) REFERENCES Teacher(teacher_id),
    FOREIGN KEY (student_id) REFERENCES Student(student_id)
);

-- Create the Feedback table
CREATE TABLE Feedback (
    feedback_id INT PRIMARY KEY,
    teacher_id INT,
    student_id INT,
    feedback_text TEXT,
    feedback_date DATE,
    FOREIGN KEY (teacher_id) REFERENCES Teacher(teacher_id),
    FOREIGN KEY (student_id) REFERENCES Student(student_id)
);

-- Create the Activity table
CREATE TABLE Activity (
    activity_id INT PRIMARY KEY,
    date DATE,
    student_id INT,
    status VARCHAR(255), -- Can be 'delivered', 'pending', or 'returned'
    grade DECIMAL(3, 2),
    FOREIGN KEY (student_id) REFERENCES Student(student_id)
);


-- Dit gebruiken we om in te zien wat er in Activity zit
USE schoolserver_hackaton;
DESCRIBE Activity;


SELECT date, datum AS student_name, status, grade FROM Activity;
