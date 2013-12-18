<?php
class history_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Members only. <a href='/users/login'>Login</a>");
        }
    }

    public function cleanmachine() {

        # Setup view
        $this->template->content = View::instance('v_users_cleanmachine');

        # Render template
        echo $this->template;

    }

    public function p_cleanmachine() {

        # Associate this chore with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['started']  = Time::now();

        # Get which chore it was
        #$_POST('place') = cleanPlace(this.form);
        
        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('chorehistory', $_POST);

        # Quick and dirty feedback
        echo "Your completed chore has been recorded. <a href='/posts/add'>Complete another!</a>";
    }
}
