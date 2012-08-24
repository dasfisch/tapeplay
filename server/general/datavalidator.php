<?php
	/**
	 * A class for any sort of validation. Extends the inputFilter class.
	 * Uses custom Exception class, BrashExceptions, which extends the
	 * PHP standard Exception class.
	 *
	 * @author Sebastian Frohm <sebastian.frohm@gmail.com>
	 *
	 */

	class DataValidator {
		public static $DATE_REGEX = '/^([a-zA-Z]{3,10}) ([0-9]{1,2})(st|nd|rd|th), ([0-9]{4}) (([0-9]{2}):([0-9]{2}):([0-9]{2}) (AM|PM|am|pm))$/';
		public static $EMAIL_REGEX = '/([a-zA-Z0-9-_\.]+)(@)([a-zA-Z0-9-_\.]+)/';
        public static $GROUP_EMAIL_REGEX = '/([a-zA-Z0-9-_\.]+)(@)([a-zA-Z0-9-_\.](,?)+)/';
		public static $USERNAME_REGEX = '/([a-zA-Z0-9_-]+)/';
		public static $USZIP_REGEX = '/^([0-9]{5})$/';

		/**
		 * Compare two strings.
		 * @param string $primary
		 * @param string $match
		 * @throws BrashExceptions
		 */
		public function compareStrings($primary, $match) {
			if(strcmp($primary, $match) === -1) {
				Throw new Exception('Strings do not match', 202);
			}

			return true;
		}

		/**
		 * Compare a password and its matching case.
		 * @param string $password
		 * @param string $match
		 * @throws BrashExceptions
		 */
		public function comparePasswords($password, $match) {
			try {
				$this->compareStrings($password, $match);
			} catch(Exception $e) {
				Throw new Exception('The passwords do not match!', 307);
			}
		}

		public function checkAlphaNumString($string) {
			if(!preg_match('/([a-zA-Z0-9]+)/', $string)) {
				Throw new Exception('The string contains non-alphanumeric characters!');
			}

			return true;
		}

		/**
		 * Compare an email.
		 * @param string $email
		 * @throws BrashExceptions
		 */
		public function checkEmail($email) {
			if(!preg_match(self::$EMAIL_REGEX, $email)) {
				Throw new Exception('Email is not valid', 203);
			}

			return true;
		}

		public function checkUserName($username) {
			if(!preg_match(self::$USERNAME_REGEX, $username)) {
				Throw new Exception('The username is not valid!');
			}

			try {
				$this->checkStringLength($username, 8, 32);
			} catch(Exception $e) {
				$message = $e->getMessage();

				Throw new Exception('There was a problem with your username: '.$message, $e->getCode());
			}

			return true;
		}

		public function checkStringLength($string, $minLength=0, $maxLength=0) {
			if(!is_string($string) || $string == '') {
				Throw new Exception('There is no valid string passed!', 303);
			}

			$stringLength = strlen($string);

			/**
			 * Process:
			 *
			 * 1. check if minLength is set.
			 * 		- if minLength is set and maxLength is set, check the string.
			 * 		- if only minLength is set, check the string
			 * 2. check if maxLength is set.
			 * 		- if maxLength is set, check the string.
			 * 3. neither are set. Throw an error
			 */
			if(isset($minLength) && $minLength > 0) {
				if(isset($maxLength) && $maxLength > 0) {
					if($stringLength < $minLength) {
						Throw new Exception('The value is too short!', 304);
					}

					if($stringLength > $maxLength) {
						Throw new Exception('The value is too long!', 305);
					}
				} else {
					if($stringLength < $minLength) {
						Throw new Exception('The value is too short!', 304);
					}
				}
			} elseif(isset($maxLength) && $maxLength > 0) {
				if($stringLength > $maxLength) {
					Throw new Exception('The value is too long!', 305);
				}
			} else {
				Throw new Exception('Minimum and maximum lengths aren\'t set!', 306);
			}
		}

		public function checkUSZip($zip) {
			if(!preg_match(self::$USZIP_REGEX, $zip)) {
				Throw new Exception('The US zip code is not valid!', 307);
			}
		}

		public function checkDate($date) {
			if(!preg_match(self::$DATE_REGEX, $date)) {
				Throw new Exception('The date must be in the following format: Month Date, Year hour:minute:second AM (e.g.: '.date('M d, Y h:i:s A', strtotime('now')).')');
			}
		}

		public function checkForFutureDate($date) {
			if(strtotime($date) <= strtotime('now')) {
				Throw new Exception('The entered date is before the current date!');
			}
		}
	}