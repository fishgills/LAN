<?php

class PartiesPage extends Page {

    public function render() {
        ?>
        <section class="body">
            <h2 class="link" id="toggleNewPartyForm">Create a new Party</h2>
            <div id="newPartyForm">
                <form method="post">
                    <fieldset>
                        <div>
                            <label>Name</label>
                            <input type="text" name="name" required />
                        </div>
                        <div>
                            <label>Location</label>
                            <input type="text" name="location" />
                        </div>
                        <div>
                            <label>Start</label>
                            <input type="text" class="timepicker" name="start" required />
                        </div>
                        <div>
                            <label>End</label>
                            <input type="text" class="timepicker" name="end" required />
                        </div>
                    </fieldset>
                    <div>
                        <button type="submit">Party!</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="sub-body">
            <h2>Your Parties</h2>
        </section>
        <?php

    }

    public function _handlePost() {
        $party = new Party();
        $party->name = $this->data['name'];
        $party->start = strtotime($this->data['start']);
        $party->end = strtotime($this->data['end']);
        Template::reload();
    }

}
