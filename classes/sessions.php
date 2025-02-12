<?php
/*
 * Created on July 9, 2007
 * Updated Jan 25, 2025
 * @Author: Kent W Blodgett
 * Project: Crossroads Family site
 * 
 * sessions.php
 * This is to be used as a helper class to 
 * manage the user sessions
 * 
 * Methods used:
 * init_session
 */

/*
class SecureSessionManager {
    private $sessionLifetime;
    private $cookieParams;
    private $csrfTokenKey = 'csrf_token';

    public function __construct(int $lifetime = 1800) {
        $this->sessionLifetime = $lifetime;
        
        // Secure cookie parameters
        $this->cookieParams = [
            'lifetime' => $this->sessionLifetime,
            'path' => '/',
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict'
        ];
    }

    public function start(): bool {
        // Prevent session fixation
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }

        // Configure secure session settings
        ini_set('session.use_strict_mode', 1);
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_only_cookies', 1);
        
        // Set cookie parameters
        session_set_cookie_params($this->cookieParams);

        // Start session
        return session_start();
    }

    public function login(string $userId): void {
        // Regenerate session ID on login
        session_regenerate_id(true);
        
        // Set user identification
        $_SESSION['user_id'] = $userId;
        $_SESSION['login_time'] = time();
        
        // Generate CSRF token
        $_SESSION[$this->csrfTokenKey] = $this->generateCSRFToken();
    }

    public function validateCSRFToken(string $token): bool {
        return hash_equals($_SESSION[$this->csrfTokenKey], $token);
    }

    private function generateCSRFToken(): string {
        return bin2hex(random_bytes(32));
    }

    public function isLoggedIn(): bool {
        return isset($_SESSION['user_id']) && 
               (time() - $_SESSION['login_time']) < $this->sessionLifetime;
    }

    public function logout(): void {
        // Unset all session variables
        $_SESSION = [];

        // Destroy session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destroy session
        session_destroy();
    }

    public function getCSRFToken(): string {
        return $_SESSION[$this->csrfTokenKey] ?? '';
    }
}

 */
 class sessions {
 
  public $status;
  
  public function __construct() {
 
     if (isset($_COOKIE["crfs"]))  $this->init_session();
     $status = session_status();
    
  }
  
  public function init_session() {
 	   
 	  @session_save_path(CR_SESSION_PATH);
      @session_name('user_crfs');
      @session_start();

      $aid = (!isset($_SESSION["aid"])) ? "" : $_SESSION["aid"];
      $email = $_SESSION['email'];
      $uname = $_SESSION['username'];
      $fname = $_SESSION['fname'];
      $lname = $_SESSION['lname'];
	 
	        
      if (!$aid ) /*|| !$penId*/
             {
               
               $relog = new Login;
               $relog->relog();

               $aid   = $_SESSION['aid'];
               $email = $_SESSION['email'];
               $uname = $_SESSION['username'];
               $fname = $_SESSION['fname'];
               $lname = $_SESSION['lname'];
             }
         
 	}
 	
 	
 	
 	public function __destruct(){}
 
 
 }
 
?>