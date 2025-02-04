

<?php
    use PHPUnit\Framework\TestCase;
    require_once __DIR__ . '/../backend/validator.php';
    require_once __DIR__ . '/../backend/functions.php';
    class LoginTest extends TestCase
    {
        public function testValidLogin()
        {
            $username = 'validUser';
            $password = 'validPassword';
            $result = $this->login($username, $password);
            $this->assertTrue($result);
        }

        public function testInvalidLogin()
        {
            $username = 'invalidUser';
            $password = 'invalidPassword';
            $result = $this->login($username, $password);
            $this->assertFalse($result);
        }

        public function testEmptyUsername()
        {
            $username = '';
            $password = 'somePassword';
            $result = $this->login($username, $password);
            $this->assertFalse($result);
        }

        public function testEmptyPassword()
        {
            $username = 'someUser';
            $password = '';
            $result = $this->login($username, $password);
            $this->assertFalse($result);
        }

        private function login($username, $password)
        {
            // Simulate login logic
            if ($username === 'validUser' && $password === 'validPassword') {
                return true;
            }
            return false;
        }
    }
?>