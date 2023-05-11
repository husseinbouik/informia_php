
-- Afficher les sessions de formation à venir qui ne se chevauchent pas avec une session donnée 

SELECT *
FROM Session
WHERE start_date > (SELECT end_date FROM Session WHERE session_id = 'session_id')
AND session_id <> 'session_id'

-- Afficher les sessions de formation à venir avec des places encore disponibles 

SELECT Session.*
FROM Session
LEFT JOIN (
   SELECT session_id, COUNT(*) AS num_registrations
   FROM registration
   GROUP BY session_id
) AS registrations ON Session.session_id = registrations.session_id
WHERE start_date > NOW()
AND (max_places - COALESCE(num_registrations, 0)) > 0

-- Afficher le nombre d'inscrits par session de formation 

SELECT Session.session_id, COUNT(*) AS num_registrations
FROM Session
INNER JOIN registration ON Session.session_id = registration.session_id
GROUP BY Session.session_id

-- Afficher l'historique des sessions de formation d'un apprenant donné 

SELECT Session.*
FROM Session
INNER JOIN registration ON Session.session_id = registration.session_id
WHERE registration.learner_id = 'learner_id'
AND end_date < NOW()

-- Afficher la liste des sessions qui sont affectées à un formateur donné, triées par date de début 

SELECT Session.*
FROM Session
WHERE trainer_id = 'trainer_id'
ORDER BY start_date ASC

-- Afficher la liste des apprenants d'une session donnée d'un formateur donné 

SELECT Learner.*
FROM Learner
INNER JOIN registration ON Learner.learner_id = registration.learner_id
INNER JOIN Session ON registration.session_id = Session.session_id
WHERE Session.session_id = 'session_id'
AND Session.trainer_id = 'trainer_id'

-- Afficher l'historique des sessions de formation d'un formateur donné 

SELECT Session.*
FROM Session
WHERE trainer_id = 'trainer_id'
AND end_date < NOW()

-- Afficher les formateurs qui sont disponibles entre 2 dates 

SELECT *
FROM Trainer
WHERE trainer_id NOT IN (
   SELECT trainer_id
   FROM Session
   WHERE start_date < 'end_date'
   AND end_date > 'start_date'
)

-- Afficher toutes les sessions d'une formation donnée 

SELECT *
FROM Session
WHERE training_id = 'training_id'

-- Afficher le nombre total de sessions par catégorie de formation 

SELECT Training.category, COUNT(*) AS num_sessions
FROM Training
INNER JOIN Session ON Training.training_id = Session.training_id
GROUP BY Training.category

-- Afficher le nombre total d'inscrits par catégorie de formation 

SELECT Training.category, COUNT(*) AS num_registrations
FROM Training
INNER JOIN Session ON Training.training_id = Session.training_id
INNER JOIN registration ON Session.session_id = registration.session_id
GROUP BY Training.category
