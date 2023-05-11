INSERT INTO Trainer (trainer_id, first_name, last_name, email, skills, password)  
VALUES (1, 'John', 'Smith', 'john@example.com', 'SQL, Python', 'password1'),
       (2, 'Jane', 'Doe', 'jane@example.com', 'Java, C++', 'password2'),
       (3, 'Mark', 'Johnson', 'mark@example.com', 'HTML, CSS', 'password3'),  
       (4, 'Sue', 'Williams', 'sue@example.com', 'SQL, R', 'password4'),
       (5, 'Bill', 'Jones', 'bill@example.com', 'SQL, Tableau', 'password5'); 

INSERT INTO Training (training_id, subject, description, category, total_hours)  
VALUES (1, 'Intro to SQL', 'Learn basic SQL queries', 'Databases', '5:00:00'),
       (2, 'Python for ML', 'Use Python for machine learning', 'ML/AI', '20:00:00'),  
       (3, 'Advanced Java', 'Learn advanced Java programming', 'Programming', '30:00:00'),
       (4, 'R for Statistics', 'Use R for statistical analysis', 'Data Science', '15:00:00'),  
       (5, 'Tableau for BI', 'Learn data visualization with Tableau', 'BI', '10:00:00'); 

INSERT INTO Session (session_id, start_date, end_date, max_places, status, training_id, trainer_id)  
VALUES (1, '2020-01-20', '2020-01-24', 10, 'Completed', 1, 1),  
       (2, '2020-02-10', '2020-03-15', 20, 'Ongoing', 2, 2),  
       (3, '2020-04-05', '2020-05-15', 15, 'Upcoming', 3, 3), 
       (4, '2020-06-01', '2020-06-15', 10, 'Scheduled', 4, 4),
       (5, '2020-07-10', '2020-07-20', 20, 'Open for Registration', 5, 5);

INSERT INTO Learner (learner_id, first_name, last_name, email, password)  
VALUES (1, 'Tom', 'Smith', 'tom@example.com', 'password6'),
       (2, 'Emma', 'Johnson', 'emma@example.com', 'password7'),  
       (3, 'Harry', 'Williams', 'harry@example.com',  'password8'),
       (4, 'Olivia', 'Jones', 'olivia@example.com', 'password9'),
       (5, 'Noah', 'Brown', 'noah@example.com', 'password10');

INSERT INTO Registration (session_id, learner_id, evaluation)  
VALUES (1, 1, 'valid'), (2, 2, 'valid'), (3, 3, 'valid'), (3, 4, 'valid'), (4, 5, 'valid');
