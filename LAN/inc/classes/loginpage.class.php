<?php

class LoginPage extends Page {

    public function render() {
        ?>
        <section>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
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
                    <button type="submit">Login</button>
                </fieldset>
            </form>
        </section>
        <?php
    }

    public function _handlePost() {
        Authenticate::auth($this->data['login'], $this->data['password']);
        Template::redirect("/parties");
    }

}
