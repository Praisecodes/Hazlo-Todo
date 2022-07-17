CREATE TABLE subscribed_emails(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    timeSubscribed DATETIME DEFAULT CURRENT_TIMESTAMP,
    emailSubscribed TEXT NOT NULL
);

CREATE TABLE activities(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username TEXT NOT NULL,
    ActivityTitle TEXT NOT NULL,
    ActivityCategory TEXT NOT NULL,
    ActivityAdded DATETIME DEFAULT CURRENT_TIMESTAMP,
    ActivityDueTime DATETIME NOT NULL,
    ActivityImage LONGBLOB NOT NULL,
    ActivityNote TEXT NOT NULL
);

CREATE TABLE completed_activities(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username TEXT NOT NULL,
    ActivityTitle TEXT NOT NULL,
    TimeCompleted DATETIME DEFAULT CURRENT_TIMESTAMP
);