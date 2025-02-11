<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <nav class="nav">
                <div class="logo">
                    <a href="index.php"><img src="assets/gbg-logo-removebg-preview.png" alt="Logo"></a>
                </div>
                <ul class="nav-list">
                    <li><a href="about.html">Who We Are</a></li>
                    <li><a href="whatwedo.html">What we Do</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
                <div class="account">
                    <a href="login.php">Login</a>
                </div>
            </nav>
        </header>
        <section class="contatc-form">
            
            <div class="physical-contact-info">

                <div class="contact-card">
                    <span class="material-symbols-outlined">
                        location_on
                    </span>
                    <p>56/2,8 Araliya Uyana 1st Lane, Maharagama, Western Province</p>
                </div>

                <div class="contact-card">
                    
                    <span class="material-symbols-outlined">
                        call
                    </span>
                    
                    <p>0762534198</p>
                </div>

                <div class="contact-card">
                    
                    <span class="material-symbols-outlined">
                        alternate_email
                    </span>
                    
                    <p>gasbygas.service@gmail.com</p>
                </div>
            </div>

            <form action="contact.php" method="post" class="message-contatc-form" >
                <input type="text" name="fullname" placeholder="Full Name">
                <input type="text" name="email" placeholder="E-Mail">
                <input type="text" name="phone" placeholder="Phone Number">
                <textarea name="message" id="message" placeholder="Message"></textarea>
                <button type="submit">Submit</button>
            </form>
        </section>
    </div>
</body>
</html>
