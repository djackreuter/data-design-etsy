-- purge tables
-- DROP tables in reverse order
DROP TABLE IF EXISTS favorites;
DROP TABLE IF EXISTS item;
DROP TABLE IF EXISTS profile;

-- create the tables
CREATE TABLE profile (
	-- using NOT NULL to specify that it is required
	-- this creates the attribute for the primary key
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileEmail VARCHAR(128) NOT NULL,
	-- always use CHAR for passwords
	profileHash CHAR(128) NOT NULL,
	profileSalt CHAR(64) NOT NULL,
	profileContact VARCHAR(500),
	UNIQUE(profileEmail),
	-- officiate the primary key for the entity
	PRIMARY KEY(profileId)
);

