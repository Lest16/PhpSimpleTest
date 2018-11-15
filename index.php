<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<html>
    <head></head>
    <body>
        <form method="POST" action="form.php" accept-charset="UTF-8">
            <input type="text" name="name" placeholder="Name"/><br>
            <textarea name="message" rows="7" placeholder="Message"></textarea><br>
            <p>Ваша возрастная категория:</p><br><br>
            <p><input type="checkbox" name="checkboxAge[]" value="14-18"/> 14-18</p><br>
            <p><input type="checkbox" name="checkboxAge[]" value="19-25"/> 19-25</p><br>
            <p><input type="checkbox" name="checkboxAge[]" value="26-40"/> 26-40</p><br>
            <p><input type="radio" name="radioGender" value="М" checked/>М</p>
            <p><input type="radio" name="radioGender" value="Ж"/>Ж</p><br>
            <input type="hidden" name="hiddenTest" value="Скрытый элемент"/>
            <button type="submit">Send</button>
        </form>
    </body>
</html>
