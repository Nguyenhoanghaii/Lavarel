<div id="footer" class="color-div">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="widget-title">Instagram Feed</h4>
                    <div id="beta-instagram-feed">
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="widget">
                    <h4 class="widget-title">Information</h4>
                    <div>
                        <ul>
                            <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web
                                    Design</a></li>
                            <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Web
                                    development</a></li>
                            <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i>
                                    Marketing</a></li>
                            <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Tips</a>
                            </li>
                            <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i>
                                    Resources</a></li>
                            <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i>
                                    Illustrations</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-10">
                    <div class="widget">
                        <h4 class="widget-title">Contact Us</h4>
                        <div>
                            <div class="contact-info">
                                <i class="fa fa-map-marker"></i>
                                <p>30 South Park Avenue San Francisco, CA 94108 Phone: +78 123 456 78</p>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit asnatur aut odit aut fugit, sed quia
                                    consequuntur magni dolores eos qui ratione.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="widget-title">Newsletter Subscribe</h4>
                    <form action="#" method="post">
                        <input type="email" name="your_email">
                        <button class="pull-right" type="submit">Subscribe <i
                                class="fa fa-chevron-right"></i></button>
                    </form>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- #footer -->
<div class="copyright">
    <div class="container">
        <p class="pull-left">Privacy policy. (&copy;) 2014</p>
        <p class="pull-right pay-options">
            <a href="#"><img src="assets/dest/images/pay/master.jpg" alt="" /></a>
            <a href="#"><img src="assets/dest/images/pay/pay.jpg" alt="" /></a>
            <a href="#"><img src="assets/dest/images/pay/visa.jpg" alt="" /></a>
            <a href="#"><img src="assets/dest/images/pay/paypal.jpg" alt="" /></a>
        </p>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- .copyright -->


<!-- include js files -->

<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
<script src="assets/dest/vendors/animo/Animo.js"></script>
<script src="assets/dest/vendors/dug/dug.js"></script>
<script src="assets/dest/js/scripts.min.js"></script>
<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/dest/js/waypoints.min.js"></script>
<script src="assets/dest/js/wow.min.js"></script>
<!--customjs-->
<script src="assets/dest/js/custom2.js"></script>

<script src="/firebase/firebase-app-compat.js"></script>
  <!-- Firebase Firestore -->
  <script src="/firebase/firebase-firestore-compat.js"></script>


<script>
    $(document).ready(function($) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 150) {
                $(".header-bottom").addClass('fixNav')
            } else {
                $(".header-bottom").removeClass('fixNav')
            }
        })
    })
</script>
<script src="/chatbox/user.chat.js"></script>
</body>


<div class="floating-chat">
    <i class="fa fa-comments" aria-hidden="true"></i>
    {{-- <div class="contact">
        <ul>
            <li>J
                <span class="unread"><i class="fa fa-circle" aria-hidden="true"></i>
                </span>
            </li>
            <li>P</li>
            <li>K</li>
            <li>W</li>
        </ul>
    </div> --}}
    <div class="chat">
        <div class="header">
            <span class="title">
                Customer Service
            </span>
            <button>
                <i class="fa fa-times" aria-hidden="true" style="font-size: 16px;"></i>
            </button>
        </div>
        <ul class="messages">
            {{-- <li class="other"><span>J</span>您好，想請問認養的資訊～～</li>
            <li class="self"><span>P</span>你好，請問你要說啥 🐶</li>
            <li class="other"><span>J</span>這隻狗目前有需要簽署證明嗎？</li>
            <li class="other"><span>J</span>或是需要家訪</li>
            <li class="self"><span>P</span>目前都不需要喔！</li>
            <li class="other"><span>J</span>那我們可以進入下一個階段！ 🐵</li> --}}
        </ul>
        <div class="footer">
            <div class="text-box" contenteditable="true" disabled="true">
                <input type="text" name="" id="custom-chat" placeholder="what in your mind">
            </div>
            <button id="sendMessage" onclick="addData()">SEND</button>
        </div>
    </div>
</div>

