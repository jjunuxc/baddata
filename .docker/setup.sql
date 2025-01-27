CREATE TABLE users (
	uid SERIAL PRIMARY KEY NOT NULL,
	username TEXT NOT NULL,
	password TEXT NOT NULL,
	description TEXT
);

CREATE TABLE tokens (
	tid SERIAL PRIMARY KEY NOT NULL,
	uid INT NOT NULL,
	token TEXT NOT NULL,
	FOREIGN KEY (uid) REFERENCES users (uid)
);

CREATE TABLE class_posts (
	cid SERIAL PRIMARY KEY NOT NULL,
	code TEXT NOT NULL,
	name TEXT NOT NULL,
	professor TEXT NOT NULL,
	ects DECIMAL NOT NULL,
	description TEXT NOT NULL
);

CREATE TABLE motd_images (
	iid SERIAL PRIMARY KEY NOT NULL,
	path TEXT NOT NULL,
	title TEXT NOT NULL
);

INSERT INTO users 
(username, password, description)
VALUES
('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Admin'),
('secretadmin', '128833d7cf667ea28fa68f555d83483c0e15ddc3e4f403fb910496600cdaad91', 'Secret Admin'),
('user1', '0a041b9462caa4a31bac3567e0b6e6fd9100787db2ab433d96f6d178cabfce90', 'Professor'),
('user2', '6025d18fe48abd45168528f18a82e265dd98d421a7084aa09f61b341703901a3', 'Associate Professor');

INSERT INTO class_posts
(code, name, professor, ects, description)
VALUES
('CS1004', 'Web Programming', 'Max James', 4, 'Easy, but can be tricky sometimes'),
('CS2004', 'Data Structures and Algorithm', 'Sun Tzu', 5, 'Quite difficult, but essential'),
('CS3005', 'Introduction to Artificial Intelligence', 'Louis Paige', 4, 'The future is here'),
('CS3001', 'Governance, Risk and Compliance', 'Peter Chan', 4, 'Very important for our field of study');

INSERT INTO motd_images
(path, title)
VALUES
('images/library.jpg','IA Library'),
('images/building.jpg','IA Main Building'),
('images/foodcourt.jpg','IA Food Court'),
('images/lecture.jpg','IA Lecture Hall'),
('images/recreation.jpg','IA Recreation Corner'),
('images/dormitory.jpg','IA Domitory');
