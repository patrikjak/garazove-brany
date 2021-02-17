<?php

    function is_ajax() {
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];

    $to = 'patrikjak@gmail.com';

    $status = 0;

    if (empty($name)) {
        $error[] = "Meno musí byť vyplnené správne";
    }
    else if (strlen($name) < 2) {
        $error[] = "Meno musí obsahovať minimálne 2 písmena";
    }
    else if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $error[] = "Meno môže obsahovať len veľké, malé písmena a medzery";
    }
    else if (empty($email)) {
        $error[] = "E-mail nesmie byť prádzny";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Zadali ste nesprávny e-mail";
    }
    else if (empty($subject)) {
        $error[] = "Predmet správy nesmie byť prázdny";
    }
    else if (empty($text)) {
        $error[] = "Text správy nesmie byť prázdny";
    }
    else if (strlen($text) < 30) {
        $error[] = "Správa musí obsahovať viac ako 30 znakov";
    }
    else $status = 1;

    if ($status == 1) {
        wordwrap($text, 70);
        mail($to, $subject,
            "Správa z formuláru zo stránky brany-garazove.sk\n\nMeno odosielateľa: $name\nE-mail odosielateľa: $email\nSpráva:\n\n$text");
        if (is_ajax()) {
            $message = json_encode([
                'status' => "success",
            ]);
            die($message);
        }
        else {
            header("Location: index.php");
            die("success");
        }
    }
    else {
        if (is_ajax()) {
            $message = json_encode([
                'errors' => $error
            ]);
            die($message);
        }
        die('fail');
    }
