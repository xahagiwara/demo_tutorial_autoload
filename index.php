<!doctype html>
<html lang="ja" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>Document</title>
</head>
<body>
<div id="room_in">
    <div v-for="item in room_datas">
        <p>Room {{ item.id }}</p>
        <p> {{ item.room_num }} / 2</p>
        <div v-if="item.in_flag === true">
            <button v-on:click="roomIn(item)">Room In!!</button>
        </div>
        <div v-else>
            sory
        </div>
    </div>
</div>

<script>
    var conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function (e) {
        console.log("Connection established!");
    };

    conn.onmessage = function (e) {
        console.log(e.data);
    };

    var room_object = new Vue({
        el: '#room_in',
        data: {
            room_datas: [
                {
                    id: 1,
                    room_num: 0,
                    in_flag: true
                }, {
                    id: 2,
                    room_num: 0,
                    in_flag: true
                }, {
                    id: 3,
                    room_num: 0,
                    in_flag: true
                },
            ]
        },
        methods: {
            roomIn: function (item) {
                console.log(item);
                if (item.room_num < 2) {
                    item.room_num++;
                }
                if (item.room_num >= 2) {
                    item.in_flag = false;
                }

                var json_user_data = JSON.stringify(item);

                conn.send(json_user_data);
            }
        }
    });
</script>
</body>
</html>
