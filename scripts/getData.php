<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manipulando</title>
    </head>
    <body>
        <h1>Manipulando</h1>
        <?php
            
            $name = $email = $topic = $message = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['input_name'];
                $email = $_POST['input_email'];
                $topic = $_POST['input_topic'];
                $message = $_POST['input_message'];

                if (!!validateData($name, $email, $topic, $message)) {
                    printValidData();
                } else {
                    echo "Dados Inválidos!";
                }
            }

            function printValidData()
            {
                echo "Seu nome é : " . $_POST['input_name'];
                echo "<br>Seu email é : " . $_POST['input_email'];
                echo "<br>O assunto da mensagem é : " . $_POST['input_topic'];
                echo "<br>A mensagem é : " . $_POST['input_message'];
            }

            function validateName($name)
            {
                return (strlen($name) > 4 && strlen($name) <= 30);
            }

            function validateEmail($email)
            {
                return !!strpos($email, "@lets.com.vc");
            }

            function validateTopic($topic)
            {
                return (strlen($topic) > 4 && strlen($topic) <= 15);
            }

            function validateMessage($msg)
            {
                return $msg !== "";
            }

            function validateData($name, $email, $topic, $message)
            {
                return !!validateName($name)
                    && !!validateEmail($email) 
                    && !!validateTopic($topic)
                    && !!validateMessage($message);
            }
        ?>
    </body>
</html>