<style>
    .floating-chat {
  cursor: pointer;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  color: white;
  position: fixed;
  bottom: 150px;
  right: 26px;
  width: 56px;
  height: 56px;
  -webkit-transform: translateY(70px);
  transform: translateY(70px);
  -webkit-transition: all 250ms ease-out;
  transition: all 250ms ease-out;
  border-radius: 50%;
  opacity: 0;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background: #005a3c;
  z-index: 2;

  &.enter {
    -webkit-transform: translateY(0);
    transform: translateY(0);
    opacity: 0.6;
    border-radius: 50%;
    box-shadow: 0 2.1px 1.3px rgba(0, 0, 0, 0.044),
      0 5.9px 4.2px rgba(0, 0, 0, 0.054), 0 12.6px 9.5px rgba(0, 0, 0, 0.061),
      0 25px 20px rgba(0, 0, 0, 0.1);
  }

  &.enter:hover {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    opacity: 1;
  }

  &.expand {
    width: 328px;
    max-height: 434px;
    height: 434px;
    border-radius: 5px;
    cursor: auto;
    opacity: 1;
  }

  &:focus {
    outline: 0;
  }

  button {
    background: transparent;
    border: 0;
    text-transform: uppercase;
    border-radius: 3px;
    cursor: pointer;
  }

  .chat {
    display: -webkit-box;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    position: absolute;
    opacity: 0;
    width: 1px;
    height: 1px;
    border-radius: 50%;
    -webkit-transition: all 250ms ease-out;
    transition: all 250ms ease-out;
    margin: auto;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #fff;
    border-top: 1px solid #e3e6eb;
    border-right: 1px solid #e3e6eb;
    overflow-y: auto;

    &.enter {
      opacity: 1;
      border-radius: 0;
      width: auto;
      height: auto;
    }

    .header {
      flex-shrink: 0;
      display: -webkit-box;
      display: flex;
      align-items: center;
      background-color: #fff;
      border-radius: 20px 20px 0 0;
      padding: 15px;
      border-bottom: 1px solid #e3e6eb;

      i {
        font-size: 16px;
        color: #222;
      }

      button {
        flex-shrink: 0;
      }
    }

    .title {
      -webkit-box-flex: 1;
      flex-grow: 1;
      flex-shrink: 1;
      padding: 0 5px;
      color: #000;
      font-size: 12px;
    }

    .messages {
      padding: 10px;
      margin: 0;
      list-style: none;
      overflow-y: scroll;
      overflow-x: hidden;
      -webkit-box-flex: 1;
      flex-grow: 1;
      background: #f7f9fb;

      &::-webkit-scrollbar {
        width: 5px;
        color: #222;
      }

      &::-webkit-scrollbar-track {
        border-radius: 5px;
        background-color: rgba(25, 147, 147, 0.1);
      }

      &::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background-color: rgba(25, 147, 147, 0.2);
      }

      li {
        position: relative;
        clear: both;
        display: inline-block;
        padding: 14px;
        margin: 0 0 20px 0;
        border-radius: 10px;
        background-color: #e3e6eb;
        word-wrap: break-word;
        max-width: 81%;

        &:after {
          position: absolute;
          top: 10px;
          content: "";
          width: 0;
          height: 0;
          border-top: 10px solid rgb(227, 230, 235);
        }

        &.other {
          animation: show-chat-odd 0.15s 1 ease-in;
          -moz-animation: show-chat-odd 0.15s 1 ease-in;
          -webkit-animation: show-chat-odd 0.15s 1 ease-in;
          float: right;
          margin-right: 45px;
          color: #000;

          span {
            position: absolute;
            right: -45px;
            width: 25px;
            height: 25px;
            border-radius: 25px;
            background: #fff;
            text-align: center;
            line-height: 25px;
          }

          &:after {
            border-right: 10px solid transparent;
            right: -10px;
          }
        }

        &.self {
          animation: show-chat-even 0.15s 1 ease-in;
          -moz-animation: show-chat-even 0.15s 1 ease-in;
          -webkit-animation: show-chat-even 0.15s 1 ease-in;
          float: left;
          margin-left: 45px;
          color: #000;

          span {
            position: absolute;
            left: -45px;
            width: 25px;
            height: 25px;
            border-radius: 25px;
            background: #fff;
            text-align: center;
            line-height: 25px;
          }

          &:after {
            border-left: 10px solid transparent;
            left: -10px;
          }

          @keyframes show-chat-even {
            0% {
              margin-left: -480px;
            }

            100% {
              margin-left: 0;
            }
          }

          @-webkit-keyframes show-chat-even {
            0% {
              margin-left: -480px;
            }

            100% {
              margin-left: 0;
            }
          }

          @keyframes show-chat-odd {
            0% {
              margin-right: -480px;
            }

            100% {
              margin-right: 0;
            }
          }

          @-webkit-keyframes show-chat-odd {
            0% {
              margin-right: -480px;
            }

            100% {
              margin-right: 0;
            }
          }
        }
      }
    }

    .chat_list {
      flex-shrink: 0;
      display: -webkit-box;
      display: flex;
      align-items: center;
      background-color: #fff;
      border-radius: 20px 20px 0 0;
      padding: 15px;
      border-bottom: 1px solid #e3e6eb;

      .title {
        -webkit-box-flex: 1;
        flex-grow: 1;
        flex-shrink: 1;
        padding: 0 5px;
        color: #000;
        font-size: 12px;
      }
      i {
        font-size: 16px;
        color: #222;
      }

      button {
        flex-shrink: 0;
      }
    }

    .footer {
      flex-shrink: 0;
      display: -webkit-box;
      display: flex;
      padding: 10px;
      max-height: 90px;
      background: #fff;

      .text-box {
        border-radius: 3px;
        min-height: 100%;
        width: 100%;
        margin-right: 5px;
        color: #000;
        overflow-y: auto;
        padding: 2px 5px;

        &::-webkit-scrollbar {
          width: 5px;
        }

        &::-webkit-scrollbar-track {
          border-radius: 5px;
          background-color: rgba(25, 147, 147, 0.1);
        }

        &::-webkit-scrollbar-thumb {
          border-radius: 5px;
          background-color: rgba(25, 147, 147, 0.2);
        }
      }

      [contentEditable="true"]:empty:not(:focus):before {
        content: attr(data-text);
      }

      #sendMessage {
        background-color: #fff;
        margin-left: auto;
        width: 65px;
        color: #000;
        font-weight: bold;
        border-left: 2px solid #f7f9fb;
        border-radius: 0 0 20px 0;
      }
    }
  }

  .contact {
    display: flex;
    position: absolute;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    width: 1px;
    height: 1px;
    background: #fff;
    left: -45px;
    border-right: 1px solid #e3e6eb;
    overflow-y: scroll;
    overflow-x: hidden;
    opacity: 0;
    border-radius: 5px 0px 0px 5px;
    box-shadow: 0 12px 28px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.1),
      inset 1px 1px 0 rgba(255, 255, 255, 0.5);

    &.expand {
      width: 45px !important;
      height: 434px !important;
      opacity: 1 !important;
    }

    ul {
      margin: 0;
      padding: 0;
      list-style-type: none;

      li {
        color: #000;
        min-height: 37px;
        background: #f5f5f5;
        margin: 15px 3px 3px 3px;
        cursor: pointer;
        text-align: center;
        line-height: 35px;
        border-radius: 20px;
        position: relative;
      }
    }

    .unread {
      color: #d91b42;
      position: absolute;
      right: 0;
      font-size: 10px;
      top: -10px;
    }
  }
}
</style>
<script>
       var element = $('.floating-chat');
        var myStorage = localStorage;

        if (!myStorage.getItem('chatID')) {
            myStorage.setItem('chatID', createUUID());
        }

        setTimeout(function () {
            element.addClass('enter');
        }, 1000);

        element.click(openElement);

        function openElement() {
            var messages = element.find('.messages');
            var textInput = element.find('.text-box');
            element.find('>i').hide();
            element.addClass('expand');
            element.find('.chat').addClass('enter');
            element.find('.contact').addClass('expand');
            var strLength = textInput.val().length * 2;
            textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
            element.off('click', openElement);
            element.find('.header button').click(closeElement);
            element.find('#sendMessage').click(sendNewMessage);
            messages.scrollTop(messages.prop("scrollHeight"));
        }

        function closeElement() {
            element.find('.chat').removeClass('enter').hide();
            element.find('>i').show();
            element.removeClass('expand');
            element.find('.contact').removeClass('expand');
            element.find('.header button').off('click', closeElement);
            element.find('#sendMessage').off('click', sendNewMessage);
            element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
            setTimeout(function () {
                element.find('.chat').removeClass('enter').show()
                element.click(openElement);
            }, 500);
        }

        function createUUID() {
            // http://www.ietf.org/rfc/rfc4122.txt
            var s = [];
            var hexDigits = "0123456789abcdef";
            for (var i = 0; i < 36; i++) {
                s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
            }
            s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
            s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
            s[8] = s[13] = s[18] = s[23] = "-";

            var uuid = s.join("");
            return uuid;
        }

        function sendNewMessage() {
            var userInput = $('.text-box');
            var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim()
                .replace(/\n/g, '<br>');

            if (!newMessage) return;

            var messagesContainer = $('.messages');

            messagesContainer.append([
                '<li class="self">',
                newMessage,
                '</li>'
            ].join(''));

            // clean out old message
            userInput.html('');
            // focus on input
            userInput.focus();

            messagesContainer.finish().animate({
                scrollTop: messagesContainer.prop("scrollHeight")
            }, 250);
        }

        function onMetaAndEnter(event) {
            if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
                sendNewMessage();
            }
        }
</script>

</html>
