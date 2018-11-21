<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="POST" action="form.php">
            <input type="text" name="name" placeholder="Name" required/><br>
            <textarea name="message"  rows="7" placeholder="Message" required></textarea><br>
            <p>Ваша возрастная категория:</p><br><br>
            <p><input type="checkbox" name="checkboxAge[]" value="14-18"/> 14-18 лет</p><br>
            <p><input type="checkbox" name="checkboxAge[]" value="19-25"/> 19-25 лет</p><br>
            <p><input type="checkbox" name="checkboxAge[]" value="26-40"/> 26-40 лет</p><br>
            <p><input type="radio" name="radioGender" value="men" checked/>Мужчина</p>
            <p><input type="radio" name="radioGender" value="women"/>Женщина</p><br>
            <input type="hidden" name="dateOpenForm" value="<?echo date('Y-m-d H:i:s');?>"/>
            <input type="hidden" name="passwordHash" value="<?echo md5('qwerty123');?>"/>
            <button type="submit">Send</button>
        </form>
    </body>
</html>
