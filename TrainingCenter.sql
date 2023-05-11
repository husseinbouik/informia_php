CREATE TABLE Trainer(
   trainer_id INT,
   first_name VARCHAR(50) NOT NULL,
   last_name VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL UNIQUE,
   skills VARCHAR(50) NOT NULL,
   password VARCHAR(50) NOT NULL,
   PRIMARY KEY(trainer_id)
);

CREATE TABLE Training(
   training_id INT,
   subject VARCHAR(50) NOT NULL,
   description VARCHAR(300) NOT NULL,
   category VARCHAR(50) NOT NULL,
   total_hours TIME NOT NULL CHECK (total_hours > '00:00:00'),
   PRIMARY KEY(training_id)
);

CREATE TABLE Session(
   session_id INT,
   start_date DATE NOT NULL,
   end_date DATE NOT NULL,
   max_places INT NOT NULL,
   status VARCHAR(50) NOT NULL,
   training_id INT NOT NULL,
   trainer_id INT NOT NULL,
   PRIMARY KEY(session_id),
   FOREIGN KEY(training_id) REFERENCES Training(training_id),
   FOREIGN KEY(trainer_id) REFERENCES Trainer(trainer_id)
);

CREATE TABLE Learner(
   learner_id INT,
   first_name VARCHAR(50) NOT NULL,
   last_name VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL UNIQUE,
   password VARCHAR(50) NOT NULL,
   PRIMARY KEY(learner_id)
);

CREATE TABLE registration(
   session_id INT,
   learner_id INT,
   evaluation VARCHAR(50) NOT NULL,
   PRIMARY KEY(session_id, learner_id),
   FOREIGN KEY(session_id) REFERENCES Session(session_id),
   FOREIGN KEY(learner_id) REFERENCES Learner(learner_id)
);
CREATE TABLE Admin(
   admin_id INT,
   admin_name VARCHAR(50),
   password VARCHAR(50) NOT NULL,
   PRIMARY KEY(admin_id, admin_name)
);

