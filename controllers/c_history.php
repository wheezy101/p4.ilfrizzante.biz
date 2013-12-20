<?php
class history_controller extends base_controller {

    public function cleanhistory() {

    # Set up the View
    $this->template->content = View::instance('v_history_cleanhistory');
    $this->template->title   = "History";

    # Build the query
    $q = "SELECT 
        place,
        completed
        FROM chorehistory
        WHERE user_id = ".$this->user->user_id;;

    # Run the query
    $history = DB::instance(DB_NAME)->select_rows($q);

    # Pass data to the View
    $this->template->content->history = $history;

    # Render the View
    echo $this->template;

}

}
