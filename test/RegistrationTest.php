<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../backend/validator.php';
require_once __DIR__ . '/../backend/functions.php';

class RegistrationTest extends TestCase {

    // Test valid name
    public function testValidName() {
        $this->assertTrue(validateName("John"));
        $this->assertTrue(validateName("Sarah"));
    }

    // Test invalid name
    public function testInvalidName() {
        $this->assertFalse(validateName("John123"));
        $this->assertFalse(validateName("Sarah@"));
        $this->assertFalse(validateName(""));
    }

    // Test valid email
    public function testValidEmail() {
        $this->assertTrue(validateEmail("user@example.com"));
    }

    // Test invalid email
    public function testInvalidEmail() {
        $this->assertFalse(validateEmail("invalid-email"));
        $this->assertFalse(validateEmail("user@"));
    }

    // Test valid phone number
    public function testValidPhone() {
        $this->assertTrue(validatePhone("0712345678"));
    }

    // Test invalid phone number
    public function testInvalidPhone() {
        $this->assertFalse(validatePhone("12345"));
        $this->assertFalse(validatePhone("abcdefghij"));
    }

    // Test valid NIC
    public function testValidNIC() {
        $this->assertTrue(validateNIC("123456789V")); // Old format
        $this->assertTrue(validateNIC("200012345678")); // New format
    }

    // Test invalid NIC
    public function testInvalidNIC() {
        $this->assertFalse(validateNIC("12345678")); // Too short
        $this->assertFalse(validateNIC("abcdefghijk")); // Contains letters
    }

    // ✅ Test valid password
    public function testValidPassword() {
        $this->assertTrue(validatePassword("StrongPass1"));
    }

    // Test invalid password
    public function testInvalidPassword() {
        $this->assertFalse(validatePassword("weak")); // Too short
        $this->assertFalse(validatePassword("NoNumbersHere")); // No number
    }

    // ✅ Test user existence check (Mocking database response)
    public function testUserExists() {
        $this->assertFalse(userExists("999999999V")); 
    }

    // ✅ Test registration process
    public function testRegistrationSuccess() {
        $result = addUser("John", "Doe", "johndoe@example.com", "0712345678", "987654321V", "Main Street", "Colombo", "Western", "StrongPass1");
        $this->assertTrue($result);
    }

    // Test registration failure (Duplicate NIC)
    public function testRegistrationFailureDuplicateNIC() {
        $this->assertTrue(userExists("987654321V")); 
    }
}

?>
