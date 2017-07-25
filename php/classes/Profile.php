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
	public function getProfileId(): int {
		return ($this->profileId);
	}

	/**
	 * mutator method for profile id
	 *
	 * @param int|null $newProfileId new value of profile id
	 * @throws rangeException if $newProfileId is not positive
	 * @throws typeError if $newProfileId is not an integer
	 **/
	public function setProfileId(?int $newProfileId): void {
		// if profile id is null, immediately return it
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}

		// verify the profile id is a positive number
		if($newProfileId <= 0) {
			throw(new RangeException("profile id is not positive"));
		}
	}

	/**
	 * accessor method for the profile email
	 * @return string value of $profileEmail
	 **/
	public function getProfileEmail(): string {
		return ($this->profileEmail);
	}

	/**
	 * mutator method for profile email
	 * @param string $newProfileEmail new value of profile email
	 * @throws RangeException if $newProfileEmail is > 128 characters
	 * @throws UnexpectedValueException if $newProfileId is not a string
	 **/
	public function setProfileEmail(string $newProfileEmail): void {
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

	/**
	 * accessor method for the hash on the password
	 *
	 * @return string value for profile hash
	 **/
	public function getProfileHash(): string {
		return ($this->profileHash);
	}

	/**
	 * mutator method for profile hash
	 *
	 * @param string $newProfileHash
	 * @throws InvalidArgumentException if the hash is not secure
	 * @throws RangeException if the hash is not 128 characters
	 * @throws TypeError if hash is not a string
	 **/
	public function setProfileHash(string $newProfileHash): void {
		// make sure hash is properly formatted
		$newProfileHash = trim($newProfileHash);
		$newProfileHash = strtolower($newProfileHash);
		if(empty($newProfileHash) === true) {
			throw(new InvalidArgumentException("profile password hash is empty"));
		}

		// make sure hash is a hexadecimal in string form
		if(!ctype_xdigit($newProfileHash)) {
			throw(new InvalidArgumentException("profile password hash is empty"));
		}

		// make sure hash is 128 characters
		if($newProfileHash !== 128) {
			throw(new RangeException("profile has must be 128 characters"));
		}

		// store the hash
		$this->profileHash = $newProfileHash;
	}

	/**
	 * accessor method for profile salt
	 *
	 * @return string value of the salt as a hexadecimal
	 **/
	public function getProfileSalt(): string {
		return ($this->profileSalt);
	}

	/**
	 * mutator method for profile salt
	 *
	 * @param string $newProfileSalt
	 * @throws InvalidArgumentException if salt is not secure
	 * @throws RangeException if profile salt is not 64 characters
	 * @throws TypeError if profile salt is not a string
	 **/
	public function setProfileSalt(string $newProfileSalt): void {
		// ensure profile salt is the right format
		$newProfileSalt = trim($newProfileSalt);
		$newProfileSalt = strtolower($newProfileSalt);

		// make sure salt is a hexadecimal
		if(!ctype_xdigit($newProfileSalt)) {
			throw(new InvalidArgumentException("profile salt is empty"));
		}

		// make sure salt is exactly 64 characters
		if(strlen($newProfileSalt) !== 64) {
			throw(new RangeException("salt must be 64 characters long"));
		}

		// store the salt
		$this->profileSalt = $newProfileSalt;
	}

	/**
	 * accessor method for profile contact
	 *
	 *@return string value of profile contact
	 **/
	public function getProfileContact(): string {
		return ($this->profileContact);
	}

	/**
	 * mutator method for profile contact
	 *
	 * @param string $newProfileContact new value of profile contact
	 * @throws UnexpectedValueException if profile contact is not a string
	 * @throws RangeException if profile contact is greater than 500 characters
	 **/
	public function setProfileContact(string $newProfileContact): void {
		// verify contact is secure
		$newProfileContact = trim($newProfileContact);
		$newProfileContact = filter_var($newProfileContact, FILTER_SANITIZE_STRING);
		// make sure contact info is not empty
		if(empty($newProfileContact) === true) {
			throw(new UnexpectedValueException("please fill out all the fields"));
		}
		// make sure contact info is within the maximum allowable length
		if(strlen($newProfileContact) > 500) {
			throw(new RangeException("contact info is too many characters"));
		}

		// store the profile contact
		$this->profileContact = $newProfileContact;
	}

	/**
	 * accessor method for profile activation token
	 *
	 * @return string value of the profile activation token
	 **/
	private function getProfileActivationToken() {
		return ($this->profileActivationToken);
	}

	/**
	 * mutator method for profile activation token
	 *
	 * @param string $newProfileActivationToken
	 * @throws InvalidArgumentException if the token is not a string
	 * @throws RangeException if the token is not exactly 32 characters
	 * @throws TypeError if the activation token is not a string
	 **/
	public function setProfileActivationToken(?string $newProfileActivationToken): void {
		if($newProfileActivationToken === null) {
			$this->profileActivationToken = null;
			return;
		}

		$newProfileActivationToken = strtolower(trim($newProfileActivationToken));
		if(ctype_xdigit($newProfileActivationToken) === false) {
			throw(new RangeException("user activation is not valid"));
		}

		// make sure user activation token is only 32 characters
		if(strlen($newProfileActivationToken) !== 32) {
			throw(new RangeException("user activation token must be 32 characters"));
		}

		// store profile activation token
		$this->profileActivationToken = $newProfileActivationToken;
	}
}