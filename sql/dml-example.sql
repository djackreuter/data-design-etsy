-- insert data into the created tables
INSERT INTO profile(profileId, profileEmail, profileSalt, profileHash, profileContact)
	VALUES(1, 'user1@user.com', 'password', 'password', 'user contact');
INSERT INTO profile(profileId, profileEmail, profileSalt, profileHash, profileContact)
	Values(2, 'user2@user.com', 'usr2pass', 'usr2pass', 'user2 contact info');
INSERT INTO profile(profileId, profileEmail, profileHash, profileSalt, profileContact)
	VALUES(3, 'user3@user.com', 'usr3pass', 'usr3pass', 'user 3 contact info');
INSERT INTO profile(profileId, profileEmail, profileHash, profileSalt, profileContact)
	VALUES(4, 'user4@user.com', 'usr4pass', 'usr4pass', 'user 4 contact info');

-- grab the primary keys from the insert statements


INSERT INTO item(itemId, itemProfileId, itemInfo)
	VALUES(1, 1, 'item 1 user 1 info');




