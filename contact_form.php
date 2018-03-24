<?php
// Fetching Values from URL.
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
if (!preg_match("/^[[a-ząćśńółęźżA-ZĄĆŚŃÓŁĘŹŻ ]+$/", $name)) {
echo "<span>* Podaj poprawne Imie i Nazwisko *</span>";
} else {
$subject = 'Potwierdzenie wysłania wiadomośći z formularza kontaktowego';
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'Od:' . $email. "\r\n";
$headers .= 'Cc:' . $email. "\r\n";
$template = '<div style="width: 100%; border-bottom: 1px solid #ccc;line-height: 50px;font-size: 15px;text-transform: uppercase;margin-bottom: 25px;">Potwierdzenie wysłania wiadomości. </div>'
. 'Witaj ' . $name . ', dziękujemy za skontaktowanie się ze mną. Twoja wiadomość została już wysłana, 
gdy tylko ją przeczytam odrazu odpowiem. Gdybyś nie był pewny(a) czy poprawnie wszystko napisałeś(aś)
 poniżej znajduje się wszystko. <br/>'
. '<div style="margin: 15px 30px; border-left: 2px #ccc;"><b>Imię i Nazwisko:</b> ' . $name . '<br/>'
. '<b>Email:</b> ' . $email . '<br/>'
. '<b>Wiadomosc:</b> ' . $message . '<br/></div><div style="width: 100%; text-align: right; margin-bottom: 25px;">Pozdrawiam Filip "SimLay" Cichorek</div>';
$sendmessage = "<div style=\"width:500px;background-color:#eee;border: 1px solid #ccc;text-align:center;\">" . $template . "</div>";
$sendmessage = wordwrap($sendmessage, 70);
mail("cichorek.filip@gmail.com", $subject, $sendmessage, $headers);
echo "* Wiadomość została wysłana *";
}
} else {
echo "<span>* Nieprawidłowy e-mail *</span>";
}
?>