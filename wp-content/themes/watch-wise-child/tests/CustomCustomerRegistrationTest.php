<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../functions-unit-testing.php';

class CustomCustomerRegistrationTest extends TestCase
{
    public function testRegister()
    {
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email_address' => 'john.doe@example.com',
            'password' => 'password',
            'confirm_password' => 'password',
            'address_line1' => '123 Main St',
            'city' => 'Anytown',
            'postal_code' => '12345',
            'country' => 'USA'
        ];

        $this->assertTrue(register($data));
    }

    public function testRegisterWithMissingData()
    {
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email_address' => 'john.doe@example.com',
            'password' => 'password',
            'confirm_password' => 'password',
            'address_line1' => '123 Main St',
            'city' => 'Anytown',
            'postal_code' => '12345',
            // 'country' is missing
        ];

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('All fields are required.');

        register($data);
    }

    public function testRegisterWithPasswordMismatch()
    {
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email_address' => 'john.doe@example.com',
            'password' => 'password1',
            'confirm_password' => 'password2',
            'address_line1' => '123 Main St',
            'city' => 'Anytown',
            'postal_code' => '12345',
            'country' => 'USA'
        ];

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Passwords do not match.');

        register($data);
    }

    public function testRegisterWithInvalidEmailAddress()
    {
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email_address' => 'invalid_email',
            'password' => 'password',
            'confirm_password' => 'password',
            'address_line1' => '123 Main St',
            'city' => 'Anytown',
            'postal_code' => '12345',
            'country' => 'USA'
        ];

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid email address.');

        register($data);
    }

    public function testRegisterWithInvalidPostalCode()
    {
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email_address' => 'john.doe@example.com',
            'password' => 'password',
            'confirm_password' => 'password',
            'address_line1' => '123 Main St',
            'city' => 'Anytown',
            'postal_code' => 'invalid',
            'country' => 'USA'
        ];

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Postal code should be a number.');

        register($data);
    }

    // Add more test methods as needed




}
