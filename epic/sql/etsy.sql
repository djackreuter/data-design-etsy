-- purge tables
-- DROP tables in reverse order
DROP TABLE IF EXISTS favorites;
DROP TABLE IF EXISTS item;
DROP TABLE IF EXISTS profile;

-- create the tables
CREATE TABLE profile (
	-- using NOT NULL to specify that it is required
	-- this creates the attribute for the primary key
	profileId              INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileEmail           VARCHAR(128)                NOT NULL,
	-- always use CHAR for passwords
	profileHash            CHAR(128)                   NOT NULL,
	profileSalt            CHAR(64)                    NOT NULL,
	profileContact         VARCHAR(500),
	profileActivationToken CHAR(32)                    NOT NULL,
	UNIQUE (profileEmail),
	-- officiate the primary key for the entity
	PRIMARY KEY (profileId)
);

CREATE TABLE item (
	itemId        INT UNSIGNED AUTO_INCREMENT NOT NULL,
	-- for the foreign key. NEEDS to match the profileId except for AUTO_INCREMENT
	itemProfileId INT UNSIGNED                NOT NULL,
	itemInfo      VARCHAR(500)                NOT NULL,
	itemDate      DATETIME(6)                 NOT NULL,
	-- create an index before making a foreign key. all foreign keys need to be indexed
	INDEX (itemProfileId),
	-- create the actual foreign key
	FOREIGN KEY (itemProfileId) REFERENCES profile (profileId),
	-- last, create the primary key
	PRIMARY KEY (itemId)
);

CREATE TABLE favorites (
	favUserId INT UNSIGNED NOT NULL,
	favItem   INT UNSIGNED NOT NULL,
	favDate   DATETIME(6)  NOT NULL,
	-- index the foreign keys
	INDEX (favUserId),
	INDEX (favItem),
	-- create the foreign keys
	FOREIGN KEY (favUserId) REFERENCES profile (profileId),
	FOREIGN KEY (favItem) REFERENCES item (itemId),
	-- create composite foreign key with the two foreign keys
	PRIMARY KEY (favUserId, favItem)
);