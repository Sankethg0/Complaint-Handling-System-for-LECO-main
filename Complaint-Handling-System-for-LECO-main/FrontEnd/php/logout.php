+<?php 
publilc function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('index.html'); //redirect to login
    }
?>