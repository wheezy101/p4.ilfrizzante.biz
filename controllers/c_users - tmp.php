<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        echo "users_controller construct called<br><br>";
    } 

    # From P2 code
    /*
    public function index() {
        echo "This is the index page";
    }
    */

    public function welcome() {
        # Setup view
            $this->template->content = View::instance('v_users_welcome');
            $this->template->title   = "Welcome";

        # Render template
            echo $this->template;
    }

    # From P2 code
    public function signup($error=NULL) {

        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign Up";
            
        # Pass data to the view
        $this->template->content->error = $error;        

        # Render template
        echo $this->template;

    }

    # Modified P2 code
    public function p_signup() {        
        
        $dupeemail = "SELECT email 
            FROM users 
            WHERE email = '".$_POST['email']."'" ;
            
        $alert = DB::instance(DB_NAME)->select_field($dupeemail);
        
        if($alert!=FALSE) {
        Router::redirect('/users/signup/error');             
        }
        
        else {
        # No user information - show error
        if(empty($_POST['user_name'])) {
        Router::redirect('/users/signup/error'); 
         }
         
        if(empty($_POST['email'])) {
        Router::redirect('/users/signup/error'); 
         }
        
        if(empty($_POST['password'])) {
        Router::redirect('/users/signup/error'); 
         }

        # Signup was legit
        else {
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Encrypt the password  
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

        # Create an encrypted token via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

        # Insert this user into the database 
        $user_id = DB::instance(DB_NAME)->insert("users", $_POST);

        # Send them to the welcome page
        Router::redirect('/users/welcome');
        }
        }
    }
    
    # From P2 code
    public function login($error = NULL) {

        # Set up the view
        $this->template->content = View::instance("v_users_login");

        # Pass data to the view
        $this->template->content->error = $error;
    
        # Render the view
        echo $this->template;

    }   
    
    # From P2 code
    public function p_login() {

        # Sanitize to prevent SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token 
            FROM users 
            WHERE email = '".$_POST['email']."' 
            AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

        # Login failed
        if(!$token) {
            # Note the addition of the parameter "error"
            Router::redirect("/users/login/error"); 
        }
    
        # Login passed
        else {
            setcookie("token", $token, strtotime('+2 weeks'), '/');
            Router::redirect("/");
        }
    }

    # From P2 code
    public function logout() {
    
        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/");
    }

    public function cleanplaces($error=NULL) {
        
        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
        Router::redirect('/users/login');
        }

        # If they weren't redirected away, continue:
        # Setup view
        $this->template->content = View::instance('v_users_cleanplaces');
        $this->template->title   = $this->user->user_name."'s Clean Machine";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render template
        echo $this->template;
 
    }

    public function p_cleanplaces() {
        
        # Don't allow user to skip choosing a place to do chores
        if(!($_POST['place'])) {
        Router::redirect("/users/cleanplaces/error"); 
        }

        # If the user chooses a place, continue
        else {
        # Associate this chore with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this chore was started
        $_POST['started']  = Time::now();
        
        # Unix timestamp of when this chore was completed (after 5 min)
        $_POST['completed']  = Time::now() + 300;
                
        # Insert into Chorehistory DB
        DB::instance(DB_NAME)->insert('chorehistory', $_POST);
        
        # Go on to the chore timer
        Router::redirect('/users/cleantimer');
        }
    }

    public function cleantimer() {
        
        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
        Router::redirect('/users/login');
        }

        # If they weren't redirected away, continue onto the time:
        $this->template->content = View::instance('v_users_cleantimer');
        $this->template->title   = $this->user->user_name."'s Clean Machine";

        # Render template
        echo $this->template;
    }
    
}
# end of the class

