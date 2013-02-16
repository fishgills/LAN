<?php

class RegisterPage extends Page {

    public function handlePost() {
    }
    public function render() {
        ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']?>">
            <fieldset>
                <div>
                    Login:
                    <input id="login" name="login" type="text" required/>
                    <small>(required)</small>
                </div>
                <div>
                    Password:
                    <input id="password" name="password" type="password" required/>
                    <small>(required)</small>
                </div>
                <div>
                    Re-type Password:
                    <input id="password2" name="password2" type="password" required/>
                    <small>(required)</small>
                </div>                
                <button type="submit">Sign Up</button>
            </fieldset>
        </form>
        <?php
    }

}