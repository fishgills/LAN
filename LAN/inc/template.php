<?php

class Template {

    public static function start() {
        $q = $_REQUEST['q'];
        if ($q == '') {
            $q = "index";
        }
        $className = $q . "Page";
        $page = new $className;
        $page->preHook();
        
        if (count($_POST) > 0) {
            $page->handlePost($page);
        }
        self::render($page);
    }

    public static function reload() {
        self::redirect($_SERVER['REQUEST_URI']);
    }
    public static function redirect($path) {
        header("Location: " . $path);
        exit();
    }

    private static function handlePost($page) {

        $page->handlePost();
    }

    private static function render($page) {
        self::Head();
        self::Header();
        self::Navigation();
        $page->render();
        self::Footer();
    }

    public static function Head() {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title></title>
                <link href='http://fonts.googleapis.com/css?family=Oswald|Open+Sans' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="/css/reset.css" type="text/css">
                <link rel="stylesheet" href="/js/jquery-ui-1.10.1.custom/css/smoothness/jquery-ui-1.10.1.custom.min.css" type="text/css">
                <link rel="stylesheet" href="/css/other.css" type="text/css">
                <link rel="stylesheet" href="/css/main.css" type="text/css">
                <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
                <script src="/js/jquery-ui-1.10.1.custom/js/jquery-ui-1.10.1.custom.min.js"></script>
                <script src="/js/jquery-ui-timepicker-addon.js"></script>
                <script src="/js/main.js"></script>
            </head>

            <?php
        }

        public static function Header() {
            ?>
            <header>
                <h1><a href = "#">Lan Party <strong>Organizer!</strong></a></h1>
            </header>
            <?php
        }

        private static function getNavigation() {
            global $dbh;
            $result = array();
            foreach ($dbh->query("select * from navigation") as $row) {
                $obj = new stdClass();
                $obj->name = $row['name'];
                $obj->path = $row['path'];
                $obj->auth = (boolean) $row['auth'];
                $result[] = $obj;
            }
            return $result;
        }

        public static function Navigation() {
            $navArray = self::getNavigation();
            ?>
            <nav>
                <ul>
                    <?php
                    foreach ($navArray as $link) {
                        if ($link->auth === Authenticate::loggedIn())
                            echo "<li><a href=\"" . $link->path . "\">" . $link->name . "</a></li>";
                    }
                    ?>
                </ul>
            </nav>

            <?php
        }

        public static function Footer() {
            ?>
            <footer>
                Footer here.
            </footer>
        </body>
        </html>

        <?php
    }

}

