<?php
/**
 * Plugin name: Calculator
 * Plugin URL: http://test.ru
 * Description: Плагин для расчета стоимости трубы
 * Author: Roman Yshko
 */
?>


<html>
<head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        function chk()
        {
            var name=document.getElementById('name').value * 4;
            var dataString = 'name=' + name;
            $. ajax({
                type:"post",
                url: "hi.php",
                data: dataString,
                cache: false,
                success: function (html) {
                    $('#msg').html(html)
                }
            })
            return false;
        }
    </script>
</head>
<body>
<div class="calculator">
<form>
    <input type="text" id="name">
    <br /><br />
    <input type="submit" value="submit" onclick="return chk()">
</form>
<p id="msg"></p>
    </div>
</body>
</html>

<?php
add_filter('the_content' , 'chk');

?>
