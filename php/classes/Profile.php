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
	/**
	 * accessor method for profile id
	 * @return int|null value of $profileId
	 **/
	public function getProfileId() : int {
		return($this->profileId);
	}
	/**
	 * mutator method for profile id
	 *
	 * @param int|null $newProfileId new value of profile id
	 * @throws rangeException if $newProfileId is not positive
	 * @throws typeError if $newProfileId is not an integer
	 **/
	public function setProfileId(?int $newProfileId) : void {
		// if tweet id is null, immediately return it
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}
	}
	/**
	 * accessor method for the profile email
	 * @return string value of $profileEmail
	 **/
	public function getProfileEmail() : string {
		return($this->profileEmail);
	}
	/**
	 * mutator method for profile email
	 * @param string $newProfileEmail new value of profile email
	 * @throws RangeException if $newProfileEmail is > 128 characters
	 * @throws unexpectedValueException if $newProfileId is not a string
	 **/
	public function setProfileEmail(string $newProfileEmail) : void {
		// verify email is secure
		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_SANITIZE_EMAIL);
		if(empty($newProfileEmail) === true) {
			throw(new UnexpectedValueException("Please enter a valid email"));
		}
		// make sure email is not too long for the database
		if(strlen($newProfileEmail) > 128) {
			throw(new RangeException("Email is too long"));
		}
		// store profile email
		$this->profileEmail = $newProfileEmail;
	}

}