<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Création de sites web professionnels, intégration, programmation, webdesign.">
    <meta name="author" content="Maria Villegas">
    <title>Contactez-moi</title>
    <link href="css/style-contact.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script src="https://kit.fontawesome.com/5f47dca840.js" crossorigin="anonymous"></script>
    <script src="js/script-contact.js"></script>
</head>
<body id="page-top">
    <header>
        <div class="topnav" id="myTopnav">
            <a href="index.html" class="active">
                <img id="logo" src="img/assassins-creed.png">
                <strong>MV</strong>
            </a>
            <a href="#page-top">Contact</a>
            <a target="_blank" href="download/CV - Maria Villegas.pdf" download="CV_Maria_Villegas.pdf"><i class="fas fa-download"></i> CV</a>
            <a href="javascript:void(0);" class="icon" onclick="mainMenu()">
                <i class="fas fa-bars"></i>
            </a>
        </div>
    </header>
    <?php
        if(isset($_POST['submit'])){
            $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
            $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
            $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
            $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
            if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
            $name_error = 'Format invalide';
            }
            if(!preg_match("/^[A-Za-z .'-]+$/", $subject)){
            $subject_error = 'Sujet invalide';
            }
            if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
            $email_error = 'Email invalide';
            }
            if(strlen($message) === 0){
            $message_error = 'Votre message ne doit pas être vide';
            }
        }
    ?>
    <section id="contact">
        <h2>Contactez-moi</h2>
        <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <label for="name">Prénom NOM:</label>
              <input type="text" name="name" placeholder="Jean">
              <p><?php if(isset($name_error)) echo $name_error; ?></p>

              <label for="subject">Sujet:</label><br>
              <input type="text" name="subject" placeholder="Info">
              <p><?php if(isset($subject_error)) echo $subject_error; ?></p>
          
              <label for="email">Email:</label>
              <input type="text" name="email" placeholder="toto@toto.com">
              <p><?php if(isset($email_error)) echo $email_error; ?></p>
          
              <label for="message">Message:</label>
              <textarea name="message" placeholder="Bonjour!..." style="height:200px"></textarea>
              <p><?php if(isset($message_error)) echo $message_error; ?></p>
          
              <input type="submit" value="Envoyer">
              <button type="reset" name="effacer">Effacer</button>

            <?php 
                if(isset($_POST['submit']) && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
                $to = 'maria.villegas.pro@gmail.com';
                $body = " Name: $name\n E-mail: $email\n Message:\n $message";
                if(mail($to, $subject, $body)){
                    echo '<p style="color: green">Message sent</p>';
                }else{
                    echo '<p>Error occurred, please try again later</p>';
                }
                }
            ?>
              
            </form>
          </div>
    </section>
    <footer>
        <section id="copyright">
                <p><i class="fas fa-code"></i> made by Maria Villegas</p>
        </section>
    </footer>
</body>
</html>