<?php
/**
 * creating state variables and methods for the profile class
 *
 * creating state variables for the profile entity and writing accessor and mutator methods to access the data for
 * the profile class
 *
 * @author Jack Reuter <djreuter45@gmail.com>
 * @version 1.0.0
 **/
class Profile {
	/**
	 * Id for this profile; this is the primary key
	 *@var int $profileId
	 **/
	private $profileId;
	/**
	 * the users email address; this is a unique index
	 *@var string $profileEmail
	 **/
	private $profileEmail;
	/**
	 * hash for profile password
	 *@var $profileHash
	 **/
	private $profileHash;
	/**
	 * salt for profile password
	 * @var $profileSalt
	 **/
	private $profileSalt;
	/**
	 * contact info for profile
	 * @var string @profileContact
	 **/
	private $profileContact;
	/**
	 * activation token for profile to make sure profile is valid
	 * @var $profileActivationToken
	 **/
	private $profileActivationToken;

}