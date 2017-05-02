<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Domain Parking</title>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">--}}
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body >

<div class="window" id="window">
    <h1>Codedinn.com</h1>
    <div class="modal-mask" v-if="showModal">
        <modal_form v-if="showModal">
            <button class="close_icon" @click="showModal = false">&#10006</button>
        </modal_form>
    </div>
    <hr>
    <div class="content clearfix">
        <div class="related-links">
            <p class="opacity">Related Links</p>

            <a href="">esagsefgfrtrrrrrrrrrrrrrrrrrrrrrrrrrr</a>
            <a href="">esagsefgfrtrrrrrrrrrrrrrrrrrrrrrrrrrr</a>
            <a href="">esagsefgfrtrrrrrrrrrrrrrrrrrrrrrrrrrr</a>
            <a href="">esagsefgfrtrrrrrrrrrrrrrrrrrrrrrrrrrr</a>
            <a href="">esagsefgfrtrrrrrrrrrrrrrrrrrrrrrrrrrr</a><br>

            <button class="button" @click="showModal = true"  >buy link</button>

        </div>
        <div class="links">
            <p class="opacity">You searched for: "A Level Distance Learning"</p>
            <div class="link_item">
                <a href="">&#187; sdzgdsfgdsgdsfgsdfrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr</a>
                <p class="link_address">Link address</p>
                <span class="description">Description</span>
            </div>
            <div class="link_item">
                <a href="">&#187; dfgdsfgsdfgdsfg<span></span></a>
                <p class="link_address">Link address</p>
                <span class="description">Description</span>
            </div>
            <div class="link_item">
                <a href="">&#187; dfgsdfgsdfgsdfg<span></span></a>
                <p class="link_address">Link address</p>
                <span class="description">Description</span>
            </div>
        </div>
        <div class="leftBanner">
            <a href="#"><img src="http://placehold.it/120x600"></a>
        </div>
    </div>
    <div class="bottomBanner">
        <a href="#"><img src="http://placehold.it/728x90"></a>
    </div>
</div>

<script src="https://unpkg.com/vue@2.3.0"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="js/my_vue.js"></script>

</body>
</html>