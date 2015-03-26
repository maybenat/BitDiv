<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'follow':
            follow();
            break;
        case 'unfollow':
            unfollow();
            break;
    }
}

function follow() {
    echo 'The follow function is called';
    exit;
}

function unfollow() {
    echo 'The unfollow function is called.';
    exit;
}
?>