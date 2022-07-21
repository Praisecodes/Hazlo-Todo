CREATE TABLE subscribed_emails(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    timeSubscribed DATETIME DEFAULT CURRENT_TIMESTAMP,
    emailSubscribed TEXT NOT NULL
);

-- CREATE TABLE completed_activities(
--     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     username TEXT NOT NULL,
--     ActivityTitle TEXT NOT NULL,
--     TimeCompleted DATETIME DEFAULT CURRENT_TIMESTAMP
-- );

CREATE TABLE activities(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username TEXT NOT NULL,
    ActivityTitle TEXT NOT NULL,
    ActivityCategory TEXT NOT NULL,
    ActivityStartTime DATETIME DEFAULT CURRENT_TIMESTAMP,
    ActivityDueTime DATETIME NOT NULL,
    ActivityImage TEXT NOT NULL,
    ActivityNote TEXT NOT NULL,
    isArchived VARCHAR(100) NOT NULL,
    isStarred VARCHAR(100) NOT NULL,
    inTrash VARCHAR(100) NOT NULL,
    isComplete VARCHAR(100) NOT NULL,
    isDue VARCHAR(100) NOT NULL
);