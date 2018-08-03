<?php

class Person {
	private $age;
	private $name;


	public function __construct(string $newName, int $newAge) {
		try {
			$this->setAge($newAge);
			$this->setName($newName);
					} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return ($this->name);
	}

	/**
	 * mutator for name
	 * @param $newName
	 */
	public function setName($newName): void {
		// verify the  name is secure
		$newName = trim($newName);
		$newName = filter_var($newName, FILTER_SANITIZE_URL);
		if(empty($newName) === true) {
			throw(new \InvalidArgumentException("Name is empty or insecure."));
		}

		// verify the name will fit in the database
		if(strlen($newName) > 64) {
			throw(new \RangeException("Your Name is too long. Limit 64 characters."));
		}

		// store the name
		$this->name = $newName;
	}

	/**
	 * accessor for age
	* @return mixed
	 */
	public function getAge() {
		return ($this->age);
	}


	public function setAge( int $newAge): int {
		$this->age = $newAge;
		//verifys that the age is a positive number
		if($newAge < 0) {
			throw (new \RangeException("Age cannot be less than zero"));
		}if($newAge > 0 and $newAge<=18){
			return ("hello caleb");
		}if ($newAge > 118){
			return ("hi deepdivedylan");
		}

		//store the value if it passes validation
		$this->age = $newAge;
	}
	public function __toString() {
		// TODO: Implement __toString() method.
		return $this->name;
	}
}

