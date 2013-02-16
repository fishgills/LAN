<?php

class LoginPage extends Page {

    public function render() {
        ?>
        <form>
            <fieldset>
                <div>
                    Login:
                    <input id="login" type="text" required/>
                    <small>(required)</small>
                </div>
                <div>
                    Password:
                    <input id="password" type="password" required/>
                    <small>(required)</small>
                </div>
                <button type="submit">Login</button>
            </fieldset>
        </form>
        <?php
    }

}