CREATE TABLE IF NOT EXISTS User (
	id INT,
	first_name VARCHAR(32),
	last_name VARCHAR(32),
	password VARCHAR(15),
	username VARCHAR(15)
);

CREATE TABLE IF NOT EXISTS Message (
	id INT,
	body VARCHAR(100000),
	subject VARCHAR(100),
	user_id INT,
	recipient_ids VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS Message_read(
	id INT,
	message_id INT(32),
	reader_id INT(32),
	date DATE
);
