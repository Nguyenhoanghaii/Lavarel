<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/chatbox/chat.css">
    <script src="/firebase/firebase-app-compat.js"></script>
  <!-- Firebase Firestore -->
  <script src="/firebase/firebase-firestore-compat.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="left">
                <div class="top">
                    <input type="text" placeholder="Search" />
                    <a href="javascript:;" class="search"></a>
                </div>
                <ul class="people" id="people">
                    <li class="person" data-chat="person1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/thomas.jpg" alt="" />
                        <span class="name">Thomas Bangalter</span>
                        <span class="time">2:09 PM</span>
                        <span class="preview">I was wondering...</span>
                    </li>
                </ul>
            </div>
            <div class="right">
                <div class="top"><span>To: <span class="name">Dog Woofson</span></span></div>
                <div class="chat" data-chat="person1">
                    <div class="conversation-start">
                        <span>Today, 6:48 AM</span>
                    </div>
                    <div class="bubble you">
                        Hello,
                    </div>
                    <div class="bubble you">
                        it's me.
                    </div>
                    <div class="bubble you">
                        I was wondering...
                    </div>
                </div>
                <div class="write">
                    <a href="javascript:;" class="write-link attach"></a>
                    <input type="text" />
                    <a href="javascript:;" class="write-link smiley"></a>
                    <a href="javascript:;" class="write-link send"></a>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="/chatbox/chat.js"></script>

</html>
