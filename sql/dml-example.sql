-- insert data into the created tables
-- profile
INSERT INTO profile(profileEmail, profileSalt, profileHash, profileContact)
	VALUES('user1@user.com', 'password', 'password', 'user contact');
INSERT INTO profile(profileEmail, profileSalt, profileHash, profileContact)
	Values('us2r@us2r.com', 'usr2pass', 'usr2pass', 'user2 contact info');
INSERT INTO profile(profileEmail, profileHash, profileSalt, profileContact)
	VALUES('us3r@us3r.com', 'usr3pass', 'usr3pass', 'user 3 contact info');
INSERT INTO profile(profileEmail, profileHash, profileSalt, profileContact)
	VALUES('user4@user4.com', 'usr4pass', 'usr4pass', 'user 4 contact info');

-- grab the primary key from the insert statements
-- or? SELECT * FROM table;
SELECT profileId FROM profile;

-- items
INSERT INTO item(itemProfileId, itemInfo, itemDate)
	VALUES(1, 'item info', NOW());
INSERT INTO item(itemProfileId, itemInfo, itemDate)
	VALUES(2, 'item info', NOW());
INSERT INTO item(itemProfileId, itemInfo, itemDate)
	VALUES(1, 'item info', NOW());
INSERT INTO item(itemProfileId, itemInfo, itemDate)
	VALUES(2, 'Item Info', NOW());

-- favorites
-- select both foreign keys

SELECT itemId from item;

INSERT INTO favorites()












