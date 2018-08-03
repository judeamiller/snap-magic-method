<?php

class Person {
	private $name;
	private $age;

	public function __construct(string $name, int $age) {
		try {
			$this->setName($newName);
			$this->setAge($newAge);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
}