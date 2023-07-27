
<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\config.php";

class token
{
  public function generate_tokens(): array
  {
    $selector = bin2hex(random_bytes(16));
    $validator = bin2hex(random_bytes(32));

    return [$selector, $validator, $selector . ":" . $validator];
  }
  public function parse_token(string $token): ?array
  {
    $parts = explode(":", $token);

    if ($parts && count($parts) == 2) {
      return [$parts[0], $parts[1]];
    }
    return null;
  }
  public function insert_user_token(
    string $CIN,
    string $selector,
    string $hashed_validator,
    string $expiry
  ): bool {
    $sql = 'INSERT INTO user_tokens(CIN, selector, hashed_validator, expiry)
            VALUES(:CIN, :selector, :hashed_validator, :expiry)';
    $db = config::getConnexion();
    $statement = $db->prepare($sql);
    $statement->bindValue(":CIN", $CIN);
    $statement->bindValue(":selector", $selector);
    $statement->bindValue(":hashed_validator", $hashed_validator);
    $statement->bindValue(":expiry", $expiry);

    return $statement->execute();
  }
  public function find_user_token_by_selector(string $selector)
  {
    $sql = 'SELECT id, selector, hashed_validator, CIN, expiry
                FROM user_tokens
                WHERE selector = :selector AND
                    expiry >= now()
                LIMIT 1';
    $db = config::getConnexion();
    $statement = $db->prepare($sql);
    $statement->bindValue(":selector", $selector);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  public function delete_user_token(string $CIN): bool
  {
    $sql = "DELETE FROM user_tokens WHERE CIN = :CIN";
    $db = config::getConnexion();
    $statement = $db->prepare($sql);
    $statement->bindValue(":CIN", $CIN);

    return $statement->execute();
  }
  public function find_user_by_token(string $token)
  {
    $tokens = $this->parse_token($token);

    if (!$tokens) {
      return null;
    }

    $sql = 'SELECT user.CIN, email
            FROM user,user_tokens
            WHERE user.CIN = user_tokens.CIN AND selector = :selector AND
                expiry > now()
            LIMIT 1';
    $db = config::getConnexion();
    $statement = $db->prepare($sql);
    $statement->bindValue(":selector", $tokens[0]);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  public function token_is_valid(string $token): bool
  {
    [$selector, $validator] = $this->parse_token($token);
    $tokens = $this->find_user_token_by_selector($selector);
    if (!$tokens) {
      return false;
    }
    return password_verify($validator, $tokens["hashed_validator"]);
  }
  public function log_user_in(array $user): bool
  {
    // prevent session fixation attack
    if (session_regenerate_id() == PHP_SESSION_ACTIVE) {
      // set username & id in the session
      $_SESSION["email"] = $user["email"];
      $_SESSION["user_id"] = $user["CIN"];
      return true;
    }

    return false;
  }
  public function remember_me(string $CIN, int $day = 30)
  {
    [$selector, $validator, $token] = $this->generate_tokens();

    // remove all existing token associated with the user id
    $this->delete_user_token($CIN);

    // set expiration date
    $expired_seconds = time() + 60 * 60 * 24 * $day;

    // insert a token to the database
    $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
    $expiry = date("Y-m-d H:i:s", $expired_seconds);

    if ($this->insert_user_token($CIN, $selector, $hash_validator, $expiry)) {
      setcookie("remember_me", $token, $expired_seconds, "/", "localhost");
    }
  }

  public function is_user_logged_in(): bool
  {
    // check the session
    //if (isset($_SESSION["email"])) {
    //  return true;
    //}

    // check the remember_me in cookie
    $token = filter_input(INPUT_COOKIE, "remember_me", FILTER_SANITIZE_STRING);

    if ($token && $this->token_is_valid($token)) {
      $user = $this->find_user_by_token($token);

      if ($user) {
        return $this->log_user_in($user);
      }
    }
    return false;
  }

  public function logout(): void
  {
    if ($this->is_user_logged_in()) {
      // delete the user token
      $this->delete_user_token($_SESSION["user_id"]);

      // delete session
      unset($_SESSION["email"], $_SESSION["user_id"]);

      // remove the remember_me cookie
      if (isset($_COOKIE["remember_me"])) {
        unset($_COOKIE["remember_me"]);
        setcookie("remember_user", null, -1);
      }

      // remove all session data
      session_destroy();
    }
  }
}


?>
