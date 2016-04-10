<?php
class BaseSecurity extends CI_Security {

    public function __construct()
    {
        parent::__construct();
    }

    public function csrf_show_error()
    {
        // show_error('The action you have requested is not allowed.');  // default code

        // force page "refresh" - redirect back to itself with sanitized URI for security
        // a page refresh restores the CSRF cookie to allow a subsequent login
        header('Location: ' . htmlspecialchars($_SERVER['REQUEST_URI']), TRUE, 200);
    }
    function csrf_redirect()
    {
        $flash = 'Session cookie automatically reset due to expired browser session.&nbsp; Please try again.';
        $this->session->set_flashdata('message', $flash);
        redirect('/login', 'location');
    }
}
