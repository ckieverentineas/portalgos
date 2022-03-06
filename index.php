<?php
    session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            font-size: 30px;
        }
        img {
            margin-top: 15px;
        }
        a {
            text-decoration: none;
            color:black;
        }
        a:hover {
            color:pink;
        }
        *{
            transition: 3000ms;
        }
        div {
            display: flex;
            flex-direction: column;
            background-color: oldlace;
            align-items: center;
            margin: 1px;
            padding: 35px;
            border-radius: 15px;
            
        }
        div div {
            background-color: paleturquoise;
        }
        div div div div {
            background-color: azure;
        }
        div div div div div {
            background-color: pink;
            margin-top: 30px;
        }
    </style>
</head>
<body onload="Reload_Counter();">
<audio id='casino' src="mus/01186.mp3"></audio>
<audio id='back' src="mus/Kalimba.mp3" autoplay></audio>
    <div>
        <div>
            <p>
                <a href="form_login.html">
                    | Вход |
                </a>
                <a href="form_register.html">
                    Регистрация |
                </a>
                <a href="form_order.php">
                    Создать заявку |
                </a>
                <a href="form_tasks.php">
                    Мои заявки |
                </a>
                <?php 
                    if(isset($_SESSION['session'])) {
                        echo 'Добро пожаловать в мою таверну
                        <form action="exit.php" method="POST">
                            <input type="submit" name="exit" value="Выйти">
                        </form>';
                    }
                ?>
            </p>
            <div>
                <div>
                    <?php
                        echo "Hello Kitty".'<hr>';
                        //require("./requests.php");
                        require("./get_users.php");
                        echo "<p>Количество решенных предьяв: <label id='status'></label></p>";
        
                        Get_Tasks();
                    ?>
                </div>
            </div>
            <?php
                Get_User();
            ?>
            <button onclick="Anima();">Анима</button>
    <script>
        async function Reload_Counter(){
            let response = await fetch('reloader.php',{
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                }
            });
            let data = await response.json();
            if (data.status != document.getElementById('status').innerHTML) {
                sound_play();
                setTimeout(()=>{document.getElementById('casino').pause()},4000);
            }
            document.getElementById("status").innerHTML = data.status;
        }
        setInterval(Reload_Counter,5000);
        function sound_play(){
            document.getElementById('casino').play()
        }
        function Anima() {
            Sound_Gudizer();
            //setInterval(Anima, 10000)
            for(let i=0; i<100;i++) {
                setTimeout(()=> {
                    const test = document.getElementsByTagName('*')[i];
                    const temp = test.style.background;
                    test.style.background = `rgb(${Math.random()*255},${Math.random()*255},${Math.random()*255})`;
                    test.style.transform = 'scale(50%)';
                    setTimeout(()=>{test.style.background = `rgb(${Math.random()*255},${Math.random()*255},${Math.random()*255})`;
                    test.style.transform = 'scale(100%)';},i*3000)
                }, 1000);
                
            }
        }
        
            
       
        function Sound_Gudizer() {
            document.getElementById('back').play();
        }
        
    </script> 
</body>
</html>
